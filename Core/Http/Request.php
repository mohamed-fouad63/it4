<?php

namespace Core\Http;

class Request
{
    private $uri;
    private $method;
    private $query;
    private $params = array();
    private $headers = array();
    private $cookies = array();
    private $files = array();

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->query = $_SERVER['QUERY_STRING'];
        $this->params = $_REQUEST;
        $this->headers = getallheaders();
        $this->cookies = $_COOKIE;
        $this->files = $_FILES;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getParams() // get all requested data both GET or POST $_REQUEST
    {
        return $this->params;
    }

    public function getParam($key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getHeader($header_name)
    {
        $header_name = strtolower($header_name);
        foreach ($this->headers as $name => $value) {
            if (strtolower($name) === $header_name) {
                return $value;
            }
        }
        return null;
    }

    public function getCookies()
    {
        return $this->cookies;
    }

    public function getCookie($cookie_name)
    {
        return isset($this->cookies[$cookie_name]) ? $this->cookies[$cookie_name] : null;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getFile($file_name)
    {
        return isset($this->files[$file_name]) ? $this->files[$file_name] : null;
    }

    public function isGet()
    {
        return $this->method === 'GET';
    }

    public function isPost()
    {
        return $this->method === 'POST';
    }

    public function isAjax()
    {
        return strtolower($this->getHeader('X-Requested-With')) === 'xmlhttprequest';
    }

    public function getIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
};
