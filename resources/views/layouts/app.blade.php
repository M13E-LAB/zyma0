
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zyma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #000 !important;
        }
        .card {
            background-color: #222;
            border: none;
            border-radius: 0;
        }
        .btn-primary {
            background-color: #00ff00;
            border-color: #00ff00;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #00dd00;
            border-color: #00dd00;
            color: #000;
        }
        .text-success {
            color: #00ff00 !important;
        }
        .product-image {
            background-color: #333;
            padding: 20px;
        }
        .product-details {
            background-color: #222;
            padding: 20px;
        }
        .price-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .price-stat-item {
            text-align: center;
        }
        .price-stat-item i {
            font-size: 24px;
            color: #00ff00;
            margin-bottom: 10px;
        }
        .table {
            color: #fff;
        }
        .table th {
            border-top: none;
        }
        .table td, .table th {
            border-color: #444;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.search') }}">
                ZYMA
            </a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
