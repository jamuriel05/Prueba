@extends('layouts.app')

@section('css')

@endsection

@section('content')

    <!--Estilos del DataTable-->
    <style>
        table thead {
            background-color:#39A131 ;
            color: white;
        }
    </style>
    <!--Estilos del DataTable-->

    <!--Cuerpo de Pagina (Body)-->
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('users.create')}}" class="btn btn-success">Nuevo</a>
                </div>
                <hr>
                <table id="tabla" class="table table-striped" style="width:100%">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo de Documento</th>
                            <th>Documento</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users)<=0)
                            <tr>
                                <td colspan="8">Usuario no encontrado</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr align="center">
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->tipo_doc}}</td>
                                    <td>{{ $user->nro_documento}}</td>
                                    <td>{{ $user->email}}</td>

                                    @if($user->Estado == 'habilitado')
                                        <td bgcolor="#81F79F">{{ $user->Estado}}</td>
                                    @else
                                        <td bgcolor="#FA5858">{{ $user->Estado}}</td>
                                    @endif

                                    @if ($user->Estado == 'Deshabilitado')
                                        <td>
                                            <form action="{{ route('users.Deshabilitar', $user->id)}}" method="POST" class="formulario-cambiar">
                                                
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success mx-1"><i class="fas fa-check">Habilitar</i></button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            <form action="{{ route('users.Deshabilitar', $user->id)}}" method="POST" class="formulario-cambiar">
                                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}"><i class="fa fa-edit">Editar</i></a>
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger mx-1"><i class="fas fa-times-circle">Deshabilitar</i></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
<!--Cuerpo de Pagina (Body)-->

@endsection


<!--Archivos JS-->
@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable( {
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            } );
        } );
    </script>

    @if(session('cambiar') == 'true')
        <script>
            Swal.fire(
                'Exito!',
                'Estado Cambiado',
                'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-cambiar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: 'Está seguro?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dd3333',
                confirmButtonText: 'Sí, Hazlo!',
                cancelButtonText: 'cancelar!',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

@endsection
