<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>View Products</h1>
    
    <div class="table">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barcode</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Available Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->availQuantity }}</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No products found.</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>
</html>
