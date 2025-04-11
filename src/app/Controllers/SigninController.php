<?php

namespace App\Controllers;
use \App\Model\Signin;

class SigninController extends BaseController
{
    public function index() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo $this->render('signin');
        }
        else {
            $model = new Signin();
            $model->autoload();
            $model->validate();
            if ($model->checkerrors()) {
                app()->session->setErrorflash('НЕПРАВИЛЬНЫЙ ЛОГИН ИЛИ ПАРОЛЬ');
                echo app()->view->render('signin',$model->getmerge());
                exit();
            }
            makequery("SELECT * FROM users WHERE email = ?",[$model->get()['email']]);
            if ($user = app()->database->GetResult()) {
                if ($model->equal($user[0]['password'],$model->get()['password'])) {
                    app()->session->setSuccessflash('ВЫ УСПЕШНО АВТОРИЗИРОВАНЫ');
                    $_SESSION['name'] = $user[0]['name'];
                    app()->response->Redirect('/');
                }
                else {
                    $this->incorrect($model);
                }
            }
            else {
                $this->incorrect($model);
            }
            exit();
        }
    }

    public function incorrect($model) {
        app()->session->setErrorflash('НЕПРАВИЛЬНЫЙ ЛОГИН ИЛИ ПАРОЛЬ');
        echo app()->view->render('signin',$model->getmerge());
    }
}