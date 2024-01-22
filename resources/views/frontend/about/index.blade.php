@extends('frontend.layouts.master', ['title' => 'Tentang Kami'])
@section('content')
    <section class="detail-product container" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">{{$app->title}}</h3>
                        <hr>
                        {!! $app->tentang !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
