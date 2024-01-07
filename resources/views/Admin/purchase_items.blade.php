@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Stok Ekle</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/insert-purchase-items') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Alt Ürün Kodu</label>
                                        <input class="form-control py-4" name="code" type="text" value="{{ $items->item_code }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Ürün Adı</label>
                                        <input class="form-control py-4" name="name" type="text" value="{{ $items->name }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Kategori</label>
                                        <input class="form-control py-4" name="category" type="text" value="{{ $items->category }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Stoktaki Ürün Miktarı</label>
                                        <input class="form-control py-4" name="stock" type="text" value="{{ $items->stock }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Stok Yenile</label>
                                        <input class="form-control py-4" name="purchase" type="text" />
                                    </div>
                                </div>

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
