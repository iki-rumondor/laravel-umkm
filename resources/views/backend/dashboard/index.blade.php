@extends('backend.layouts.master',['title' => 'Dashboard'])
@section('content')
<section class="product-list">
    <div class="container">
        <div class="alert alert-info border-0 text-start">
            Selamat Datang, <strong class="fw-bold">{{Auth::user()->name}}</strong>
        </div>       
        <div class="row">
            <div class="col-lg-3 col-6 mb-3">
                <div class="card text-light border-0 shadow bg-orange">
                    <div class="card-body">
                        <h3>Total Product</h3>
                        <h3  class="fw-bold"> <i class="fa fa-store fa-1x"> </i>
                            {{$countProduct}}+</h3>
                       
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="col-lg-3 col-6 mb-3">
                    <div class="card text-light border-0 shadow bg-primary">
                        <div class="card-body">
                            <h3>Kategori</h3>
                            <h3  class="fw-bold"> <i class="fa fa-cube fa-1x"> </i>
                                {{$countCategory}}+</h3>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-3">
                    <div class="card text-light border-0 shadow bg-success">
                        <div class="card-body">
                            <h3>Slider</h3>
                            <h3  class="fw-bold"> <i class="fa fa-image fa-1x"> </i>
                                {{$countSlider}}+</h3>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mb-3">
                    <div class="card text-light border-0 shadow bg-warning">
                        <div class="card-body">
                            <h3>Admin</h3>
                            <h3  class="fw-bold"> <i class="fa fa-user fa-1x"> </i>
                                {{$adminCount}}+</h3>
                        
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection