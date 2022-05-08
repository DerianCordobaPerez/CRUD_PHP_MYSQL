<?php
include_once 'helpers/Image.php';
include_once 'helpers/redirect.php';
include_once 'models/Student.php';

$image = Image::isValid();

if(!$image) {
    echo 'ERROR / Ocurrio un problema al subir la imagen';
} else if(move_uploaded_file($_FILES['photo']['tmp_name'], 'pictures/'.basename($_FILES['photo']['name']))) {
    $student = Student::find($_POST['license']);

    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->age = $_POST['age'];
    $student->course = $_POST['course'];
    $student->photo = htmlspecialchars(basename($_FILES['photo']['name']));

    $student->update();
}

redirect();