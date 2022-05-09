<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/index.css">
    <title>Inicio</title>
</head>

<body>

<div class="header">
    <p class="text-center title">Practica #04</p>
    <p class="text-center title">Acceso a Base de datos</p>
</div>

<div class="container">
    <div class="accordion mb-4" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                    Formulario alumnos
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-6 border-end">
                            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/views/student/create.php'; ?>
                        </div>

                        <div class="col-md-6">
                            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/views/car/create.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Listado alumnos
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="text-center">Imagen</h3>
                        </div>

                        <div class="col-md-4">
                            <h3 class="text-center">Informacion</h3>
                        </div>

                        <div class="col-md-4">
                            <h3 class="text-center">Acciones</h3>
                        </div>
                    </div>

                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/views/student/index.php';
                        include_once $_SERVER['DOCUMENT_ROOT'] . '/views/car/index.php';
                        showStudents();

                        echo '<hr>';

                        showCars();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/0496ae07d8.js" crossorigin="anonymous"></script>
</body>

</html>