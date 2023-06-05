<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Métodos De Pago - Alumnos Registrados PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>
    <h1>MÉTODOS DE PAGO</h1>
<body>
    
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pagó</th>
                <th>Fecha de Pago</th>
                <th>Numero de Referencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($metodohasalumnos as $metodohasalumno)
                <tr>
                    <td class="text-center">{{ $metodohasalumno->alumno_id }}</td>
                    <td class="text-center">{{ $metodohasalumno->pago }}</td>
                    <td class="text-center">{{ $metodohasalumno->fecha_pago }}</td>
                    <td class="text-center">{{ $metodohasalumno->numero_referencia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>