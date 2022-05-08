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

                    <h3 class="fw-bold">Agregar Estudiante</h3>
                    <h5 class="text-muted">Rellene el formulario con los datos de estudiante</h5>

                    <form action="store.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="module" value="Student">

                        <label for="email">Correo</label>
                        <div class="input-group">
                          <span class="input-group-text">
                            <span class="fw-bold">@</span>
                          </span>
                            <input class="form-control" type="email" name="email" placeholder="Correo" required>
                        </div>

                        <label for="name">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fw-bold far fa-user" aria-hidden="true"></i>
                            </span>
                            <input class="form-control" type="text" name="name" maxlength="200" placeholder="Nombre"
                                   required>
                        </div>


                        <label for="carnet">Carnet</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fw-bold far fa-id-card" aria-hidden="true"></i>
                            </span>
                            <input class="form-control" type="text" name="license" maxlength="10" placeholder="Carnet"
                                   required>
                        </div>

                        <label for="edad">Edad</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <span class="fw-bold">18</span>
                            </span>
                            <input class="form-control" type="number" name="age" min="15" max="50" placeholder="Edad"
                                   required>
                        </div>

                        <label for="curso">Curso</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fw-bold fas fa-graduation-cap" aria-hidden="true"></i>
                            </span>

                            <input class="form-control" type="number" name="course" min="1" max="5" placeholder="Curso"
                                   required>
                        </div>

                        <label for="foto">Foto</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fw-bold fas fa-images" aria-hidden="true"></i>
                            </span>
                            <input class="form-control" type="file" name="photo" required>
                        </div>

                        <div class="d-grid gap-2">
                            <div class="input-group">
                                <input class="btn btn-primary my-2 button-width" type="submit" name="send"
                                       value="Enviar">
                            </div>
                        </div>
                    </form>
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

                    <div class="row my-2">
                        <form class="d-flex justify-content-end gap-2" method="get">
                            <input class="form-control" type="search" name="search" id="search" placeholder="Buscar por nombre, carnet o email">

                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <?php
                    include_once 'models/Student.php';

                    if(isset($_GET['search'])) {
                        $students = Student::search($_GET['search']);
                    } else {
                        $students = Student::all();
                    }

                    if (count($students) > 0) {
                        foreach ($students as $student) {
                            echo '<div class="row">';
                            echo '<div class="col-md-4">';
                            echo '<div class="d-grid gap-2">';
                            echo '<div class="image-shadow">';
                            echo '<img class="rounded mx-auto d-block image" src="pictures/' . $student['photo'] . '" alt="' . $student['name'] . '">';
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
                            echo '<a class="btn btn-warning btn-sm" href="edit.php?license=' . $student['license'] . '">Editar</a>';

                            echo '<a class="btn btn-danger btn-sm" href="delete.php?license=' . $student['license'] . '">Eliminar</a>';
                            echo '</div>';
                            echo '</div>';

                            echo '</div>';

                        }
                    } else {
                        echo "<p class='text-muted'>No hay alumnos agregados</p>";
                    }
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