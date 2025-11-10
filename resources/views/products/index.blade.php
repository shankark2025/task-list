<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            color: #333;
        }
        .product-list {
            list-style: none;
            padding: 0;
        }
        .product-list li {
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>All Products</h1>

    <ul class="product-list">
        @foreach($products as $product)
            <li>
                <a href="{{ url('/product/' . $product->slug) }}">
                    {{ $product->name }}
                </a> – ₹{{ $product->price }}
            </li>
        @endforeach
    </ul>
</body>
</html>
