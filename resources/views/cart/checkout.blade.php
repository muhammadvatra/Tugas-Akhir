<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Checkout</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Ringkasan Pesanan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $details)
                <tr>
                    <td>
                        <img src="{{ Storage::url($details['image']) }}" width="50" height="50" class="img-responsive" alt="{{ $details['name'] }}">
                        {{ $details['name'] }}
                    </td>
                    <td>Rp{{ number_format($details['price'], 0, ',', '.') }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <form action="{{ route('process-checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </form>
            <a href="{{ route('cart.index') }}" class="btn btn-secondary">Kembali ke Keranjang</a>
        </div>
    </div>
    <!-- bootstrap js and popper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
