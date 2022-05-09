<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Image.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/redirect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Student.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Car.php';

$image = Image::isValid();

if(!$image) {
    echo 'ERROR / Ocurrio un problema al subir la imagen';
} else if(move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/pictures/'.basename($_FILES['photo']['name']))) {
    $module = $_POST['module'];

    $model = new $module();

    foreach ($_POST as $key => $value) {
        if ($key != 'module' && $key != 'photo') {
            $model->$key = $value;
        }
    }

    if($_FILES['photo']['name'] != '') {
        $model->photo = htmlspecialchars(basename($_FILES['photo']['name']));
    }

    $model->store();
}

redirect();
