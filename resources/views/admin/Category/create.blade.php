@extends('adminlte::page')

@section('title_prefix', 'Nova Kategorija - ')

@section('content_header')
    <h1>Novi obrok</h1>
@stop

@section('content')
    <form action="{{route('category-store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naziv Kategorije</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv kategorije...">
        </div>

        

        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Kreiraj</button>
        </div>
    </form>
@stop
