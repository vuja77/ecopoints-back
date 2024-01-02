@extends('adminlte::page')

@section('title_prefix', 'Izmjena obroka - ')

@section('content_header')
    <h1>Izmjena obroka - {{$PurchasedProduct->name}}</h1>
@stop

@section('content')
    <form action="{{route('PurchasedProduct-update', $PurchasedProduct)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naziv Sponzora</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka..." value="{{$PurchasedProduct->user_id}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Naziv Sponzora</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Unesite naziv obroka..." value="{{$PurchasedProduct->product_id}}">
        </div>

        
        

        <div class="d-flex w-100 justify-content-end">
            <button type="submit" class="btn btn-success" style="width: 100px">Sačuvaj</button>
        </div>
    </form>
@stop
