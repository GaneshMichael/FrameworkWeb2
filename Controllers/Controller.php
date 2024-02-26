<?php
namespace TCG\Controllers;

class Controller
{
    protected function render($view, $data = []): void
    {
        extract($data);

        include "Views/$view.php";
    }

}