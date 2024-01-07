@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        {{$item->name}} İçindeki Alt Ürünler
        <a href="{{url('add-subproduct/'.$item->id)}}" class="btn btn-sm btn-primary">Alt Ürün Ekle</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Miktar</th>
                        <th>Stok</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($item->subproducts as $index => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $subProducts[$index]->value }}</td>
                        @if($value->stock > '0')
                            <td>{{ $value->stock }}</td>
                        @else
                            <td>Stokta Yok</td>
                        @endif
                        <td>
                            <a href="{{url('delete-subproduct/'.$item->id.'/'.$value->id)}}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

<script>



   $('#dataTable').DataTable({
    columnDefs: [
    {bSortable: false, targets: [6]}
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'copyHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, ':visible' ]

                   }
               },
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, ':visible' ]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, 1, 2, 5 ]
                   }
               },
               'colvis'
           ]
           });
       </script>
@endsection
