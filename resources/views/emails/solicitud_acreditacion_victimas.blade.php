@component('mail::message')

 

#Solicitud de acreditación como víctima del caso 01 con el radicado: {{$datos['codigo']}}

#Solicitante :{{$datos['nombre']}}
#Cédula:{{$datos['cedula']}}
#Email:{{$datos['email']}}
#Dirección:{{$datos['direccion']}}
#Teléfono Fijo:{{$datos['telf_fijo']}}
#Celular:{{$datos['celular']}}

Se remite solicitud de acreditación como víctima en el marco del Caso No. 01 de la Sala de Reconocimiento de la JEP, el cual fue se diligenciado desde el formulario web dispuesto por la entidad.


@endcomponent
