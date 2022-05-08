<?php
include_once 'helpers/redirect.php';
include_once 'models/Student.php';

if(isset($_POST['delete'])) {
    $student = Student::find($_POST['license']);

    unlink('uploads/' . $student?->photo);
    $student?->destroy();
}

redirect();