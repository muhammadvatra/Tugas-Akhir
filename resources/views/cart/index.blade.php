<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Keranjang Belanja</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(session('cart'))
                    <!-- Jika data sesi 'cart' ada -->
                    @foreach(session('cart') as $id => $details)
                        <!-- Loop melalui setiap item di keranjang -->
                        <tr>
                            <td>
                                <!-- Tampilkan gambar produk dan nama -->
                                <img src="{{ Storage::url($details['image']) }}" width="100" height="100" class="img-responsive"/>
                                {{ $details['name'] }}
                            </td>
                            <td>
                                <!-- Tampilkan harga produk -->
                                Rp{{ number_format($details['price'], 2) }}
                            </td>
                            <td>
                                <!-- Form untuk memperbarui kuantitas -->
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" max="10">
                                    <button type="submit" class="btn btn-info btn-sm">Perbarui</button>
                                </form>
                            </td>
                            <td>
                                <!-- Form untuk menghapus item dari keranjang -->
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- Jika keranjang kosong -->
                    <tr>
                        <td colspan="4" class="text-center">Keranjang Anda kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <a href="{{ url('') }}" class="btn btn-primary">Lanjutkan Belanja</a>
    </div>
    <div class="container mt-5">
        <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
    </div>
    
    <!-- bootstrap js dan popper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
