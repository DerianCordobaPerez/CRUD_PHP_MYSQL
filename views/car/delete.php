<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/redirect.php';
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
    <link rel="stylesheet" href="../../public/css/index.css">
    <title>Eliminar</title>
</head>

<body>
<form action="/destroy.php" method="post">
    <input type="hidden" name="find" value="<?php echo $car->license; ?>">
    <input type="hidden" name="module" value="Car">

    <div class="container bg-light my-4 p-4">
        <div class="alert alert-warning" role="alert">
            <h3 class="text-center">
                <span class="fw-bold">Estas seguro que desea eliminar al auto con placa de <?php echo $car->license; ?></span>
            </h3>
        </div>

        <div class="row my-4">
            <div class="col-md-2"></div>

            <div class="col-md-4">
                <h3>
                    Informacion
                </h3>

                <p class="text">
                    <span class="fw-bold">Modelo: </span>
                    <?php echo $car->model ?>
                </p>

                <p class="text">
                    <span class="fw-bold">Placa: </span>
                    <?php echo $car->license ?>
                </p>
            </div>

            <div class="col-md-4">
                <img src="/pictures/<?php echo $car->photo ?>" class="image-shadow image mx-auto d-block" alt="Imagen de perfil">
            </div>
        </div>

        <div class="row my-4">
            <div class="col"></div>
            <div class="col-md-6">
                <input class="btn btn-danger button-width" type="submit" name="delete" value="Si">
            </div>

            <div class="col"></div>
        </div>
        <a class="text-center nav-link" href="/index.php">No, volver al inicio</a>
    </div>
</form>
</body>

</html>