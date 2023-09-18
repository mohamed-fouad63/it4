<?php

namespace App\Models;

class in_it extends Model
{

    protected static $table = 'in_it';
    protected static $conn;
    protected static $preparedQueries = [];
    protected static function getConnection()
    {
        if (!isset(self::$conn)) {
            self::$conn = self::dbConnectionBySession();
        }
        return self::$conn;
    }

    private static function prepareQuery($query, $params)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        return $stmt;
    }

    private static function executePreparedQuery($queryName, $params)
    {
        if (!isset(self::$preparedQueries[$queryName])) {
            $query = self::getQueryByName($queryName);
            self::$preparedQueries[$queryName] = self::prepareQuery($query, $params);
        }
        $stmt = self::$preparedQueries[$queryName];
        $stmt->execute($params);
        return $stmt;
    }

    private static function getQueryByName($queryName)
    {
        $queries = [
            'ajaxDvicesInIt' => "SELECT count_in_it,num,office_name,dvice_type,dvice_name,sn,damage,in_it_note,parcel_in_it,date_in_it FROM in_it WHERE status= 'in_it' AND id = :dvice_id",
            'ajaxDvicesDeleteInIt1' => "UPDATE in_it SET deleted_parcel = :deleted_parcel,data_deleted = :data_deleted,status = 'deleted' WHERE count_in_it = :count_in_it",
            'ajaxDvicesDeleteInIt2' => "DELETE FROM `dvice` WHERE num = (SELECT num FROM in_it WHERE count_in_it = :count_in_it)",
            'ajaxposDeliver1' => "UPDATE in_it SET status = 'in_tts', auth_repair = :pos_deliver, date_auth_repair = :pos_deliver_date where count_in_it  = :count_in_it",
            'ajaxposDeliver2' => "UPDATE dvice SET note = 'تم سحبها للصيانه بشركه SEE' where dvice_name = 'VERIFONE V200T' AND num = (SELECT num FROM in_it WHERE count_in_it = :count_in_it)",
            'ajaxDvicesEditInIt' => "UPDATE in_it SET damage = :damage,date_in_it = :date_in_it, parcel_in_it = :parcel_in_it, in_it_note = :in_it_note where count_in_it = :count_in_it",
            'ajaxMoveToInIt1' => "INSERT INTO move_to (`num`,`id`,`dvice_name`,`sn`,`office_name_from`,`office_name_to`,`date`,`move_by`,`move_like`,`move_note`) SELECT num,id,dvice_name,sn,office_name,:office_name_to,:move_to_date,:move_by,:move_like,:move_note FROM in_it WHERE count_in_it = :dvice_num",
            'ajaxMoveToInIt2' => "UPDATE dvice SET note_move_to = CONCAT('منقول مؤقتا الى ', :office_name_to), note = '' WHERE num = ( SELECT num from in_it WHERE count_in_it = :dvice_num )",
            'ajaxMoveToInIt3' => "UPDATE in_it SET status = 'in_office', in_it_note = CONCAT(' تم نقلها الى ', :office_name_to, ' ', :move_like, ' / ' , in_it_note), parcel_out_it = :move_by, data_out_it = :move_to_date WHERE count_in_it = :dvice_num",
            'ajaxMoveToInIt4' => "UPDATE dvice SET office_name = :office_name_to, note = '', note_move_to = '' WHERE num = ( SELECT num from in_it WHERE count_in_it = :dvice_num )",
            'ajaxToTts1' => "UPDATE in_it SET date_auth_repair = :date_auth_repair, auth_repair = :auth_repair, status = 'in_tts'  where count_in_it = :dvice_num",
            'ajaxToTts2' => "UPDATE dvice SET note = 'بقطاع الدعم الفنى بالقاهره' where num = (SELECT num FROM in_it WHERE count_in_it = :dvice_num)",
            'authRepair' => "SELECT dvice_name,sn,damage FROM in_it WHERE count_in_it = :count_in_it",
            'ajaxResentToOfice1' => "UPDATE in_it SET parcel_out_it = :resen_to_office_by, data_out_it = :resen_to_office_date, status = 'in_office' WHERE count_in_it = :dvice_num",
            'ajaxResentToOfice2' => "UPDATE dvice SET note ='' WHERE num = (SELECT num FROM in_it  WHERE count_in_it = :dvice_num)",
            'ajaxReplacePicesDvice1' => "DELETE FROM replace_pices_dvice WHERE `sn` = :dvice_sn AND `date` = :date_replace_Pices",
            'ajaxReplacePicesDvice2' => "INSERT INTO replace_pices_dvice (id,office_name,replace_type,dvice_name,sn,date) VALUES (:id,:office_name,:replace_type,:dvice_name,:sn,:date)",
            'ajaxDvicesInTts' => "SELECT count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair FROM in_it WHERE status= 'in_tts' AND id = :dvice_id",
            'ajaxDvicesEditInTts' => "UPDATE in_it SET date_auth_repair = :date_auth_repair, auth_repair = :auth_repair where count_in_it = :dvice_num",
            'ajaxResentToIt1' => "UPDATE in_it SET date_from_auth_repair = :date_from_auth_repair, in_tts_note = :by_from_auth_repair, status = 'in_it' WHERE count_in_it = :dvice_num",
            'ajaxResentToIt2' => "UPDATE dvice SET note ='بقسم الدعم الفنى' WHERE num = (SELECT num FROM in_it  WHERE count_in_it = :dvice_num)",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function ajaxDvicesInIt($dvice_id)
    {
        $params = [':dvice_id' => $dvice_id];
        $stmt = self::executePreparedQuery('ajaxDvicesInIt', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }

    public static function ajaxDvicesDeleteInIt($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [':deleted_parcel' => $form_data['delete_by'], ':data_deleted' => $form_data['delete_date'], ':count_in_it' => $form_data['dvice_num']];
            self::executePreparedQuery('ajaxDvicesDeleteInIt1', $params);
            $params2 = [':count_in_it' => $form_data['dvice_num']];
            self::executePreparedQuery('ajaxDvicesDeleteInIt2', $params2);
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }

    public static function ajaxposDeliver($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            foreach ($form_data['selectedData'] as $key => $value) {
                $params1 = [':pos_deliver' => $form_data['pos_deliver'], ':pos_deliver_date' => $form_data['pos_deliver_date'], ':count_in_it' => $value['count_in_it']];
                self::executePreparedQuery('ajaxposDeliver1', $params1);
                $params2 = [':count_in_it' => $value['count_in_it']];
                self::executePreparedQuery('ajaxposDeliver2', $params2);
            }
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }

    public static function ajaxDvicesEditInIt($form_data)
    {
        $params = [
            ':damage' => $form_data['damage'],
            ':date_in_it' => $form_data['date_in_it'],
            ':parcel_in_it' => $form_data['parcel_in_it'],
            ':in_it_note' => $form_data['in_it_note'],
            ':count_in_it' => $form_data['dvice_num']
        ];
        self::executePreparedQuery('ajaxDvicesEditInIt', $params);
        return "done";
    }

    public static function ajaxMoveToInIt($form_data)
    {
        $move_like =  $form_data["move_like"];
        $dvice_num = $form_data["dvice_num"];
        if ($move_like == 'مؤقت' && !empty($dvice_num)) {
            try {
                $conn = self::dbConnectionBySession();
                $conn->beginTransaction();
                $params1 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':move_to_date' => $form_data['move_to_date'],
                    ':move_by' => $form_data['move_by'],
                    ':move_like' => $form_data['move_like'],
                    ':move_note' => $form_data['move_note'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt1', $params1);
                $params2 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt2', $params2);
                $params3 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':move_like' => $form_data['move_like'],
                    ':move_by' => $form_data['move_by'],
                    ':move_to_date' => $form_data['move_to_date'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt3', $params3);
                $conn->commit();
                return "done";
            } catch (\Exception $e) {
                return "not done";
            }
        } elseif ($move_like == 'عهده' && !empty($dvice_num)) {
            try {
                $conn = self::dbConnectionBySession();
                $conn->beginTransaction();
                $params1 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':move_to_date' => $form_data['move_to_date'],
                    ':move_by' => $form_data['move_by'],
                    ':move_like' => $form_data['move_like'],
                    ':move_note' => $form_data['move_note'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt1', $params1);
                $params3 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':move_like' => $form_data['move_like'],
                    ':move_by' => $form_data['move_by'],
                    ':move_to_date' => $form_data['move_to_date'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt3', $params3);
                $params4 = [
                    ':office_name_to' => $form_data['office_name_to'],
                    ':dvice_num' => $form_data['dvice_num']
                ];
                self::executePreparedQuery('ajaxMoveToInIt4', $params4);
                $conn->commit();
                return "done";
            } catch (\Exception $e) {
                $conn->rollback();
                return "not done";
            }
        } else {
            return "not done";
        }
    }

    public static function ajaxToTts($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':date_auth_repair' => $form_data["date_auth_repair"],
                ':auth_repair' => $form_data['auth_repair'],
                ':dvice_num' => $form_data['dvice_num']
            ];
            self::executePreparedQuery('ajaxToTts1', $params1);
            $params2 = [
                ':dvice_num' => $form_data['dvice_num']
            ];
            self::executePreparedQuery('ajaxToTts2', $params2);
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }
    public static function authRepair($dvice_num)
    {
        $params = [':count_in_it' => $dvice_num];
        $stmt = self::executePreparedQuery('authRepair', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }

    public static function ajaxResentToOfice($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':resen_to_office_by' => $form_data["resen_to_office_by"],
                ':resen_to_office_date' => $form_data['resen_to_office_date'],
                ':dvice_num' => $form_data['dvice_num']
            ];
            self::executePreparedQuery('ajaxResentToOfice1', $params1);
            $params2 = [
                ':dvice_num' => $form_data['dvice_num']
            ];
            self::executePreparedQuery('ajaxResentToOfice2', $params2);
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }

    public static function ajaxReplacePicesDvice($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':dvice_sn' => $form_data["dvice_sn"],
                ':date_replace_Pices' => $form_data['date_replace_Pices']
            ];
            self::executePreparedQuery('ajaxReplacePicesDvice1', $params1);
            if (!empty($form_data["replace_Pices"])) {
                foreach ($form_data["replace_Pices"] as $id => $replace_type) {
                    $params2 = [
                        ':id' => $id,
                        ':office_name' => $form_data['office_name'],
                        ':replace_type' => $replace_type,
                        ':dvice_name' => $form_data['dvice_name'],
                        ':sn' => $form_data['dvice_sn'],
                        ':date' => $form_data['date_replace_Pices']
                    ];
                    self::executePreparedQuery('ajaxReplacePicesDvice2', $params2);
                }
                return 'done';
            }
        } catch (\Exception $e) {
            return "not done";
        }
    }

    public static function ajaxDvicesInTts($dvice_id)
    {
        $params = [':dvice_id' => $dvice_id];
        $stmt = self::executePreparedQuery('ajaxDvicesInTts', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }

    public static function ajaxDvicesEditInTts($form_data)
    {
        $params = [
            ':date_auth_repair' =>  $form_data["date_auth_repair"],
            ':auth_repair' =>  $form_data["auth_repair"],
            ':dvice_num' =>  $form_data["dvice_num"]
        ];
        self::executePreparedQuery('ajaxDvicesEditInTts', $params);
        return "done";
    }

    public static function ajaxResentToIt($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':date_from_auth_repair' =>  $form_data["date_from_auth_repair"],
                ':by_from_auth_repair' =>  $form_data["by_from_auth_repair"],
                ':dvice_num' =>  $form_data["dvice_num"]
            ];
            self::executePreparedQuery('ajaxResentToIt1', $params1);
            $params2 = [
                ':dvice_num' =>  $form_data["dvice_num"]
            ];
            self::executePreparedQuery('ajaxResentToIt2', $params2);
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }
}
