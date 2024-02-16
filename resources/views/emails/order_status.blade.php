<!DOCTYPE html>
<html>
<head>
    <title>Your Order Status Updated</title>
</head>
<body>
    <h1>Dear {{$messageData['name']}},</h1>
    <p>Your order status has been updated to <button type="button" style="background-color: #FDC800;padding:2px 8px; border-radius:0.1rem;border:none;">{{ $messageData['status'] }}</button>  successfully. Below are the order details:</p>
    <p><strong>Order ID:</strong> {{$messageData['order_id']}}</p>
    <p><strong>Order Type:</strong> {{$messageData['order_type']}}</p>
    <p><strong>Course Name:</strong> {{$messageData['course_name']}}</p>
    <p><strong>Total Amount:</strong> {{$messageData['amount']}}</p>
    <p><strong>Order Status:</strong> {{$messageData['status']}}</p>
    <p>Thank you for shopping with us!</p>
    Best regards,<br>
    Sayzanarim company<br>
    Address : Addis Ababa
    Around Guardsholla
     <br>
    Email : atsbehateklu166@gmail.com <br>
    Phone : +251911262107<br>
</body>
</html>



