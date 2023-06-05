<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <th>Telefono</th>
            <th>Telefono Local</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th>Nivel de Estudio</th>
            <th>Fecha de Nacimiento</th>
            <th>Comunidad</th>
            <th>Patrocinador</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>   
                <td>{{ $alumno->nombres }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->cedula }}</td> 
                <td>{{ $alumno->telefono }}</td>                 
                <td>{{ $alumno->telefono_local }}</td>
                <td>{{ $alumno->direccion }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->nivel_de_estudio }}</td>
                <td>{{ $alumno->fecha_nac }}</td>
                <td>{{ $alumno->comunidad }}</td>
                <td>{{ $alumno->patrocinador }}</td>
                <td>{{ $alumno->fecha_registro }}</td>                                 
            </tr>
        @endforeach
    </tbody>
</table>
