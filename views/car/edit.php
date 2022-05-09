<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/models/Car.php';
$car = Car::find($_GET['license']);

if(!$car) {
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
    <title>Editar auto</title>
</head>

<body>
<div class="container bg-light my-4 p-2 shadow rounded">
    <h3 class="fw-bold">Editar Auto</h3>
    <h5 class="text-muted">Rellene el formulario con los datos del auto</h5>

    <form action="/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="module" value="Car">
        <input type="hidden" name="find" value="<?php echo $car->license ?>" />

        <label for="license">Placa</label>
        <div class="input-group">
        <span class="input-group-text">
            <span class="fw-bold">@</span>
        </span>
            <input class="form-control" type="text" name="license" id="license" placeholder="Placa" value="<?php echo $car->license ?>" minlength="1" maxlength="10" readonly />
        </div>

        <label for="model">Modelo</label>
        <div class="input-group">
        <span class="input-group-text">
            <i class="fw-bold far fa-id-card" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="text" name="model" id="model" placeholder="Modelo" value="<?php echo $car->model ?>" required />
        </div>

        <label for="brand">Marca</label>
        <div class="input-group">
        <span class="input-group-text">
            <i class="fw-bold far fa-user" aria-hidden="true"></i>
        </span>
            <input class="form-control" type="text" name="brand" id="brand" value="<?php echo $car->brand ?>" maxlength="200" placeholder="Marca" required />
        </div>

        <label for="description">Descripcion</label>
        <div class="input-group">
        <span class="input-group-text">
            <i class="fw-bold fas fa-graduation-cap" aria-hidden="true"></i>
        </span>

            <textarea class="form-control" name="description" rows="3" id="description" placeholder="Descripcion" required><?php echo $car->description ?></textarea>
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
                <input class="btn btn-primary my-2 button-width" type="submit" name="send"
                       value="Enviar">
            </div>
        </div>
    </form>
</div>

<script src="https://kit.fontawesome.com/0496ae07d8.js" crossorigin="anonymous"></script>
</body>

</html>