<?php

namespace Core;

class Application
{
    public Request $request;
    public Response $response;
    public Database $database;
    public Router $router;
    public Session $session;
    public View $view;



    public function __construct() {
        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->database = new Database();
        $this->router = new Router($this->request,$this->response);
        $this->view = new View();
        $this->uri = $_SERVER['REQUEST_URI'];

    }

    public function Run() {
        $this->router->dispatch();
    }

}