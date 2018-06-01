@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card ">
                    <div class="card-header">
                        <strong>Editar Producto: {{ $product->id }}</strong>
                    </div>
                    <div class="card-body">

                        {!! Form::model($product, ['route' => ['products.update', $product],
                        'method' => 'PUT']) !!}

                        @include('products.partials.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
