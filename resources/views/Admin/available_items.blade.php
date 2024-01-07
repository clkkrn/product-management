@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Mevcut Ürünler
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kodu</th>
                        <th>İsim</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Birim Fiyat</th>
                        <th>Birim Satış Fiyatı</th>
                        <th>İşlem</th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($items as $row)
                    <tr>
                        <td>{{ $row->item_code }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category }}</td>

                        @if($row->stock > '0')
                            <td>{{ $row->stock }}</td>
                        @else
                            <td>Mevcutta Yok</td>
                        @endif

                        <td>{{ $row->unit_price }}</td>
                        <td>{{ $row->sales_unit_price }}</td>
                        <td>
                        	<a href="{{ 'add-item-order/'.$row->id }}" class="btn btn-sm btn-info">Sipariş</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
