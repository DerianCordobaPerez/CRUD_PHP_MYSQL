<?php   

    include_once 'models/Student.php';

    Student::$course = 5;

    $student1 = new Student();
    $student1->name = 'Absalon';
    $student1->surname = 'Zavala';
    $student1->age = 21;

    echo $student1->getFullName();

    echo '<br>';

    $student2 = new Student();
    $student2->name = 'Miguel';
    $student2->surname = 'Pereira';
    $student2->age = 21;

    echo $student2->getFullName();