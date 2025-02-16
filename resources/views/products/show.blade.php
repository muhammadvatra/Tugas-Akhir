<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{ $product->name }}</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detail Produk
            </div>
            <div class="card-body">
                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="max-width: 300px; height: auto;">
                </div>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h6>Rp{{ number_format($product->price, 0, ',', '.') }}</h6>
                <form action="{{ route('cart.add', $product) }}" method="POST" onsubmit="return addToCart()">
                    @csrf
                    <label for="quantity" class="form-label">Jumlah:</label>
                    <select class="form-select" id="quantity" name="quantity">
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary mt-3">Tambah ke Keranjang</button>
                </form>
                <a href="{{ url('') }}" class="btn btn-success mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script>
        function addToCart() {
            alert('Berhasil Ditambahkan ke Keranjang');
            return true; // Lanjutkan dengan pengiriman form
        }
    </script>
    <!-- bootstrap js and popper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
