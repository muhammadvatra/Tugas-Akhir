<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Utama</title>
</head>
<body>
    <!--NAVBAR BOOTSTRAP -->
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ponsel</a></li>
                            <li><a class="dropdown-item" href="#">Laptop</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Lainnya</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Cari">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
                <a href="{{ url('profile') }}">
                    <button type="submit" class="btn btn-primary ms-3">Profil</button>
                </a>
                <a href="{{ route('cart.index') }}">
                    <button type="submit" class="btn btn-primary ms-3">Lihat Keranjang</button>
                </a>
                <a href="{{ url('login') }}">
                    <button type="submit" class="btn btn-primary ms-3">Keluar</button>
                </a>
            </div>
        </div>
    </nav>

    <!-- Container ini memuat daftar semua produk di database -->
    <div class="container mt-5">
        <h2>Semua Produk</h2>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="max-width: 200px; height: 30%;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <h6>Rp{{ number_format($product->price, 2) }}</h6>
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="quantity{{ $product->id }}" class="form-label">Kuantitas:</label>
                                    <select class="form-select" id="quantity{{ $product->id }}" name="quantity">
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary mt-3">Tambah ke Keranjang</button>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success mt-3">Lihat Detail</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- bootstrap js dan popper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
