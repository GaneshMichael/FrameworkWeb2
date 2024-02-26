<?php

namespace TCG\Controllers;
use TCG\Core\Application;

class SiteController extends Controller
{
    public function contact()
    {

        return $this->render('contact');
    }
    public function handleContact()
    {
        $body = Application::$app->request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return 'Handling submitted data';
    }

}