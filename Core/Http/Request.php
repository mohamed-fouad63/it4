<?php

namespace Core\Http;

use Core\Http\Validate;

class Request
{
    private $uri;
    private $method;
    private $valid;
    private $vali;
    private $headers;
    private $requsetData = [];

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->headers = getallheaders();
        $this->vali = new Validate();
    }

    public function validate($validate)
    {
        $data = $this->vali::{$this->method}($validate);
        $this->valid = $data->isValid();
        return $this->requsetData = $data->all();
    }
    public function all(string $dataFormate = 'array')
    {
        if ($this->isValid()) {
            return $this->dataFormate($this->requsetData,$dataFormate);
        } else {
            return $this->dataFormate($this->requsetData,$dataFormate);
        }
    }

    public function dataFormate($data ,$dataType)
    {
        switch ($dataType) {
            case 'json':
                return json_encode($data, JSON_UNESCAPED_UNICODE);
            case 'array':
                return $data;
        }
    }
    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function isGet()
    {
        return $this->method === 'GET';
    }

    public function isPost()
    {
        return $this->method === 'POST';
    }
    public function isValid()
    {
        return $this->valid === true;
    }

    public function isAjax()
    {
        return strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    public function header($headerName = NULL) {
        return $this->headers[$headerName] ?? $this->headers;
    }
    public function __get($property)
    {
        if (array_key_exists($property, $this->requsetData)) {
            return $this->requsetData[$property];
        } else {
            return false;
        }
    }
}
