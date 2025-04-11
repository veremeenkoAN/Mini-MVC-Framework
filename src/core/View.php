<?php

namespace Core;

class View
{
    private $content;

    public function render(string $path,$data = [],$layout = 'default') {

        $contentpath = PAGES . "/{$path}" . '.php';

        extract($data);
        if (!file_exists($contentpath)) {
            app()->response->SetResponseCode(500);
            require ERRORS . '/500.php';
            exit();
        }
        else {
            ob_start();
            require $contentpath;
            $this->content = ob_get_clean();
        }
        $layout = PAGES . "/Layout/{$layout}" . '.php';
        if (!file_exists($contentpath)) {
            app()->response->SetResponseCode(500);
            require ERRORS . '/500.php';
            exit();
        }
        ob_start();
        require $layout;
        return  ob_get_clean();



    }

}