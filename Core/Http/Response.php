<?php

namespace Core\Http;

class Response
{
    protected $headers = [];
    protected $body;
    protected $statusCode;

    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    public function setstatuscode(int $code)
    {
        http_response_code($code);
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function send()
    {
        header("HTTP/1.1 $this->statusCode");
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
        echo $this->body;
    }

    public function setError($message)
    {
        $this->setStatusCode(500);
        $this->setBody($message);
    }
}
