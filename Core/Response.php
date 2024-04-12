<?php

namespace TCG\Core;

class Response
{
    // Set the HTTP status code.
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    // Redirect the user to the specified URL.
    public function redirect(string $url)
    {
        header('Location: ' . $url);
        exit;
    }

    // Set the content of the response.
    public function setContent($content)
    {
        echo $content;
    }

    // Send the response.
    public function send()
    {
        ob_end_flush();
    }
}