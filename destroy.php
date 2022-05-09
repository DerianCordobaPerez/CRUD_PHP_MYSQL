<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/redirect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Student.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Car.php';

if(isset($_POST['delete'])) {
    $module = $_POST['module'];

    $model = $module::find($_POST['find']);

    if(isset($_POST['photo'])) {
        unlink('uploads/' . $model?->photo);
    }

    $model?->destroy();
}

redirect();