<?php

namespace App\Controllers;

class MainController extends BaseController
{

    public function index() {

        echo $this->render('index');

    }

}