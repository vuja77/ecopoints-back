@extends('adminlte::page')

@section('title_prefix', 'Novi  - ')

@section('content_header')
    <h1>Novi </h1>
@stop

@section('content')
    <form action="{{route('sponsor-store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Id korisnika</label>
            <input type="number" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka...">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Id proizvoda</label>
            <input type="number" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka...">
        </div>
        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Kreiraj</button>
        </div>
    </form>
@stop
