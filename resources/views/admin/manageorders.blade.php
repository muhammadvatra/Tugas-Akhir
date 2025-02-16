<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Kelola Pesanan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Kelola Pesanan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                    <th>Perbarui Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>Rp{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('orders.showDetails', $order->order_id) }}" class="btn btn-info">Lihat Detail</a>
                    </td>
                    <td>
                        <form action="{{ route('orders.updateStatus', $order->order_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Tandai Selesai</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger mt-3">Batal</a>
    </div>

    <!-- bootstrap js and popper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
