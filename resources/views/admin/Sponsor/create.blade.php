@extends('adminlte::page')

@section('title_prefix', 'Novi obrok - ')

@section('content_header')
    <h1>Novi obrok</h1>
@stop

@section('content')
    <form action="{{route('sponsor-store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naziv Sponzora</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka...">
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Lokacija</label>
            <input type="text" class="form-control" id="price" name="location" placeholder="Unesite cijenu...">
        </div>
       
        <x-adminlte-input-file name="logo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Kreiraj</button>
        </div>
    </form>
@stop
