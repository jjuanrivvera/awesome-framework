<?php

namespace App\Http;

use Awesome\Request as AwesomeRequest;

class Request extends AwesomeRequest
{
    public function __construct($method, $headers, $body, $uri)
    {
        $this->method = $method;
        $this->headers = $this->normalizeHeaders($headers);
        $this->body = $body;
        $this->uri = $uri;
    }

    public function normalizeHeaders($data)
    {
        $headers = [];
        
        foreach ($data as $name => $value) {
            $headers[ucwords(strtolower($name))] = $value;
        }

        return $headers;
    }
}
