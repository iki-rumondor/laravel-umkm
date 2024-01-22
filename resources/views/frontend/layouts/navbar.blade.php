<div class="fixed-top">
    <nav class="navbar bg-orange position-static">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-lg-6">
                    <a href="/" class="navbar-brand text-light fw-bold"><i class="fa fa-store"></i> {{$app->title}}</a>
                </div>
                <div class="col-lg-6">
                    <!-- Formulir Pencarian -->
                    <form method="GET" action="{{route('search')}}" class="d-flex justify-content-center" >
                        <input name="q" class="form-control me-2" type="text" placeholder="Cari Product." aria-label="Search">
                        <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-list"></i> KATEGORI
                        </a>
                        <ul class="dropdown-menu w-75">
                            @foreach ($kategori as $kt)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ Route('category', $kt->slug) }}">{{ $kt->name }}</a>
                                </li>
                            @endforeach
                            <hr class="dropdown-divider">
                    </li>
                    <li><a class="btn btn-primary w-100" href="{{Route('category.all')}}">Semua <i class="fa fa-arrow-right"></i></a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{Route('product.all')}}"><i class="fa fa-cart-shopping"></i> SEMUA
                        PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('about')}}"><i class="fa fa-info-circle"></i> TENTANG</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{Route('login')}}"><i class="fa fa-sign-in"></i>
                            LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{Route('register')}}"><i class="fa fa-list"></i>
                            REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
