<?php

function showCars(): void
{
    include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Car.php';

    if(isset($_GET['car'])) {
        $cars = Car::search($_GET['car']);
    } else {
        $cars = Car::all();
    }

    if (count($cars) > 0) {
        echo '<div class="row my-2">';
        echo '<form class="d-flex justify-content-end gap-2" method="get">';
        echo '<input class="form-control" type="search" name="car" id="search" placeholder="Buscar por placa, modelo o marca">';

        echo '<button class="btn btn-primary btn-sm" type="submit">';
        echo '<i class="fas fa-search"></i>';
        echo '</button>';
        echo '</form>';
        echo '</div>';

        foreach ($cars as $car) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="d-grid gap-2">';
            echo '<div class="image-shadow">';
            echo '<img class="rounded mx-auto d-block image" src="/pictures/' . $car['photo'] . '" alt="' . $car['license'] . '">';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="col-md-4">';
            echo '<p class="text">';
            echo '<span class="fw-bold">Placa: </span>';
            echo $car['license'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Modelo: </span>';
            echo $car['model'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Marca: </span>';
            echo $car['brand'];
            echo '</p>';

            echo '<p class="text">';
            echo '<span class="fw-bold">Descripcion: </span>';
            echo '<span class="d-inline-block text-truncate">' . $car['description'] . '</span>';
            echo '</p>';

            echo '<div class="col-md-4">';

            echo "<div class='d-flex gap-4'>";
            echo '<a class="btn btn-warning btn-sm" href="/views/car/edit.php?license=' . $car['license'] . '">Editar</a>';

            echo '<a class="btn btn-danger btn-sm" href="/views/car/delete.php?license=' . $car['license'] . '">Eliminar</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';

        }
    } else {
        echo "<p class='text-muted'>No hay autos agregados</p>";
    }
}