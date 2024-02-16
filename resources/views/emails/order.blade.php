<!DOCTYPE html>
<html>
<head>
    <title>Your Order Has Been Placed</title>
</head>
<body>
    <h1>Dear {{$messageData['name']}},</h1>
    <p>Your order has been placed successfully. Below are the order details:</p>
    <p><strong>Order ID:</strong> {{$messageData['order_id']}}</p>
    <p><strong>Order Type:</strong> {{$messageData['order_type']}}</p>
    <p><strong>Course Name:</strong> {{$messageData['course_name']}}</p>
    <p><strong>Total Amount:</strong> {{$messageData['orderDetails']['amount']}}</p>
    <p><strong>Order Status:</strong> {{$messageData['orderDetails']['status']}}</p>
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



