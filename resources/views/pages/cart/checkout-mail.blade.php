<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Inquiry</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #3498db;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .logo {
            margin-right: 20px;
            height: 50px;
            width: 50px;
        }

        h1 {
            color: #2c3e50;
            margin: 0;
        }

        .section {
            margin-bottom: 25px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-weight: bold;
            color: #2980b9;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .details {
            margin-left: 15px;
        }

        .product {
            background-color: #f4f4f4;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .highlight {
            color: #2980b9;
            text-decoration: none;
        }

        .highlight:hover {
            text-decoration: underline;
        }

        p {
            margin: 8px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset(config('settings.KT_THEME_ASSETS.favicon')) }}" alt="Company Logo">
        </div>
        <h1>Product Enquiry</h1>
    </div>

    <div class="section">
        <div class="section-title">Customer Information</div>
        <div class="details">
            <p><strong>Name:</strong> {{ $username }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Country:</strong> {{ $country }}</p>
            <p><strong>Company Name:</strong> {{ $company_name }}</p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Enquiry Description</div>
        <div class="details">
            <p>{{ $description }}</p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Requested Products</div>
        @foreach ($products as $product)
            <div class="product">
                <p><strong>Name:</strong> {{ $product['name'] }}</p>
                <p><strong>Part Number:</strong> {{ $product['part_number'] }}</p>
                <p><strong>OEM:</strong> {{ $product['oem'] }}</p>
                <p><strong>Price:</strong> {{ $product['price']}}</p>
                <p><strong>Brand:</strong> {{ $product['brand'] }}</p>
                <p><strong>Requested Quantity:</strong> {{ $product['quantity'] }}</p>
                <p><strong>Product Link:</strong> <a href="{{ $product['url'] }}" class="highlight">View Product</a>
                </p>
            </div>
        @endforeach
    </div>

</body>

</html>