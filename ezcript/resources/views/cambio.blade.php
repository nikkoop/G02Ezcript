<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cambiar contraseña</title>
</head>

<body>
    <div class="cont-ext-cambio">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Cambiar contraseña</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="inputPasswordOld">Contraseña actual</label>
                        <input type="password" class="form-control" id="inputPasswordOld" required="">
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordNew">Contraseña nueva</label>
                        <input type="password" class="form-control" id="inputPasswordNew" required="">
                        <span class="form-text small text-muted">
                            La contraseña debe tener entre 8 y 20 caractéres y <em>no</em> contener espacios.
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordNewVerify">Verificar</label>
                        <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                        <span class="form-text small text-muted">
                            Para confirmar, escriba la contraseña denuevo.
                        </span>
                    </div>
                    <div class="form-group-boton">
                        <button type="submit" class="btn btn-success btn-lg float-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>