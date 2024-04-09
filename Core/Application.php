<?php

namespace TCG\Core;

use TCG\Models\UserModel;

class Application
{

    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public ?UserModel $user = null;

    public function __construct(Router $router, Request $request, Response $response, Session $session, UserModel $user = null)
    {
        self::$app = $this;
        $this->router = $router;
        $this->request = $request;
        $this->response = $response;
        $this->session = $session;
        $this->user = $user;
    }

    public function run()
    {
        try {
            $this->router->resolve($this->request);
        } catch (\Exception $e) {
            $this->response->setStatusCode((int)$e->getCode());
            $this->response->setContent($e->getMessage());
        }

        $this->response->send();
    }
}