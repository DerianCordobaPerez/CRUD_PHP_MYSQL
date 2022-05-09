<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Student.php';
$student = Student::find($_GET['license']);

if(!$student) {
    redirect();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/index.css">
    <title>Editar alumno</title>
</head>

<body>
<div class="container bg-light my-4 p-2 shadow rounded">
    <h3 class="fw-bold">Editar Estudiante</h3>
    <h5 class="text-muted">Rellene el formulario con los datos de estudiante</h5>

    <form action="/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="module" value="Student">

        <label for="email">Correo</label>
        <div class="input-group">
        <span class="input-group-text">
          <span class="fw-bold">@</span>
        </span>
            <input class="form-control" type="email" name="email" value="<?php echo $student->email; ?>" placeholder="Correo" required>
        </div>

        <label for="name">Nombre</label>
        <div class="input-group">
        <span class="input-group-text">
          <i class="fw-bold far fa-user" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="text" name="name" value="<?php echo $student->name; ?>" maxlength="200" placeholder="Nombre" required>
        </div>

        <label for="license">Carnet</label>
        <div class="input-group">
        <span class="input-group-text">
          <i class="fw-bold far fa-id-card" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="text" name="find" value="<?php echo $student->license; ?>" maxlength="10" placeholder="Carnet" readonly>
        </div>

        <label for="age">Edad</label>
        <div class="input-group">
        <span class="input-group-text">
          <span class="fw-bold">18</span>
        </span>
            <input class="form-control" type="number" name="age" value="<?php echo $student->age; ?>" min="15" max="50" placeholder="Edad" required>
        </div>

        <label for="course">Curso</label>
        <div class="input-group">
        <span class="input-group-text">
          <i class="fw-bold fas fa-graduation-cap" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="number" name="course" value="<?php echo $student->course; ?>" min="1" max="5" placeholder="Curso" required>
        </div>

        <label for="photo">Foto</label>
        <div class="input-group">
        <span class="input-group-text">
          <i class="fw-bold fas fa-images" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="file" name="photo" required>
        </div>

        <div class="d-grid gap-2">
            <div class="input-group">
                <input class="btn btn-primary my-2 button-width" type="submit" name="send" value="Enviar">
            </div>
        </div>
    </form>
</div>

<script src="https://kit.fontawesome.com/0496ae07d8.js" crossorigin="anonymous"></script>
</body>

</html>