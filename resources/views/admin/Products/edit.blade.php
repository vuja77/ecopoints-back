@extends('adminlte::page')

@section('title_prefix', 'Izmjena obroka - ')

@section('content_header')
    <h1>Izmjena Proizvoda - {{$product->name}}</h1>
@stop

@section('content')
    <form action="{{route('product-update', $product)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="product_name" class="form-label">Naziv Proizvoda</label>
            <input type="text" class="form-control" id="product_name" name="name" placeholder="Unesite naziv obroka..." value="{{$product->name}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="details">{{$product->details}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Cijena</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Unesite cijenu..." value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Poeni</label>
            <input type="number" class="form-control" id="price" name="points" placeholder="Unesite cijenu..." value="{{$product->points}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Sponzor</label>
            <input type="number" class="form-control" id="price" name="sponsor_id" placeholder="Unesite cijenu..." value="{{$product->sponsor_id}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Kategorija</label>
            <input type="number" class="form-control" id="price" name="category_id" placeholder="Unesite cijenu..." value="{{$product->category_id}}">
        </div>
        <x-adminlte-input-file name="photo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        <div class="mb-3">
            <label for="dietary_restrictions" class="form-label">Popust</label>
            <input type="text" class="form-control" id="dietary_restrictions" name="discount"
                   placeholder="Posno, slatko, sadrzi gluten, vegan..." value="{{$product->discount}}">
        </div>

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Sačuvaj</button>
        </div>
    </form>
@stop
