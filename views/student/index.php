<?php

function showStudents(): void
{
    include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Student.php';

    if(isset($_GET['student'])) {
        $students = Student::search($_GET['student']);
    } else {
        $students = Student::all();
    }

    if (count($students) > 0) {
        echo '<div class="row my-2">';
        echo '<form class="d-flex justify-content-end gap-2" method="get">';
        echo '<input class="form-control" type="search" name="student" id="search" placeholder="Buscar por nombre, carnet o email">';

        echo '<button class="btn btn-primary btn-sm" type="submit">';
        echo '<i class="fas fa-search"></i>';
        echo '</button>';
        echo '</form>';
        echo '</div>';

        foreach ($students as $student) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="d-grid gap-2">';
            echo '<div class="image-shadow">';
            echo '<img class="rounded mx-auto d-block image" src="/pictures/' . $student['photo'] . '" alt="' . $student['photo'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="col-md-4">';
            echo '<p class="text">';
            echo '<span class="fw-bold">Nombre: </span>';
            echo $student['name'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Email: </span>';
            echo $student['email'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Edad: </span>';
            echo $student['age'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Carnet: </span>';
            echo $student['license'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="text-strong">Curso: </span>';
            echo $student['course'];
            echo '</p>';
            echo '</div>';

            echo '<div class="col-md-4">';

            echo "<div class='d-flex gap-4'>";
            echo '<a class="btn btn-warning btn-sm" href="views/student/edit.php?license=' . $student['license'] . '">Editar</a>';

            echo '<a class="btn btn-danger btn-sm" href="views/student/delete.php?license=' . $student['license'] . '">Eliminar</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';

        }
    } else {
        echo "<p class='text-muted'>No hay alumnos agregados</p>";
    }
}