<?php

namespace App\Models;

class dvice extends Model
{
    protected static $table = 'dvice';
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
        $stmt->execute();
        return $stmt;
    }

    private static function getQueryByName($queryName)
    {
        $queries = [
            "grd" => "SELECT * FROM dvice WHERE office_name = :office_name ORDER BY FIELD(id,'pc', 'monitor','printer','pos','postal','network') ASC",
            "ajaxDvicesId" => "SELECT id FROM g_shrkia.dvice_type GROUP BY id HAVING COUNT(id) >= 1",
            "ajaxDvicesNameById" => "SELECT dvice_name_new FROM g_shrkia.dvice_type WHERE id = :dvice_id ORDER BY dvice_name_new ASC",
            "ajaxDviceTypeByName" => "SELECT dvice_type,code_inventory FROM g_shrkia.dvice_type WHERE dvice_name_new = :dvice_name ORDER BY dvice_name_new ASC",
            "ajaxAddDvice" => "INSERT INTO dvice (id,office_name,sn,code_inventory,dvice_type,dvice_name) SELECT id,:office_name,:dvice_sn,code_inventory,dvice_type,dvice_name_new FROM g_shrkia.dvice_type WHERE dvice_name_new = :dvice_name",
            "ajaxEditDvice" => "UPDATE dvice SET sn = :pc_sn, ip = :pc_ip, pc_doman_name = :pc_domian_name WHERE num = :dvice_num",
            "ajaxMoveDvice1" => "
            INSERT INTO move_to
            (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move)
            SELECT
            num,id,dvice_name,sn,office_name,:office_name_to,:move_to_date,:move_by,:move_like,:move_note,:first_name FROM dvice  WHERE num = :dvice_num
            ",
            "ajaxMoveDvice2" => "UPDATE dvice SET note_move_to ='منقول مؤقتا الى ':office_name_to, note = '' WHERE num = :dvice_num",
            "ajaxMoveDvice3" => "UPDATE dvice SET office_name = :office_name_to, note = '', note_move_to ='' WHERE num = :dvice_num",
            "ajaxDviceToIt1" => "
            INSERT INTO in_it
            (num,office_name,id,dvice_name,sn,dvice_type,date_in_it,parcel_in_it,damage,in_it_note,status)
            SELECT
            num,office_name,id,dvice_name,sn,dvice_type,:to_it_date,:to_it_by,:damage,:in_it_note,'in_it' FROM dvice 
            WHERE num = :dvice_num
            ",
            "ajaxDviceToIt2" => "UPDATE dvice set note = 'بقسم الدعم الفنى', note_move_to = '' WHERE num = :dvice_num ",
            "countDviceNameById" => "SELECT dvice_name,COUNT(dvice_name) FROM dvice WHERE id= :dvice_id  GROUP BY dvice_name ORDER BY `dvice`.`dvice_name` ASC",
            "countDviceNameByType" => "SELECT dvice_name,COUNT(dvice_name) FROM dvice WHERE dvice_type= :dvice_type  GROUP BY dvice_name ORDER BY `dvice`.`dvice_name` ASC",
            "countDviceNameByName" => "SELECT dvice_name,COUNT(dvice_name) FROM dvice WHERE dvice_name LIKE :dvice_name  GROUP BY dvice_name ORDER BY `dvice`.`dvice_name` ASC",
            "getDviceById" => "SELECT office_name,dvice_name,sn,note,note_move_to FROM dvice WHERE ( id LIKE :id AND dvice_type LIKE :dvice_type ) OR ( id LIKE :id AND dvice_name LIKE :dvice_name )",
            "getDviceByType" => "SELECT office_name,dvice_name,sn,note,note_move_to FROM dvice WHERE dvice_name = :dvice_type",
            "repeatSn" => "SELECT a.sn,a.office_name,a.dvice_name FROM dvice a JOIN (SELECT sn, COUNT(sn) FROM dvice WHERE sn !='' GROUP BY sn HAVING count(sn) > 1 ) b ON a.sn = b.sn ORDER BY a.sn",
            "OfficesDvicesReport" => "
            SELECT dvice.office_name,all1.money_code,all1.office_type,
            COUNT(CASE WHEN dvice.id = 'pc' THEN 1 ELSE NULL END) AS pc ,
            COUNT(CASE WHEN dvice.id = 'pc' AND note <> '' THEN 1 ELSE NULL END) AS pc_init ,
            COUNT(CASE WHEN dvice.id = 'monitor' THEN 1 ELSE NULL END) AS monitor ,
            COUNT(CASE WHEN dvice.id = 'monitor' AND note <> '' THEN 1 ELSE NULL END) AS monitor_init ,
            COUNT(CASE WHEN dvice.id = 'printer' AND dvice_name NOT IN ('HP Laser MFP 432 Series', 'LEXMARK MX622 ADE','RICOH SP C231','RICOH 1100','CANON MF210 Series') THEN 1 ELSE NULL END) AS printer_laser ,
            COUNT(CASE WHEN dvice.id = 'printer' AND dvice_name IN ('HP Laser MFP 432 Series', 'LEXMARK MX622 ADE','RICOH SP C231','RICOH 1100','CANON MF210 Series') THEN 1 ELSE NULL END) AS printer_scann ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'verifone vx 520' OR  dvice_name = 'verifone vx 675'  THEN 1 ELSE NULL END)  AS posfinance ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'verifone vx 510' THEN 1 ELSE NULL END)  AS vx510 ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'VERIFONE V200T' THEN 1 ELSE NULL END)  AS V200T ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'BITEL IC3600' THEN 1 ELSE NULL END)  AS BITEL ,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'قارىء باركود' THEN 1 ELSE NULL END) AS postalscanner,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'طابعه باركود' THEN 1 ELSE NULL END) AS postalprinter,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'شاشه عرض عملاء' THEN 1 ELSE NULL END) AS postalmonitor,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'ميزان الكتروني' THEN 1 ELSE NULL END) AS postalscale
            FROM dvice INNER JOIN all1 ON dvice.office_name = all1.office_name GROUP BY office_name ORDER BY money_code DESC;
            ",
            "OfficeDvicesCount" => "
            SELECT dvice.office_name,all1.money_code,all1.office_type,all1.post_group,all1.tel,all1.domain_name,
            COUNT(CASE WHEN dvice.id = 'pc' THEN 1 ELSE NULL END) AS pc ,
            COUNT(CASE WHEN dvice.id = 'monitor' THEN 1 ELSE NULL END) AS monitor ,
            COUNT(CASE WHEN dvice.id = 'printer' THEN 1 ELSE NULL END) AS printer ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'verifone vx 520' OR  dvice_name = 'verifone vx 675'  THEN 1 ELSE NULL END)  AS posfinance ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'verifone vx 510' THEN 1 ELSE NULL END)  AS vx510 ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'VERIFONE V200T' THEN 1 ELSE NULL END)  AS V200T ,
            COUNT(CASE WHEN dvice.id = 'pos' AND dvice_name = 'BITEL IC3600' THEN 1 ELSE NULL END)  AS BITEL ,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'قارىء باركود' THEN 1 ELSE NULL END) AS postalscanner,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'طابعه باركود' THEN 1 ELSE NULL END) AS postalprinter,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'شاشه عرض عملاء' THEN 1 ELSE NULL END) AS postalmonitor,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'ميزان الكتروني' THEN 1 ELSE NULL END) AS postalscale
            FROM dvice INNER JOIN all1 ON dvice.office_name = all1.office_name  WHERE all1.office_name = :officeName GROUP BY office_name ORDER BY money_code DESC
            ",
            "postalDvicesComptaible" => "
            SELECT dvice.office_name,all1.money_code,all1.office_type,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'قارىء باركود' THEN 1 ELSE NULL END) AS postalscanner,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'طابعه باركود' THEN 1 ELSE NULL END) AS postalprinter,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'شاشه عرض عملاء' THEN 1 ELSE NULL END) AS postalmonitor,
            COUNT(CASE WHEN dvice.id = 'postal' AND dvice_type = 'ميزان الكتروني' THEN 1 ELSE NULL END) AS postalscale
            FROM dvice INNER JOIN all1 ON dvice.office_name = all1.office_name GROUP BY office_name ORDER BY money_code DESC
            ",
            "pcsMonitorsComptaible" => "
            SELECT dvice.office_name,all1.money_code,all1.office_type,
        COUNT(CASE WHEN dvice.id = 'pc' THEN 1 ELSE NULL END) AS pc ,
        COUNT(CASE WHEN dvice.id = 'monitor' THEN 1 ELSE NULL END) AS monitor
        FROM dvice INNER JOIN all1 ON dvice.office_name = all1.office_name GROUP BY office_name ORDER BY money_code DESC
            ",
            "ajaxDvicesOffice" => "SELECT num,id,office_name,dvice_type,dvice_name,sn,ip,pc_doman_name,note,note_move_to FROM dvice WHERE office_name = :officeName and id = :id ",
            "ajaxTempMoved" => "SELECT num,dvice_name,sn,office_name,note_move_to FROM dvice WHERE dvice.id = :dvice_id AND dvice.note_move_to != ''",
            "ajaxResentMovedToOfice1" => "
            INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like) VALUES 
                (:divce_num,'',:dvice_name,:dvice_sn,:Char,:office_name,:resen_to_office_date,:resen_to_office_by,'معاد للمكتب الاصلى')
            ",
            "ajaxResentMovedToOfice2" => "UPDATE dvice SET note_move_to ='' WHERE num =:divce_num",
            "ajaxAllDvices" => "SELECT num,office_name,dvice_name,sn,ip,note,note_move_to FROM dvice ORDER BY office_name ASC",
            "ajaxRepairDvices" => "SELECT office_name,dvice_name,sn,date_in_it,parcel_in_it,damage,in_it_note,status,parcel_out_it,data_out_it FROM in_it",
            "ajaxMoveingDvices" => "SELECT dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note FROM move_to",
            "ajaxReplaceDvices" => "SELECT * FROM replace_pices_dvice",
            "ajaxDeletedDvices" => "SELECT office_name,dvice_name,sn,deleted_parcel,data_deleted FROM in_it WHERE status = 'deleted'",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function grd($office_name)
    {
        $params = [':office_name' => $office_name];
        $stmt = self::executePreparedQuery('grd', $params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function ajaxDvicesId()
    {
        $stmt = self::executePreparedQuery('ajaxDvicesId', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function ajaxDvicesNameById($dvice_id)
    {
        $params = [':dvice_id' => $dvice_id];
        $stmt = self::executePreparedQuery('ajaxDvicesNameById', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function ajaxDviceTypeByName($dvice_name)
    {
        $params = [':dvice_name' => $dvice_name];
        $stmt = self::executePreparedQuery('ajaxDviceTypeByName', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function ajaxAddDvice($form_data)
    {
        $params = [':office_name' => $form_data['office_name'], ':dvice_sn' => $form_data['dvice_sn'], ':dvice_name' => $form_data['dvice_name']];
        self::executePreparedQuery('ajaxAddDvice', $params);
        return 'done';
    }
    public static function ajaxEditDvice($form_data)
    {
        $params = [':pc_sn' => $form_data['pc_sn'], ':pc_ip' => $form_data['pc_ip'], ':pc_domian_name' => $form_data['pc_domian_name'], ':dvice_num' => $form_data['dvice_num']];
        self::executePreparedQuery('ajaxEditDvice', $params);
        return 'done';
    }
    public static function ajaxMoveDvice($form_data)
    {
  
        if ($form_data['move_like'] == 'مؤقت' && !empty($form_data['dvice_num'])) {
            try {
                $conn = self::dbConnectionBySession();
                $conn->beginTransaction();
                $params = [':office_name_to' => $form_data['office_name_to'], ':move_to_date' => $form_data['move_to_date'], ':move_by' => $form_data['move_by'], ':move_like' => $form_data['move_like'], ':move_note' => $form_data['move_note'], ':first_name' => $_SESSION['first_name'], ':dvice_num' => $form_data['dvice_num']];
                self::executePreparedQuery('ajaxMoveDvice1', $params);
                $params2 = [':office_name_to' => $form_data['office_name_to'], ':dvice_num' => $form_data['dvice_num']];
                self::executePreparedQuery('ajaxMoveDvice2', $params2);
                $conn->commit();
                return "done";
            } catch (\Exception $e) {
                return print_r($form_data);
            }
        } elseif ($form_data['move_like'] == 'عهده' && !empty($form_data['dvice_num'])) {
            try {
                $conn = self::dbConnectionBySession();
                $conn->beginTransaction();
                $params = [':office_name_to' => $form_data['office_name_to'], ':move_to_date' => $form_data['move_to_date'], ':move_by' => $form_data['move_by'], ':move_like' => $form_data['move_like'], ':move_note' => $form_data['move_note'], ':first_name' => $_SESSION['first_name'], ':dvice_num' => $form_data['dvice_num']];
                self::executePreparedQuery('ajaxMoveDvice1', $params);
                $params3 = [':office_name_to' => $form_data['office_name_to'], ':dvice_num' => $form_data['dvice_num']];
                self::executePreparedQuery('ajaxMoveDvice3', $params3);
                return "done";
            } catch (\Exception $e) {
                return print_r($form_data);
            }
        }
    }
    public static function ajaxDviceToIt($form_data)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [':to_it_date' => $form_data['to_it_date'], ':to_it_by' => $form_data['to_it_by'], ':damage' => $form_data['damage'], ':in_it_note' => $form_data['in_it_note'], ':dvice_num' => $form_data['dvice_num']];
            self::executePreparedQuery('ajaxDviceToIt1', $params1);
            $params2 = [':dvice_num' => $form_data['dvice_num']];
            self::executePreparedQuery('ajaxDviceToIt2', $params2);
            $conn->commit();
            return "done";
        } catch (\Exception $e) {
            $conn->rollback();
            return "not done";
        }
    }
    public static function countDviceNameById($dvice_id)
    {
        $params = [':dvice_id' => $dvice_id];
        $stmt = self::executePreparedQuery('countDviceNameById', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function countDviceNameByType($dvice_type)
    {
        $params = [':dvice_type' => $dvice_type];
        $stmt = self::executePreparedQuery('countDviceNameByType', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function countDviceNameByName($dvice_name)
    {
        $params = [':dvice_name' => $dvice_name. '%'];
        $stmt = self::executePreparedQuery('countDviceNameByName', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function getDviceById($dvice_id)
    {
        self::$instance = static::class;
        switch ($dvice_id) {
            case 'pc':
                $dvice_type = "%";
                $dvice_name = "";
                $id = "pc";
                break;
            case 'monitor':
                $dvice_type = "%";
                $dvice_name = "";
                $id = "monitor";
                break;
            case 'printer':
                $dvice_type = "%";
                $dvice_name = "";
                $id = "printer";
                break;
            case 'pos':
                $dvice_type = "%";
                $dvice_name = "";
                $id = "pos";
                break;
            case 'scanner':
                $dvice_type = "قارىء باركود";
                $dvice_name = "";
                $id = "postal";
                break;
            case 'parcode_printer':
                $dvice_type = "طابعه باركود";
                $dvice_name = "";
                $id = "postal";
                break;
            case 'weighter':
                $dvice_type = "ميزان الكتروني";
                $dvice_name = "";
                $id = "postal";
                break;
            case 'displaying':
                $dvice_type = "شاشه عرض عملاء";
                $dvice_name = "";
                $id = "postal";
                break;
            case 'router':
                $dvice_type = "";
                $dvice_name = "ROUTER%";
                $id = "network";
                break;
            case 'switch':
                $dvice_type = "";
                $dvice_name = "SWITCH%";
                $id = "network";
                break;
            case 'modem':
                $dvice_type = "";
                $dvice_name = "MODEM%";
                $id = "network";
                break;
            case 'voip':
                $dvice_type = "عده تليفون شبكه";
                $dvice_name = "";
                $id = "network";
                break;
        }
        $params = [':id' => $id,':dvice_type' => $dvice_type,':dvice_name' => $dvice_name];
        $stmt = self::executePreparedQuery('getDviceById', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function getDviceByType($dvice_type)
    {
        $params = [':dvice_type' => $dvice_type];
        $stmt = self::executePreparedQuery('getDviceByType', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function repeatSn()
    {
        $stmt = self::executePreparedQuery('repeatSn', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function OfficesDvicesReport()
    {
        $stmt = self::executePreparedQuery('OfficesDvicesReport', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function OfficeDvicesCount($officeName)
    {
        $params = [':officeName' => $officeName];
        $stmt = self::executePreparedQuery('OfficeDvicesCount', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public static function postalDvicesComptaible()
    {
        $stmt = self::executePreparedQuery('postalDvicesComptaible', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function pcsMonitorsComptaible()
    {
        $stmt = self::executePreparedQuery('pcsMonitorsComptaible', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    public static function ajaxDvicesOfficePc($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'pc'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficeMonitor($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'monitor'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficePrinter($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'printer'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficePos($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'pos'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficeNetwork($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'network'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficePostal($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'postal'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDvicesOfficeOther($officeName)
    {
        $params = [':officeName' => $officeName,':id' => 'other'];
        $stmt = self::executePreparedQuery('ajaxDvicesOffice', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }

    public static function ajaxTempMoved($dvice_id)
    {
        $params = [':dvice_id' => $dvice_id];
        $stmt = self::executePreparedQuery('ajaxTempMoved', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxResentMovedToOfice($form_data)
    {
        self::$instance = static::class;
        $Char = mb_substr($form_data['note_move_to'], 16, 60, 'utf-8');
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':divce_num' => $form_data['divce_num'],
                ':dvice_name' => $form_data['dvice_name'],
                ':dvice_sn' => $form_data['dvice_sn'],
                ':Char' => $Char,
                ':office_name' => $form_data['office_name'],
                ':resen_to_office_date' => $form_data['resen_to_office_date'],
                ':resen_to_office_by' => $form_data['resen_to_office_by']
            ];
            self::executePreparedQuery('ajaxResentMovedToOfice1', $params1);
            $params2 = [':divce_num' => $form_data['divce_num']];
            self::executePreparedQuery('ajaxResentMovedToOfice2', $params2);
            $conn->commit();
            echo "done";
        } catch (\Exception $e) {
            return "not done";
        }
    }
    public static function ajaxAllDvices()
    {
        $stmt = self::executePreparedQuery('ajaxAllDvices', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxRepairDvices()
    {
        $stmt = self::executePreparedQuery('ajaxRepairDvices', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxMoveingDvices()
    {
        $stmt = self::executePreparedQuery('ajaxMoveingDvices', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxReplaceDvices()
    {
        $stmt = self::executePreparedQuery('ajaxReplaceDvices', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxDeletedDvices()
    {
        $stmt = self::executePreparedQuery('ajaxDeletedDvices', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
}
