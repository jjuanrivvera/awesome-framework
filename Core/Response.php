<?php
//Create a Response class for the application
namespace Core;

class Response
{
    /**
     * @var string
     */
    protected $content;
    
    /**
     * @var int
     */
    protected $statusCode;
    
    /**
     * @var array
     */
    protected $headers = [];
    
    /**
     * @var string
     */
    protected $mimeType = 'text/html';
    
    /**
     * @var string
     */
    protected $charset = 'utf-8';
    
    /**
     * @var string
     */
    protected $statusText = '';
    
    /**
     * @var array
     */
    protected $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    ];

    /**
     * Constructor
     * @param string $content The response content
     * @param int $statusCode The response status code
     * @param array $headers The response headers
     */
    public function __construct($content = '', $statusCode = 200, array $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * Get the response content
     * @return string The response content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the response content
     * @param string $content The response content
     * @return Response The current response
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get the response status code
     * @return int The response status code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the response status code
     * @param int $statusCode The response status code
     * @return Response The current response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Get the response headers
     * @return array The response headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the response headers
     * @param array $headers The response headers
     * @return Response The current response
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Get the response mime type
     * @return string The response mime type
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set the response mime type
     * @param string $mimeType The response mime type
     * @return Response The current response
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Get the response charset
     * @return string The response charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * Set the response charset
     * @param string $charset The response charset
     * @return Response The current response
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * Get the response status text
     * @return string The response status text
     */
    public function getStatusText()
    {
        return $this->statusText;
    }

    /**
     * Set the response status text
     * @param string $statusText The response status text
     * @return Response The current response
     */
    public function setStatusText($statusText)
    {
        $this->statusText = $statusText;
        return $this;
    }

    /**
     * Get the response status text
     * @return string The response status text
     */
    public function getStatusTexts()
    {
        return $this->statusTexts;
    }

    /**
     * Set the response status text
     * @param string $statusText The response status text
     * @return Response The current response
     */
    public function setStatusTexts(array $statusTexts)
    {
        $this->statusTexts = $statusTexts;
        return $this;
    }

    /**
     * Get the response status text
     * @return string The response status text
     */
    public function getStatusTextByCode($statusCode)
    {
        return $this->statusTexts[$statusCode];
    }

    /**
     * Set the response status text
     * @param string $statusText The response status text
     * @return Response The current response
     */
    public function setStatusTextByCode($statusCode, $statusText)
    {
        $this->statusTexts[$statusCode] = $statusText;
        return $this;
    }

    /**
     * Get the response headers
     * @return array The response headers
     */
    public function getHeader($name)
    {
        return $this->headers[$name];
    }

    /**
     * Set the response headers
     * @param array $headers The response headers
     * @return Response The current response
     */
    public function setHeader($name, $header)
    {
        $this->headers[$name] = $header;
        return $this;
    }

    /**
     * Get the response headers
     * @return array The response headers
     */
    public function getHeaderByName($name)
    {
        return $this->headers[$name];
    }

    /**
     * Set the response headers
     * @param array $headers The response headers
     * @return Response The current response
     */
    public function setHeaderByName($name, $header)
    {
        $this->headers[$name] = $header;
        return $this;
    }

    /**
     * Send the response with the current status code and content
     */
    public function send()
    {
        http_response_code($this->statusCode);
        $this->sendHeaders();
        $this->sendContent();
    }

    /**
     * Send the response headers
     */
    public function sendHeaders()
    {
        if (!headers_sent()) {
            foreach ($this->headers as $name => $header) {
                header($name . ': ' . $header);
            }
        }
    }

    /**
     * Send the response content
     */
    public function sendContent()
    {
        echo $this->content;
    }

    /**
     * Send the response with the current status code and content
     */
    public function __toString()
    {
        $this->send();
        return '';
    }

    /**
     * Send the response with the current status code and content
     */
    public function toString()
    {
        $this->send();
        return '';
    }

    /**
     * Send the response with the current status code and content
     */
    public function __invoke()
    {
        $this->send();
    }
}
