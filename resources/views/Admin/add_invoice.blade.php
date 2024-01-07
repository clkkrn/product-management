@extends('layouts.admin_master')

@section('content')

<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4"><b>Yeni Fatura Oluştur</b></h3></div>
    <div class="card-body">
        <form method="POST" action="{{url('/insert-invoice') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Müşteri İsmi</label>
                        <input class="form-control py-4" name="customer" type="text" value="{{ $customer->name }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Müşteri Email</label>
                        <input class="form-control py-4" name="email" type="text" value="{{ $customer->email }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Şirket</label>
                        <input class="form-control py-4" name="company" type="text" value="{{ $customer->company }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Adres</label>
                        <input class="form-control py-4" name="address" type="text" value="{{ $customer->address }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputState">Telefon Numarası</label>
                        <input class="form-control py-4" name="phone" type="text" value="{{ $customer->phone }}" />
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Ürün Kategorisi</label>
                        <input class="form-control py-4" name="item" type="text" value="{{ $product->category }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Ürün İsmi</label>
                        <input class="form-control py-4" name="name" type="text" value="{{ $product->name }}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Fiyat (perUnit)</label>
                        <input class="form-control py-4" name="unit_price" type="text" value="{{ $product->unit_price }}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Miktar</label>
                        <input class="form-control py-4" name="quantity" type="text" value="{{ $order->quantity }}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Toplam Fiyat</label>
                        <input class="form-control py-4" name="total" type="text" value="{{ $product->unit_price * $order->quantity }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Ödeme</label>
                        <input class="form-control py-4" name="payment" type="text" placeholder="" />
                    </div>
                </div>

                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Gallery</label>
                        <input name="photo" type="file" />
                    </div>
                </div> -->
            </div>

            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Kaydet</button></div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</main>

@endsection
