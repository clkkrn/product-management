@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Alt Ürün Düzenle</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/edit-product/'.$res->id) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Alt Ürün Kodu</label>
                                        <input class="form-control py-4" name="code" value="{{$res->product_code}}" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Alt Ürün İsim</label>
                                        <input class="form-control py-4" name="name" type="text" value="{{$res->name}}" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Kategori</label>
                                        <input class="form-control py-4" name="category" value="{{$res->category}}" type="text" placeholder="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Stok</label>
                                        <input class="form-control py-4" name="stock" value="{{$res->stock}}" type="text" placeholder="" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Alış Fiyatı (Birim Başına)</label>
                                        <input class="form-control py-4" name="unit_price" value="{{$res->unit_price}}" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Satış Fiyatı (Birim Başına)</label>
                                        <input class="form-control py-4" name="sale_price" value="{{$res->sales_unit_price}}" type="text" placeholder="" />
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
