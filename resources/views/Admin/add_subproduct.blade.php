@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Alt Ürün Ekle</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('insert.subproduct') }}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="itemid" value="{{$item_id}}">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="small mb-1" for="inputFirstName">Alt Ürün İsmi</label>
                                    <select id="name" name="subproduct" class="form-control">
                                        <option selected>Seç...</option>
                                        @foreach($products as $item)
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Alt Ürün Değeri</label>
                                        <input class="form-control py-4" name="value" type="text" placeholder="Sayı" />
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
