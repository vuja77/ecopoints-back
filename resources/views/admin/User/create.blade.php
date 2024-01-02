@extends('adminlte::page')

@section('title_prefix', 'Novi Korisnik - ')

@section('content_header')
    <h1>Novi Korisnik</h1>
@stop

@section('content')
    <form action="{{route('user-store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Ime</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite ime korisnika...">
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Email</label>
            <input type="text" class="form-control" id="name" name="email" placeholder="Unesite email korisnika...">

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Points</label>
            <input type="text" class="form-control" id="price" name="points" placeholder="Unesite kolicinu poena...">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Password</label>
            <input type="text" class="form-control" id="price" name="password" placeholder="Unesite password..">
        </div>
        <x-adminlte-input-file name="logo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Kreiraj</button>
        </div>
    </form>
@stop
