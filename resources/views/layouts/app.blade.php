<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('products.displaygrid') }}">Shop</a></li>
            <li><a href="{{ route('scorders.index') }}">Orders</a></li>
        </ul>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @yield('content')
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</body>
</html>