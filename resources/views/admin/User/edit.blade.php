@extends('adminlte::page')

@section('title_prefix', 'Izmjena korisnika - ')

@section('content_header')
    <h1>Izmjena korisnika - {{$user->name}}</h1>
@stop

@section('content')
    <form action="{{route('user-update', $user)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="user_name" class="form-label">Ime</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite ime korisnika..." value="{{$user->name}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Email</label>
            <input type="text" class="form-control" id="name" name="email" placeholder="Unesite email korisnika..." value="{{$user->email}}">

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Points</label>
            <input type="text" class="form-control" id="price" name="points" placeholder="Unesite poene..." value="{{$user->points}}">
        </div>

        <x-adminlte-input-file name="photo" label="Fotografija" placeholder="Otpremite fotografiju..."
                               disable-feedback/>

        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Sačuvaj</button>
        </div>
    </form>
@stop
