<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Detail Pesanan</title>
</head>
<body>
<div class="container mt-5">
    <h2>Detail Pesanan untuk Pesanan #{{ $order->order_id }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Kuantitas</th>
                <th>Harga per Item</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product ? $detail->product->name : 'Produk Dihapus' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price, 2) }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                </tr>
            @empty
                <tr><td colspan="4">Tidak ada detail ditemukan untuk pesanan ini.</td></tr>
            @endforelse
            <tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td>{{ number_format($order->total, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('orders.indexAll') }}" class="btn btn-primary mt-3">Kembali ke Manage Order</a>
</div>

    <!-- Bootstrap JS dan Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>
