@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Product</div>

                <div class="card-body">
                    <p><strong>ID: </strong>     {{ $product->id }}</p>
                    <p><strong>Name: </strong>       {{ $product->name }}</p>
                    <p><strong>Descripción: </strong>  {{ $product->description }}</p>
                    <p>
                      <a class="btn btn-sm btn-secondary" href="{{ route('products.index') }}">Regresar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
