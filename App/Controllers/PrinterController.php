<?php

namespace App\Controllers;

class PrinterController
{
    private $ipAddress;
    private $community;
    public $snmpObject;
    public $snmp;
    public $errorCode;
    public $values = [];
    private $oids1 = [
        'lexmark' => [
            'name' =>       '1.3.6.1.2.1.25.3.2.1.3.1',
            'ready' =>      '1.3.6.1.2.1.43.16.5.1.2.1.1',
            'toner' =>      '1.3.6.1.2.1.43.11.1.1.9.1.1',
            'notReady' =>   '1.3.6.1.2.1.43.18.1.1.8.1.6',
        ],
    ];

    private $oids = [
        'lexmark' => [
            'name' =>       '1.3.6.1.2.1.25.3.2.1.3.1',
            'ready' =>      '1.3.6.1.2.1.43.16.5.1.2.1.1',
            'toner' =>      '1.3.6.1.2.1.43.11.1.1.9.1.1',
        ],
    ];
    public $printerStatus = [];
//3.6.1.2.1.43.18.1.1.8.1.6 close front door
//3.6.1.2.1.43.18.1.1.8.1.7: STRING: "Load Tray 1 with Plain Paper A4"
//3.6.1.2.1.43.18.1.1.8.1.6.1.55: STRING: "Load Tray 1 with Plain Paper A4"
//3.6.1.2.1.43.18.1.1.8.1.18: STRING: "Tray 1 Empty"
//3.6.1.2.1.43.18.1.1.8.1.3: STRING: "31.01 Replace defective or missing cartridge "
    public function __construct()
    {
        error_reporting(E_ERROR | E_PARSE);
        $this->ipAddress = $_POST['ip'];
        $this->community = 'public';
        $this->snmp = new \SNMP(\SNMP::VERSION_2C, $this->ipAddress, $this->community);

    }
    function handleOidsVal($oidVal){
     return str_replace('"', '', explode(':', $oidVal)[1]);
    }
    public function getValues1()
    {
        // if(empty($_POST['ip'])){
        //     $this->values['name'] = "";
        //     $this->values['ready'] ="ادخل IP الطابعه";
        //     $this->values['toner'] = "";
        //     $this->values['notReady'] ="";
        // }else if(!snmp2_get($this->ipAddress, $this->community, "1.3.6.1.2.1.1.1.0",1000,2)){
        //     $this->values['name'] = "";
        //     $this->values['ready'] ="الطابعه غير متصله بالشبكه";
        //     $this->values['toner'] = "";
        //     $this->values['notReady'] ="";
        // }else{
        //     $this->values['name'] = snmp2_get($this->ipAddress, $this->community, "1.3.6.1.2.1.25.3.2.1.3.1",1000,2);
        //     $this->values['ready'] = snmp2_get($this->ipAddress, $this->community, "1.3.6.1.2.1.43.16.5.1.2.1.1",1000,2);
        //     $this->values['toner'] = snmp2_get($this->ipAddress, $this->community, "1.3.6.1.2.1.43.11.1.1.9.1.1",1000,5);
        //     $this->values['notReady'] =snmpgetnext($this->ipAddress, $this->community, '1.3.6.1.2.1.43.18.1.1.8') ? "" : "yes";
        // }


        header('Content-Type: application/json');
        $jsonData = json_encode($this->values);
        return $jsonData;
    }

    function getValues() {
        
        foreach ($this->oids['lexmark'] as $key => $oid) {
            $oidValue = $this->snmp->get($oid);
            if ($oidValue === false) {
                return false;
            }
            $this->values[$key] = $oidValue;
        }
        header('Content-Type: application/json');
        $jsonData = json_encode($this->values);
        return $jsonData;
    }
}