@extends('adminlte::page')

@section('title_prefix', 'Novi obrok - ')

@section('content_header')
    <h1>Novi obrok</h1>
@stop

@section('content')
    <form action="{{route('product-store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naziv Proizvoda</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka...">
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="details"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Cijena</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Unesite cijenu...">
        </div>
        <div class="mb-3">
            <label for="points" class="form-label">Poeni</label>
            <input type="text" class="form-control" id="price" name="points" placeholder="Unesite cijenu...">
        </div>
        <x-adminlte-input-file name="photo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        <div class="mb-3">
            <label for="dietary_restrictions" class="form-label">Sponzor</label>
            <input type="text" class="form-control" id="dietary_restrictions" name="sponsor_id"
                   placeholder="">
        </div>
        <div class="mb-3">
            <label for="dietary_restrictions" class="form-label">Popust</label>
            <input type="text" class="form-control" id="dietary_restrictions" name="discount"
                   placeholder="-20, -30, ">
        </div>
        <div class="mb-3">
            <label for="dietary_restrictions" class="form-label">Kategorija</label>
            <input type="text" class="form-control" id="dietary_restrictions" name="category_id"
                   placeholder="Posno, slatko, sadrzi gluten, vegan...">
        </div>

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Kreiraj</button>
        </div>
    </form>
@stop
