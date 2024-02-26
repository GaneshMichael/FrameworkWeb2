<?php

namespace TCG\Controllers;
use TCG\Core\Controller;
use TCG\Core\Request;

class SiteController extends Controller
{
    public function contact()
    {
        return $this->render('contact');
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return 'Handling submitted data';
    }

    public function decks()
    {
        return $this->render('decks');
    }

    public function cardDatabase()
    {
        return $this->render('cardDatabase');
    }

}