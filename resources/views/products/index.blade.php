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
                        Productos:
                        @can('products.create')
                            <a href="{{ route('products.create') }}"
                               class="btn btn-sm btn-primary pull-right">
                                Crear
                            </a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="display" id="productsTable">
                            <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <label>
                                            @can('products.show')
                                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-default">Ver</a>
                                            @endcan
                                            @can('products.edit')
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-default">Editar</a>
                                            @endcan
                                            @can('products.destroy')
                                                <a href="{{ route('products.destroy', $product) }}" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();">Eliminar</a>

                                                <form id="destroy-form" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
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
     {{-- <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/dataTables.jqueryui.js') }}"></script> --}}
     {{-- <script type="text/javascript" src="{{ asset('DataTables/1.10.16/js/dataTables.bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript">
      $(document).ready( function () {
        $('#productsTable').dataTable({
            "columnDefs": [
                { "orderable": false, "targets": [2] }
            ],
            "language": {
                "url": "{{ asset('DataTables/1.10.16/Spanish.lang') }}"
            }
        });
        } );
    </script>
    {{-- <script type="text/javascript">$('#usersTable').DataTable();</script> --}}
@endsection
