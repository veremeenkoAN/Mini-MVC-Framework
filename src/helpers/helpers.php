<?php


function app() {
    global $app;
    return $app;
}

function makequery($query,$data = []) {
    app()->database->query($query,$data);
}

