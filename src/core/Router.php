<?php

namespace Core;

class Router
{
    public Response $response ;
    public Request $request ;

    public $routers = ['GET'=> [], 'POST' => []];

    public function __construct($request, $response) {
        $this->response = $response;
        $this->request = $request;
    }

    public function add(string $path,$data = [],$methods = []) {
        $methods = array_map('strtoupper',$methods);
        foreach ($methods as $value) {
            $rout = [];
            $rout['method'] =  strtoupper($value);
            $rout['callback'] = $data;
            $rout['path'] = "/" . trim($path,'/');
            $rout['middleware'] = null;
            $this->routers[$value][] = $rout;
        }
        return $this;
    }

    public function only($middleware,$methods) {
        $methods = array_map('strtoupper',$methods);
        foreach ($methods as $value) {
            $this->routers[$value][count($this->routers[$value]) - 1]['middleware'] = $middleware;
        }
    }

    public function Call($method,$path) {
        foreach ($this->routers[$method] as $key => $value) {
            if ($value['path'] == $path) {
                if ($value['middleware']) {
                    $class = "\\" . $value['middleware'][0];
                    (new $class)->{$value['middleware'][1]}();
                }
                return $value['callback'];
            }
        }
    }

    public function dispatch() {
        $method = $this->request->getmethod();
        $path = $this->request->getpath();
        if (!$callback = $this->Call($method,$path)) {
             app()->response->SetResponseCode(404);
             require ERRORS . '/404.php';
             exit();
        }
        (new $callback[0])->{$callback[1]}();
    }

}