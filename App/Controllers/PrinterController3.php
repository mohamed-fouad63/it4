<?php

namespace App\Controllers;

class PrinterController
{
    private $ipAddress;
    private $community;
    public $snmpObject;
    public $errorCode;
    public $values = [];
    private $oids = [
        'lexmark' => [
            'name' =>       '1.3.6.1.2.1.25.3.2.1.3.1',
            'ready' =>      '1.3.6.1.2.1.43.16.5.1.2.1.1',
            'toner' =>      '1.3.6.1.2.1.43.11.1.1.9.1.1',
            'notReady' =>   '1.3.6.1.2.1.43.18.1.1.8.1.6',
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
        $this->snmpObject = new \SNMP(\SNMP::VERSION_2C, $this->ipAddress, $this->community, 1000, 1);
    }

    public function checkIp()
    {
        return !empty($_POST['ip']) ? true : false;
    }

    public function isOnLine()
    {
        return $this->snmpObject->getnext('1.3.6.1.2') ? true : false;
    }
    
public function isReady(){
    return $this->snmpObject->getnext($this->oids['lexmark']['ready']) ? true : false;
}

public function getReadyStatusVal(){
    if($this->isReady()){
        $ready = $this->snmpObject->getnext($this->oids['lexmark']['ready']);

    }else{
        $notReady = $this->snmpObject->getnext($this->oids['lexmark']['notReady']);
    }
}
    public function getOidsVal()
    {
        foreach ($this->oids['lexmark'] as $key => $oid) {
            $snmpValue2 = $this->snmpObject->get($oid);
            $snmpValue2 = str_replace('"', '', explode(':', $snmpValue2)[1]);
            // $snmpValue = () ? '...' : $snmpValue;
            $this->values[$key] = $snmpValue2;
        }
    }

    function handleOidsVal($oidVal){
     return str_replace('"', '', explode(':', $oidVal)[1]);
    }
    public function getValues()
    {
        if ($this->isOnLine()) {
            // $this->getOidsVal();
            $this->getPrinterName();
            $this->getTonerLevel();
            $this->getPrinterStatus();
        } else {
            $status = $this->checkIp() ? 'off line printer' : 'قم بادخال IP الطابعه';
            $this->values['name'] = '';
            $this->values['ready'] = $status;
            $this->values['toner'] = '';
            $this->values['notReady'] = $this->getPrinterStatus();
        }

        header('Content-Type: application/json');
        $jsonData = json_encode($this->values);
        return $jsonData;
    }
    // public function getValues()
    // {
    //     if ($this->isOnLine()) {
    //         // $this->getOidsVal();
    //         $this->getPrinterName();
    //         $this->getTonerLevel();
    //         $this->getPrinterStatus();
    //     } else {
    //         $status = $this->checkIp() ? 'off line printer' : 'قم بادخال IP الطابعه';
    //         $this->values['name'] = '';
    //         $this->values['ready'] = $status;
    //         $this->values['toner'] = '';
    //         $this->values['notReady'] = '';
    //     }

    //     header('Content-Type: application/json');
    //     $jsonData = json_encode($this->values);
    //     return $jsonData;
    // }

    public function getPrinterStatus()
    {
        if($this->isReady()){
            $printerReady = $this->snmpObject->get($this->oids['lexmark']['ready']);
            $this->values['ready'] = $this->handleOidsVal($printerReady);
            $this->values['notReady'] = '';
        }else{
            $printerNorReady = $this->snmpObject->getnext('1.3.6.1.2.1.43.18.1.1.8.1');
            $this->values['notReady'] = $this->handleOidsVal($printerNorReady);
            $this->values['ready'] = '';
        }

    }

    public function getPrinterName()
    {
        $printerName = $this->snmpObject->get($this->oids['lexmark']['name']);
        $this->values['name'] = $this->handleOidsVal($printerName);
    }
    public function getTonerLevel()
    {
        $printerToner = $this->snmpObject->get($this->oids['lexmark']['toner']);
        $this->values['toner'] = $this->handleOidsVal($printerToner);
    }

    public function __destruct()
    {
        $this->snmpObject->close();
    }
}