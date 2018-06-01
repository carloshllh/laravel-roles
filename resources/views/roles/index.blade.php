@extends('layouts.template')

@section('estilos')
    <link href="{{ asset('DataTables/1.10.16/css/jquery.dataTables.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Roles
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="display" id="rolesTable">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                {{-- <th width="10px"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>

                                <td>
                                    <label>
                                    @can('roles.show')
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                    @can('roles.edit')
                                     <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-default">Editar</a>
                                    @endcan
                                    @can('roles.destroy')
                                            <a href="{{ route('roles.destroy', $role) }}" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Eliminar</a>

                                            <form id="destroy-form" action="{{ route('roles.destroy', $role) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                    @endcan

                                    </label>
                                </td>
                                {{-- <td>
                                    @can('roles.destroy')
                                        {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-default">
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td> --}}


                                {{-- @can('roles.show')
                                <td width="10px">
                                    <a href="{{ route('roles.show', $role->id) }}" 
                                    class="btn btn-sm btn-default">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('roles.edit')
                                <td width="10px">
                                    <a href="{{ route('roles.edit', $role->id) }}" 
                                    class="btn btn-sm btn-default">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('roles.destroy')
                                <td width="10px"> --}}
                                    {{-- {!! Form::open(['route' => ['roles.destroy', $role->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!} --}}
                                {{-- </td>
                                @endcan --}}

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $roles->render() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#rolesTable').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": [2] }
                ]
            });
        } );
    </script>
    {{-- <script type="text/javascript">$('#usersTable').DataTable();</script> --}}
@endsection