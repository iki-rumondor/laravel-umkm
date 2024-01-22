@extends('frontend.layouts.master', ['title' => 'Kategori'])
@section('content')
    <section class="product container" style="margin-top: 130px;">
        <h4>Semua Kategori</h4>
        <hr>
        <div class="row">
            @forelse ($data as $item)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-img img-fluid">
                            <img src="{{ asset('data/category/' . $item->image) }}">
                        </div>
                        <div class="card-body">
                            <a class="fw-bold text-dark fs-3" href="{{Route('category',$item->slug)}}">{{$item->name}}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-6" style="margin-bottom:170px;">
                    <div class="bg-danger p-4 rounded-4 text-light">
                        Maaf Data Kategori Belum Tersedia 😇
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
