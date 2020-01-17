<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=yes">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid" style="margin-top: 70px; margin-bottom: 70px">
    <?php
    if (Auth::user() != null) {
        $error = "";
            $assigment = Auth::user()->adviser()->first()->actual_assigment()->first();
        if ($assigment == null) {
            $error = "Lo sentimos, actualmente su usuario no a sido asignado a ninguna estación.";
        } else {
            $station = $assigment->station()->first();
        }
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$error}}</h1>
            <div class="row" style="display: flex; justify-content: space-between;">
                <div style="display: flex">
                    <a href="{{ route('client.index') }}" class="btn btn-info" >Cliente</a>
                    <a href="{{ route('purchase.index') }}" class="btn btn-info" >Ventas</a>
                </div>
                <div>
                    <a href="{{ route('logout') }}" class="btn btn-info" >Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    @yield('content')
</div>
<style type="text/css">
    .table {
        border-top: 2px solid #ccc;

    }
</style>
</body>
</html>