<?php

namespace App\Controllers;
use \App\Model\SignUp;
class SignupController extends BaseController
{
    public function index() {

        if (app()->request->getmethod() == 'GET') {
            echo $this->render('signup');
        }
        else {
            $model =  new SignUp();
            $model->autoload();
            $model->validate();
            if ($model->checkerrors()) {
                echo app()->view->render('/signup',$model->getmerge());
                return;
            }
            $data = $model->get();
            extract($data);
            app()->database->query("SELECT * FROM $model->table WHERE email = ?",[$email]);
            if (!empty(app()->database->GetResult())) {
                $model->errors['email']['taken'] = 'This email is already taken';
                echo app()->view->render('/signup',$model->getmerge());
                exit();
            }
            $password = password_hash($model->get()['password'],PASSWORD_DEFAULT);
            app()->session->setSuccessflash('ВЫ БЫЛИ УСПЕШНО ЗАРЕГИСТРИРОВАНЫ');
            app()->database->query("INSERT INTO $model->table (name,lastname,email,password) VALUES (?,?,?,?)",[$name,$lastname,$email,$password]);
            app()->response->redirect('/signin');
            exit();
        }
    }

}