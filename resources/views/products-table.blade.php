<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Products Table</title>
</head>
<body>
    <div class="container shadow mt-5">
        <div class="d-flex w-100">
            <input id="search-product" type="text" class="form-control w-25" placeholder="Search Products...">
            <button id="search-button" class="btn btn-danger ms-1 mt-2"><i class="bi bi-search-heart"></i> Search </button>
        </div>
        <div class="d-flex justify-content-center" id="display-error">
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class=" table-success">
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="col">{{ $product->id }}</th>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <span>{{ $products->links('pagination::bootstrap-4') }}</span>
        </div>
    </div>
    <script src="{{ asset('js/search-product.js') }}"></script>
</body>
</html>
