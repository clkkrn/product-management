@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Stoktaki Ürünler
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kodu</th>
                        <th>İsmi</th>
                        <th>Kategori</th>
                        <!-- <th>Stok</th>
                        <th>Birim Fiyat</th>-->
                        <th>Satış Fiyatı</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($items as $row)
                    <tr>
                        <td>{{ $row->item_code }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category }}</td>

                        <!--@if($row->stock > '0')
                            <td>{{ $row->stock }}</td>
                        @else
                            <td>Stokta Yok</td>
                        @endif

                        <td>{{ $row->unit_price }}</td> -->
                        <td>{{ $row->sales_unit_price }}</td>
                        <td>
                        	<a href="{{url('add-subproduct/'.$row->id)}}" class="btn btn-sm btn-info">Alt Ürün Ekle</a>
                        	<a href="{{url('show-subproduct/'.$row->id)}}" class="btn btn-sm btn-info">Alt Ürünü Göster</a>
                            <a href="{{url('delete-item/'.$row->id )}}" class="btn btn-sm btn-danger">Sil</a>
                        	<!-- <a href="{{ 'purchase-items/'.$row->id }}" class="btn btn-sm btn-info">Stok Ekle</a> -->
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
