@extends('frontend.layouts.master', ['title' => 'Jenis Umkm'])
@section('content')
    <section class="product container" style="margin-top: 150px;">
        <div class="row">
            <h4>Semua Product Jenis <strong>{{$name}}</strong></h4>
            <hr>
            @forelse ($data as $x)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-img img-fluid">
                            <img src="{{ asset('data/product/' . $x->image) }}">
                        </div>
                        <div class="card-body bg-wraper">
                            <div class="text-center">
                                <a href="{{ Route('product', $x->slug) }}" class="fw-bold text-dark"
                                    style="text-decoration: none;"><strong>{{ $x->name }}</strong></a><br>
                                <a href="{{ Route('category', $x->category->slug) }}" class="text-muted"
                                    style="text-decoration: none;">{{ $x->category->name }}</a>
                                @if ($x->diskon > 0)
                                    <h6><span class="price-diskon text-danger">Rp
                                            {{ number_format($x->price, 0, ',', '.') }} </span> / <span class="text-muted">
                                            {{ $x->diskon }}%</span></h6>
                                @endif
                                @php
                                    $price = $x->price - ($x->price * $x->diskon) / 100;
                                @endphp
                                <h5 class="text-success fw-bold">Rp.{{ number_format($price, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p><i class="fa fa-cube"></i><strong class="ms-2">{{ $x->umkm->name }}</strong></p>
                            <hr>
                            <p><i class="fa fa-shop"></i><strong class="ms-2">{{ $x->user->name }}</strong></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-6" style="margin-bottom:270px;">
                    <div class="bg-danger p-4 rounded-4 text-light">
                        Maaf Product Untuk Jenis <strong>{{ $name }}</strong> Belum Di Upload 😇
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
