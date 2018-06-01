{{-- @extends('layouts.app') --}}
@extends('layouts.template')

{{-- @section('styles') --}}
@section('estilos')
    <link href="{{ asset('DataTables/1.10.16/css/jquery.dataTables.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">
                        Usuarios
                        @can('roles.create')
                            <a href="{{ route('users.create') }}"
                               class="btn btn-sm btn-primary pull-right">
                                Crear
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="display" id="usersTable">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->roles->isEmpty())
                                            no asignado
                                        @else
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <label>
                                            @can('users.show')
                                                <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-default">Ver</a>
                                            @endcan
                                            @can('users.edit')
                                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-default">Editar</a>
                                            @endcan
                                            @can('users.destroy')
                                                <a href="{{ route('users.destroy', $user) }}" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Eliminar</a>

                                                <form id="destroy-form" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            @endcan

                                        </label>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- $users->render() --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
     <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/jquery.dataTables.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/Buttons-1.5.1/js/buttons.flash.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/pdfmake-0.1.32/pdfmake.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/pdfmake-0.1.32/vfs_fonts.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/Buttons-1.5.1/js/buttons.html5.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('DataTables/Buttons-1.5.1/js/buttons.print.min.js') }}"></script>
     {{-- <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/dataTables.jqueryui.js') }}"></script> --}}
     {{-- <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/dataTables.bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript">
      $(document).ready( function () {
        $('#usersTable').DataTable({
            columnDefs: [
                { 'orderable': false, 'targets': [3,4] }
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]   
        });
        } );
    </script>
    {{-- <script type="text/javascript">$('#usersTable').DataTable();</script> --}}
@endsection
