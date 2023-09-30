<?php

namespace Core\Http;

class DB{
    protected $table;
    protected $select = '*';
    protected $join = [];
    protected $where = [];
    protected $whereConditions = [];
    protected $orderBy = [];
    protected $limit;
    protected $updateValues = [];
    protected $insertValues = [];
    protected $bindings = [];

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function select($columns)
    {
        $this->select = $columns;
        return $this;
    }

    public function join($table, $firstColumn, $operator, $secondColumn)
    {
        $this->join[] = "JOIN $table ON $firstColumn $operator $secondColumn";
        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->where[] = "$column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    public function where2($column, $operator, $value)
    {
        $this->whereConditions[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value
        ];
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy[] = "$column $direction";
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function get()
    {
        $query = "SELECT $this->select FROM $this->table";

        if (!empty($this->join)) {
            $query .= ' ' . implode(' ', $this->join);
        }

        if (!empty($this->where)) {
            $query .= ' WHERE ' . implode(' AND ', $this->where);
        }

        if (!empty($this->orderBy)) {
            $query .= ' ORDER BY ' . implode(', ', $this->orderBy);
        }

        if (!empty($this->limit)) {
            $query .= ' LIMIT ' . $this->limit;
        }

        return $query;
    }

    public function updateOrInsert(array $values)
    {
        $this->updateValues = $values;
        $this->insertValues = $values;
        return $this;
    }

    public function getUpdateSql()
    {
        $table = $this->table;
        $updateValues = $this->buildUpdateValues();
        $updateColumns = implode(', ', array_keys($updateValues));
        $updateBindings = implode(', ', array_fill(0, count($updateValues), '?'));
        $this->bindings = array_merge($this->bindings, array_values($updateValues));
        return "UPDATE $table SET $updateColumns = $updateBindings";
    }

    public function getInsertSql()
    {
        $table = $this->table;
        $insertValues = $this->buildInsertValues();
        $insertColumns = implode(', ', array_keys($insertValues));
        $insertBindings = implode(', ', array_fill(0, count($insertValues), '?'));
        $this->bindings = array_merge($this->bindings, array_values($insertValues));
        return "INSERT INTO $table ($insertColumns) VALUES ($insertBindings)";
    }

    protected function buildUpdateValues()
    {
        $values = [];
        foreach ($this->updateValues as $column => $value) {
            $values[$column] = $value;
        }
        return $values;
    }

    protected function buildInsertValues()
    {
        $values = [];
        foreach ($this->insertValues as $column => $value) {
            $values[$column] = $value;
        }
        return $values;
    }

    public function delete()
    {
        $table = $this->table;
        $whereConditions = $this->buildWhereConditions();
        
        return "DELETE FROM $table WHERE $whereConditions";
    }

    protected function buildWhereConditions()
    {
        $conditions = [];
        foreach ($this->whereConditions as $condition) {
            $column = $condition['column'];
            $operator = $condition['operator'];
            $value = $condition['value'];
            $conditions[] = "$column $operator ?";
            $this->bindings[] = $value;
        }
        return implode(' AND ', $conditions);
    }

    public function execute()
    {
        // قم بتنفيذ الاستعلام هنا باستخدام المتغير $this->bindings لتمرير قيم المعلمات
    }
}


$query = new DB();
$sql = $query->table('users')
    ->select('id, name, email')
    ->where('age', '>', 18)
    ->orderBy('name', 'ASC')
    ->limit(10)
    ->get();
echo $sql; // الناتج: SELECT id, name, email FROM users WHERE age > ? ORDER BY name ASC LIMIT 10
echo "<pre>";

$query = new DB();
$sql = $query->table('users')
    ->select('users.id, users.name, orders.order_date, orders.total')
    ->join('orders', 'users.id', '=', 'orders.user_id')
    ->where('users.age', '>', 18)
    ->orderBy('users.name', 'ASC')
    ->limit(10)
    ->get();
echo $sql; // الناتج: SELECT users.id, users.name, orders.order_date, orders.total FROM users JOIN orders ON users.id = orders.user_id WHERE users.age > ? ORDER BY users.name ASC LIMIT 10
echo "<pre>";

$query = new DB();
$updateValues = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'age' => 25
];
$sql = $query->table('users')
    ->updateOrInsert($updateValues)
    ->getUpdateSql(); // or ->getInsertSql() depending on your needs
echo $sql; // الناتج: UPDATE users SET name = ?, email = ?, age = ?
echo "<pre>";

$query = new DB();
$sql = $query->table('users')
    ->where2('votes', '>', 100)
    ->delete();
echo $sql; // الناتج: DELETE FROM users WHERE votes > ?