<h3 class="fw-bold">Agregar Estudiante</h3>
<h5 class="text-muted">Rellene el formulario con los datos de estudiante</h5>

<form action="/store.php" method="post" enctype="multipart/form-data">
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

    <label for="course">Curso</label>
    <div class="input-group">
        <span class="input-group-text">
            <i class="fw-bold fas fa-graduation-cap" aria-hidden="true"></i>
        </span>

        <input class="form-control" type="number" name="course" min="1" max="5" placeholder="Curso"
               required>
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