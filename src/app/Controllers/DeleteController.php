<?php

namespace App\Controllers;

class DeleteController
{

    public function index() {

        unset($_SESSION['name']);
        app()->response->Redirect('/');

    }
}