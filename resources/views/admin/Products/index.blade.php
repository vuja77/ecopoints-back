@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesResponsive', true)

@section('title_prefix', 'Obroci - ')

@section('content_header')
    <h1>Obroci</h1>
@stop


@section('content')
{{--delete modal--}}


    <div class="my-3">
        <a href="{{route('product-create')}}">
            <button type="button" class="btn btn-primary">
                <span class="fa fa-plus"></span>
                <span>Novi obrok</span>
            </button>
        </a>
    </div>

    <table id="datatable" class="table table-striped table-bordered"
           style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Opis</th>
            <th>Cijena</th>
            <th>Points</th>
            <th>popust</th>
            <th>kategorija</th>
            <th>Sponsor</th>
            <th>Slika</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->details}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->points}}</td>
                <td>{{$product->discount}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->sponsor_id}}</td>
                <td>{{$product->photo}}</td>
                <td>
                    <div class="d-flex justify-content-center">

                        <a href="{{route('product-show', $product)}}"
                           class="btn btn-outline-primary ml-2 mr-2"><i class="fas fa-eye"></i></a>
                        <a href="{{route('product-edit', $product)}}"
                           class="btn btn-outline-success ml-2 mr-2"><i class="fas fa-edit"></i></a>

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

                        <button class="btn btn-outline-danger ml-2 mr-2" data-toggle="modal" data-target="#deleteModal-{{$product->id}}"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Opis</th>
            <th>Cijena</th>
            <th>Karakteristike</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
@stop

@section('js')
    <script>
        var table = $('#datatable').DataTable({
            responsive: true,
            autoWidth: true,
            columnDefs: [
                {targets: "_all", className: "text-center"},
                {targets: -1, searchable: false, orderable: false}
            ]
        });
    </script>
@stop


