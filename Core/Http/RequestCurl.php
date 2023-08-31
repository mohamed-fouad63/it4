<?php

namespace Core\Http;

class RequestCurl
{
    private $url;
    private $headers;
    private $data;
    private $options;

    public function __construct($url)
    {
        $this->url = $url;
        $this->headers = array();
        $this->data = array();
        $this->options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        );
    }

    public function setHeader($header)
    {
        $this->headers[] = $header;
    }

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
    }

    public function send()
    {
        $curl = curl_init();

        // Set the URL
        curl_setopt($curl, CURLOPT_URL, $this->url);

        // Set the headers
        if (!empty($this->headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        }

        // Set the data
        if (!empty($this->data)) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->data));
        }

        // Set the options
        curl_setopt_array($curl, $this->options);

        // Send the request
        $response = curl_exec($curl);

        // Check for errors
        if ($response === false) {
            throw new \Exception(curl_error($curl), curl_errno($curl));
        }

        // Close the cURL session
        curl_close($curl);

        return $response;
    }
}
