<!DOCTYPE html>
<html>
<head>
    <title>Product Not Found</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 100px; }
        h1 { font-size: 60px; color: #ff4d4d; }
        p { font-size: 20px; color: #555; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Sorry, the product you are looking for does not exist.</p>
    <p><a href="{{ url('/products') }}">Back to all products</a></p>
</body>
</html>
