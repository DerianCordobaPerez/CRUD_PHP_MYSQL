<?php

include_once 'helpers/Image.php';
include_once 'helpers/redirect.php';
include_once 'models/Student.php';

$image = Image::isValid();

if(!$image) {
    echo 'ERROR / Ocurrio un problema al subir la imagen';
} else if(move_uploaded_file($_FILES['photo']['tmp_name'], 'pictures/'.basename($_FILES['photo']['name']))) {
    $module = $_POST['module'];

    $model = new $module();

    foreach ($_POST as $key => $value) {
        if ($key != 'module' && $key != 'photo') {
            $model->$key = $value;
        }
    }

    $model->photo = htmlspecialchars(basename($_FILES['photo']['name']));

    $model->store();
}

redirect();
