<?php

namespace Core\Http;

use Core\View;

class Response
{
    protected int $statusCode;
    protected array $headers = [];
    protected ?string $body;

    public function __construct(string $body = null, int $code = 200)
    {
        $this->body = $body;
        $this->statusCode = $code;
    }

    public static function error(string $body, int $code = 500): Response
    {
        return new Response(View::error($body), $code);
    }

    public static function view(string $view, array $args = []): Response
    {
        return new Response(View::render($view, $args));
    }

    public static function redirect(string $uri, array $query = []): Response
    {
        $query = array_filter($query);

        return (new Response(null, 302))
            ->setHeader(
                "Location",
                "http://localhost/" . $uri . ((!empty($query)) ? '?' . http_build_query($query) : '')
            );
    }

    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function send()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $header => $value) {
            header(strtoupper($header) . ': ' . $value);
        }

        if ($this->body) {
            echo $this->body;
        }
    }
}