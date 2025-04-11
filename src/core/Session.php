<?php

namespace Core;

class Session
{

    public function __construct(){
        session_start();
    }

    public function setSuccessflash($text) {
        $_SESSION['flash']['success'] = $text;
    }

    public function getflash($result) {
        $savedata = $_SESSION['flash'][$result];
        unset($_SESSION['flash'][$result]);
        return $savedata;
    }

    public function setErrorflash($text) {
        $_SESSION['flash']['error'] = $text;
    }



}