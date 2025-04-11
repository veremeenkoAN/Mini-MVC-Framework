<?php

namespace Core;

class Controller
{

    public function render($path,$data = [],$layout = 'default') {
        return app()->view->render($path,$data,$layout);
    }

}