<?php

namespace Core;

class Request
{

    private $uri;
    private $method;

    public function __construct() {

        $this->uri = $this->GetReadyUri($_SERVER['REQUEST_URI']);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getpath() {
        return $this->uri;

    }

    public function getmethod() {
        return $this->method;

    }

    public function GetReadyUri($uri) {
        //web uri only consists of English letters, that's why I used strlen instead of mb_str_len
        $result = '';
        for ($i = 0 ; $i < strlen($uri); $i++) {
            if ($uri[$i] == "?") {
                return $result;
            }
            $result .= $uri[$i];
        }
        return $result;
    }

}