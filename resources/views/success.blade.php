<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-left: 5px solid #3cb371;
        }
        .receipt p {
            margin: 0;
            padding: 5px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #3cb371;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #36a166;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Receipt</h1>
        <div class="receipt" id="receipt">
            <p><strong>Name:</strong>{{$info->first_name}} {{$info->last_name}}</p>
            <p><strong>Phone:</strong>{{$info->phone_number}}</p>
            <p><strong>Email:</strong>{{$info->email}}</p>
            <p><strong>Transaction ID:</strong>{{$info->tx_ref}} </p>
            <p><strong>Amount: ETB {{$info->amount}}</strong></p>
            <p><strong>Reason:  {{$info->customization->title}}</strong></p>
            <!-- Add more details as needed -->
            <p><strong>defined:</strong> </p>
       
</body>
</html>

