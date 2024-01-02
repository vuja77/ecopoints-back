@extends('adminlte::page')

@section('title_prefix', 'Dashboard - ')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="">
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
         <div class="card-header">Regostrovani korisnici</div>
             <div class="card-body">
                <h5 class="card-title">30</h5>
        </div>
    </div>
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
         <div class="card-header">Regostrovani korisnici</div>
             <div class="card-body">
                <h5 class="card-title">30</h5>
        </div>
    </div>
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
         <div class="card-header">Regostrovani korisnici</div>
             <div class="card-body">
                <h5 class="card-title">30</h5>
        </div>
    </div>
    </div>
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
