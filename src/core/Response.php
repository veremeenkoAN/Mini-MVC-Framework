<?php

namespace Core;

class Response
{

    public function SetResponseCode($code) {
        http_response_code($code);
    }

    public function Redirect($path) {
        header("Location:$path");
    }

}