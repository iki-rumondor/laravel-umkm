@extends('frontend.layouts.master', ['title' => 'Detail Product'])
@section('content')
    <section class="detail-product container mb-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-img">
                        <img
                            src="{{asset('data/product/'.$data->image)}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted">{{$data->name}}</h4>
                        <hr>
                        @if ($data->diskon > 0)
                            <h6><span class="price-diskon text-danger">Rp {{number_format($data->price, 0, ',', '.')}} </span> / <span class="text-muted"> {{$data->diskon}}%</span></h6>
                        @endif
                        @php
                            $price = $data->price - ($data->price * $data->diskon / 100)
                        @endphp
                        <h5 class="text-success fw-bold">Rp.{{number_format($price, 0, ',', '.')}}</h5>
                        <div class="content">
                           {!! $data->description !!}
                        </div>
                        <a href="/" class="btn btn-primary">Kembali</a>
                        <a href="https://wa.me/{{ $data->phone }}?text=Saya%20tertarik%20dengan%20produk%20{{ $data->name }}" class="btn btn-success">
                            <i class="fab fa-whatsapp"></i> Pesan Via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
