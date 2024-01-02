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
        <a href="{{route('PurchasedProduct-create')}}">
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
            <th>Korisnik</th>
            <th>Proizvod</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($PurchasedProducts as $PurchasedProduct)
            <tr>
                <td>{{$PurchasedProduct->id}}</td>
                <td>{{$PurchasedProduct->product_id}}</td>
                <td>{{$PurchasedProduct->user_id}}</td>
                <td>
                    <div class="d-flex justify-content-center">

                        <a href="{{route('PurchasedProduct-show', $PurchasedProduct)}}"
                           class="btn btn-outline-primary ml-2 mr-2"><i class="fas fa-eye"></i></a>
                        <a href="{{route('PurchasedProduct-edit', $PurchasedProduct)}}"
                           class="btn btn-outline-success ml-2 mr-2"><i class="fas fa-edit"></i></a>

                        <x-adminlte-modal id="deleteModal-{{$PurchasedProduct->id}}" title="Brisanje obroka"  theme="danger"
                                          icon="fas fa-trash" v-centered static-backdrop scrollable>
                            <form action="{{route('PurchasedProduct-destroy', $PurchasedProduct->id)}}" method="post">
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

                        <button class="btn btn-outline-danger ml-2 mr-2" data-toggle="modal" data-target="#deleteModal-{{$PurchasedProduct->id}}"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Korisnik</th>
            <th>Proizvod</th>
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


