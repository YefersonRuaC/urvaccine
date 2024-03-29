<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Urvaccine</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container overflow-hidden mb-5">
        <div class="">
            <img src="{{ public_path('images/logopdf.png') }}" alt="Logo urvaccine" class="img-fluid border 
            border-secondary rounded-lg" style="height: 4rem; width: auto;">
        </div>
        <h2 class="text-center mb-4 font-weight text-uppercase" style="margin-top: 1.5rem; color: #0a0186">
            Certificado de vacunacion
        </h2>

        <div class="row justify-content-between border border-dark rounded">
            <div class="col-md-4 font-weight-bold border-end border-dark">
                <p style="font-weight: 700;">Nombre completo: 
                    <span style="font-weight: normal;">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</span>
                </p>
            </div>
            <div class="col-md-4 text-uppercase border-end border-dark">
                <p style="font-weight: 700;">{{ auth()->user()->tipo_doc }}: 
                    <span style="font-weight: normal;">{{ auth()->user()->documento }}</span>
                </p>
            </div>
            <div class="col-md-4">
                <p style="font-weight: 700;">Fecha nacimiento: 
                    <span style="font-weight: normal;">{{ auth()->user()->nacimiento->toFormattedDateString() }}</span>
                </p>
            </div>
        </div>        
    
        <div class="mt-1 rounded border border-dark">
            <table>
                <thead>
                    <tr>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Fecha de aplicacion
                        </th>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Vacuna
                        </th>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Edad de aplicacion
                        </th>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Empresa vacunadora
                        </th>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Lugar de aplicacion
                        </th>
                        <th scope="col" style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            Enfermedad que previene
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($historiales as $historial)
                    <tr class="border-top border-dark">
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->campana->fecha->toFormattedDateString() }}
                        </td>
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->campana->vacuna->nombre }}
                        </td>
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->edad }}
                        </td>
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->campana->empresa }}
                        </td>
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->campana->municipio }}, {{ $historial->campana->departamento }}
                        </td>
                        <td style="border: 1px solid #bdbdbd; padding: 8px; text-align: center;">
                            {{ $historial->campana->vacuna->enfermedad }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-4" style="color: #686868; text-transform: uppercase;">
                            No se encontraron registros de vacunación aún
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        

        <p class="text-center text-muted mt-5 mb-0">
            Certificamos que el paciente 
            <span class="font-weight-bold" style="font-weight: bold; text-transform: uppercase; color: #0300a7">
                {{ auth()->user()->name }} {{ auth()->user()->apellido }}
            </span> 
            consta con certificado físico y en línea de las vacunas aquí mostradas.
        </p>
        <p class="text-center text-muted mt-5" style="bottom: 0; text-align: center; color: #8f8f8f; background-color: #eeeeee9a; padding: 10px; border-radius: 0.5rem;">
            Visitanos en 
            <span style="text-decoration: underline;">www.urvaccine.com.co</span> 
            para mas informacion.
        </p>
    </div>
</body>
</html>