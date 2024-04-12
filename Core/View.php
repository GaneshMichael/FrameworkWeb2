<?php

namespace TCG\Core;

class View
{
    protected string $layout = 'base';
    public string $title = '';

    // Render a view with optional layout.
    public function render($view, $data = [], $layout = 'base'): void
    {
        $this->layout = $layout;

        extract($data);

        ob_start();
        include_once "Views/$view.php";
        $content = ob_get_clean();

        ob_start();
        include_once "Views/Layouts/$this->layout.php";
        $layoutContent = ob_get_clean();

        $layoutContent = str_replace('{{content}}', $content, $layoutContent);

        echo $layoutContent;
    }
}