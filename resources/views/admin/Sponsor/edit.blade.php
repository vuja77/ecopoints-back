@extends('adminlte::page')

@section('title_prefix', 'Izmjena obroka - ')

@section('content_header')
    <h1>Izmjena obroka - {{$sponsor->name}}</h1>
@stop

@section('content')
    <form action="{{route('sponsor-update', $sponsor)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="sponsor_name" class="form-label">Naziv Sponzora</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka..." value="{{$sponsor->name}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea class="form-control" id="description" name="description">{{$sponsor->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">lokacija</label>
            <input type="text" class="form-control" id="price" name="location" placeholder="Unesite cijenu..." value="{{$sponsor->location}}">
        </div>

        <x-adminlte-input-file name="photo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Sačuvaj</button>
        </div>
    </form>
@stop
