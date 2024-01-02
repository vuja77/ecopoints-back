@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesResponsive', true)

@section('title_prefix', 'Obrok - ')

@section('content')

    <x-adminlte-modal id="deleteModal-{{$product->id}}" title="Brisanje obroka"  theme="danger"
                      icon="fas fa-trash" v-centered static-backdrop scrollable>
        <form action="{{route('product-destroy', $product->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div>Da li ste sigurni da želite da obrišete obrok?</div>

            <div class="d-flex justify-content-between">
                <button class="btn btn-danger mr-auto" type="submit">
                    <div class="fa fa-trash"></div>
                    <span>Da</span>
                </button>

                <x-adminlte-button type="button" theme="secondary" label="Ne" data-dismiss="modal"/>
            </div>

            <x-slot name="footerSlot"></x-slot>
        </form>
    </x-adminlte-modal>

    <div class="d-flex pt-3">
        <a href="{{route('product-edit', $product)}}">
            <button type="button" class="btn btn-primary">
                <div class="fa fa-edit"></div>
                <span>Izmjeni obrok</span>
            </button>
        </a>
        <x-adminlte-button label="Obriši obrok" data-toggle="modal" data-target="#deleteModal" class="bg-danger"/>
    </div>



    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card mb-4 shadow">
                <div class="position-relative">
                    <img src="{{asset($product->image_url)}}" class="card-img-top rounded-top" alt="Food Image">
                    <div class="overlay"></div>
                    <h5 class="font-weight-bold px-3 pt-3">{{$product->name}}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">Description:</h6>
                        <p class="card-text">{{$product->details}}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">Price:</h6>
                        <p class="card-text">{{$product->price}}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">Points:</h6>
                        <p class="card-text">{{$product->points}}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">Sponsor</h6>
                        <p class="card-text">{{$product->sponsor_id}}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">category</h6>
                        <p class="card-text">{{$product->category_id}}</p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-2 font-weight-bold">discount</h6>
                        <p class="card-text">{{$product->discount}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
