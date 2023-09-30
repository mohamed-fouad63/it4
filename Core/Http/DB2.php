<?php
class QueryBuilder
{
    protected static $table;
    protected static $select = '*';
    protected static $where = [];
    protected static $orwhere = [];
    protected static $limit;
    protected static $join = [];
    protected static $insert = [];
    protected static $update = [];
    protected static $delete = false;
    
    public static function table($table)
    {
        self::$table = $table;
        return new self();
    }
    
    public function select(...$fields)
    {
        self::$select = implode(', ', $fields);
        return $this;
    }
    
    // public function where($column, $operator, $value)
    // {
    //     self::$where[] = [
    //         'type' => 'where',
    //         'column' => $column,
    //         'operator' => $operator,
    //         'value' => $value,
    //     ];
    //     return $this;
    // }

//     public function where($column, $operator, $value)
// {
//     self::$where[] = [
//         'type' => 'where',
//         'column' => $column,
//         'operator' => $operator,
//         'value' => $value,
//     ];
//     return $this;
// }

public function where($column, $operator, $value, $conjunction = 'AND')
{
    self::$where[] = [
        'type' => 'where',
        'column' => $column,
        'operator' => $operator,
        'value' => $value,
        'conjunction' => $conjunction,
    ];
    return $this;
}
public function orwhere($column, $operator, $value, $conjunction = 'OR')
{
    self::$orwhere[] = [
        'type' => 'orwhere',
        'column' => $column,
        'operator' => $operator,
        'value' => $value,
        'conjunction' => $conjunction,
    ];
    return $this;
}
    
    // public function orWhere($column, $operator, $value)
    // {
    //     self::$where[] = [
    //         'type' => 'orWhere',
    //         'column' => $column,
    //         'operator' => $operator,
    //         'value' => $value,
    //     ];
    //     return $this;
    // }
//     public function orWhere($column, $operator, $value)
// {
//     return $this->where($column, $operator, $value, 'OR');
// }
    public function limit($count)
    {
        self::$limit = $count;
        return $this;
    }
    
    public function join($table, $column1, $operator, $column2)
    {
        self::$join[] = [
            'type' => 'join',
            'table' => $table,
            'column1' => $column1,
            'operator' => $operator,
            'column2' => $column2,
        ];
        return $this;
    }
    
    public function leftJoin($table, $column1, $operator, $column2)
    {
        self::$join[] = [
            'type' => 'leftJoin',
            'table' => $table,
            'column1' => $column1,
            'operator' => $operator,
            'column2' => $column2,
        ];
        return $this;
    }
    
    public function insert(array $data)
    {
        self::$insert = $data;
        return $this;
    }
    
    public function updateOrInsert(array $data)
    {
        self::$insert = $data;
        self::$update = $data;
        return $this;
    }
    
    public function delete()
    {
        self::$delete = true;
        return $this;
    }
    
    public function get()
    {
        $query = "SELECT " . self::$select . " FROM " . self::$table;
        
        if (!empty(self::$join)) {
            foreach (self::$join as $join) {
                $query .= " " . strtoupper($join['type']) . " " . $join['table'] . " ON " . $join['column1'] . " " . $join['operator'] . " " . $join['column2'];
            }
        }
        
        // if (!empty(self::$where)) {
        //     $query .= " WHERE";
        
        //     foreach (self::$where as $condition) {
        //         $query .= " {$condition['column']} {$condition['operator']} :{$condition['column']} AND";
        //     }
        
        //     $query = rtrim($query, ' AND');
        // }
        
        // $query = "SELECT name, email FROM users";

        if (!empty(self::$where)) {
            $query .= " WHERE";
        
            foreach (self::$where as $condition) {
                $query .= " {$condition['column']} {$condition['operator']} :{$condition['column']} {$condition['conjunction']}";
            }
        
            $query = rtrim($query, ' AND');
        }
        if (!empty(self::$orwhere)) {
            if(!empty(self::$where)){

                $query .= " OR";
            } else {
                $query .= " WHERE";
            }
        
            foreach (self::$orwhere as $condition) {
                $query .= " {$condition['column']} {$condition['operator']} :{$condition['column']} {$condition['conjunction']}";
            }
        
            $query = rtrim($query, ' OR');
        }
        
        // Execute the query...

        if (self::$limit) {
            $query .= " LIMIT " . self::$limit;
        }
        
        if (self::$delete) {
            // Generate and execute the DELETE query
            $query = "DELETE FROM " . self::$table . " WHERE ";

            foreach (self::$where as $index => $condition) {
                if ($index > 0) {
                    $query .= ' ' . $condition['type'] . ' ';
                }
                $query .= $condition['column'] . " " . $condition['operator'] . " " . $condition['value'];
            }
            
            // Reset the properties for subsequent queries
            self::$table = null;
            self::$select = '*';
            self::$where = [];
            self::$limit = null;
            self::$join = [];
            self::$insert = [];
            self::$update = [];
            self::$delete = false;
            
            return $query; // Return the query result
        }
        
        if (!empty(self::$insert)) {
            // Generate and execute the INSERT query
            $query = "INSERT INTO " . self::$table . " (";
            $columns = array_keys(self::$insert);
            $values = array_values(self::$insert);

            $query .= implode(', ', $columns) . ") VALUES ('" . implode("', '", $values) . "')";
            
            // Reset the properties for subsequent queries
            self::$table = null;
            self::$select = '*';
            self::$where = [];
            self::$limit = null;
            self::$join = [];
            self::$insert = [];
            self::$update = [];
            self::$delete = false;
            
            return $query; // Return the query result
        }
        
        if (!empty(self::$update)) {
            // Generate and execute the UPDATE query
            $query = "UPDATE " . self::$table . " SET ";
            $setValues = [];

            foreach (self::$update as $column => $value) {
                $setValues[] = $column . " = '" . $value . "'";
            }

            $query .= implode(', ', $setValues);
            
            if (!empty(self::$where)) {
                $query .= " WHERE ";

                foreach (self::$where as $index => $condition) {
                    if ($index > 0) {
                        $query .= ' ' . $condition['type'] . ' ';
                    }
                    $query .= $condition['column'] . " " . $condition['operator'] . " " . $condition['value'];
                }
            }
            
            // Reset the properties for subsequent queries
            self::$table = null;
            self::$select = '*';
            self::$where = [];
            self::$limit = null;
            self::$join = [];
            self::$insert = [];
            self::$update = [];
            self::$delete = false;
            
            return $query; // Return the query result
        }
        
        // Reset the properties for subsequent queries
        self::$table = null;
        self::$select = '*';
        self::$where = [];
        self::$limit = null;
        self::$join = [];
        self::$insert = [];
        self::$update = [];
        self::$delete = false;
        
        return $query; // Return the query result
    }
}

// SELECT query with WHERE and LIMIT
$users = QueryBuilder::table('users')
            ->select('*')
            ->where('id', '=', 1)
            ->where('id', '=', 2)
            ->orWhere('age', '>', 18)
            ->orWhere('m', '>', '18')
            ->limit(10)
            ->get();

// JOIN query
// $usersOrders = QueryBuilder::table('users')
//                 ->select('users.name', 'orders.order_number')
//                 ->join('orders', 'users.id', '=', 'orders.user_id')
//                 ->get();

// INSERT query
// $newUser = QueryBuilder::table('users')
//             ->insert([
//                 'name' => 'John Doe',
//                 'email' => 'john@example.com',
//                 'status' => 1
//             ])
//             ->get();

// UPDATE query
// $updatedUser = QueryBuilder::table('users')
//                 ->where('id', '=', 1)
//                 ->updateOrInsert([
//                     'name' => 'Updated Name',
//                     'email' => 'updated@example.com',
//                 ])
//                 ->get();

// DELETE query
// $deletedUser = QueryBuilder::table('users')
// ->select('name', 'email')
// ->where('status', '=', 1)
// ->orwhere('age', '>', 18)
// ->orwhere('age', '>', 18)
// ->get();
print_r($users);