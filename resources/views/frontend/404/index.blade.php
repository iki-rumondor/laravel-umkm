@extends('frontend.layouts.master', ['title' => 'Not Found'])
@section('content')
    <style>
        body{
            background-color: white;
        }
    </style>
    <section class="product container" style="margin-top: 150px;">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-6 col-12">
            <div class="card bg-transparent">
                <div class="card-img img-fluid">
                    <img class="text-center" src="{{asset('theme/img/404.png')}}" width="500" alt="" srcset="">
                </div>
            </div>
            <div class="bg-danger p-4 rounded-4 text-light mb-4 text-center">
                <h5>Maaf Product Tidak Di Temukan 😓</h5>
            </div>
          </div>
        </div>
    </section>
@endsection
