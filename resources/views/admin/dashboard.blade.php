<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard Admin</title>
</head>
<body>
    
     <h1>Dashboard Admin</h1>
     <a href="{{ url('login') }}" class="btn btn-primary">Keluar</a>
     <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Produk</a>
     <a href="{{ route('users.index') }}" class="btn btn-primary">Lihat Pengguna</a>
     <a href="{{ route('orders.indexAll') }}" class="btn btn-primary">Lihat Pesanan</a>
      
     <!-- bootstrap js and popper js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>
