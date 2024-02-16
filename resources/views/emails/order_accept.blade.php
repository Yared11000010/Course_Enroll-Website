<!DOCTYPE html>
<html>
<head>
    <title> Order has been  arrived</title>
</head>
<body>
    <h2>Dear {{$messageData['admin_name']}},</h2>

    <p>new  order has been arrived from <b>{{ $messageData['name'] }}</b> </p>
    <p><strong>Order ID:</strong> {{$messageData['order_id']}}</p>
    <p><strong>Order Type:</strong> {{$messageData['order_type']}}</p>
    <p><strong>Course Name:</strong> {{$messageData['course_name']}}</p>
    <p><strong>Total Amount:</strong> {{$messageData['orderDetails']['amount']}}</p>
    <p><strong>Order Status:</strong> {{$messageData['orderDetails']['status']}}</p>
    <br>
    Best regards,<br>
    Sayzanarim company<br>
    Address : Addis Ababa
    Around Guardsholla
     <br>
    Email : atsbehateklu166@gmail.com <br>
    Phone : +251911262107<br>
</body>
</html>



