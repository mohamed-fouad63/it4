<?php
$areaName = 'g_shrkia';
$domainName = 'G_SHR-';
$dsn = 'mysql:host=localhost;dbname=' . $areaName;
$username = 'root';
$password = '';
$options = [];
$conn = new \PDO($dsn, $username, $password, $options);

if($conn){
echo 'connected';

$update_all1_moneyCode = $conn->query("UPDATE $areaName.all1 SET $areaName.all1.domain_name = CONCAT('$domainName', $areaName.all1.money_code,'-') WHERE $areaName.all1.office_type IN ('مكتب بريد','مركز خدمات','مكتب متنقل') ");
$pdate_sn = $conn->query("UPDATE $areaName.dvice SET sn = UPPER(sn)");
$update_dvice_name = $conn->query("UPDATE $areaName.dvice
JOIN $areaName.all1 ON $areaName.dvice.office_name = $areaName.all1.office_name AND $areaName.all1.office_type IN ('مكتب بريد','مركز خدمات','مكتب متنقل')
SET pc_doman_name = CONCAT($areaName.all1.domain_name,RIGHT(sn, 3))");
} else {
    echo 'not connected';
}
?>