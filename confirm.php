<?php include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $stmt = $conn->prepare("INSERT INTO bookings (hotel_id, guest_name, checkin, checkout, email) VALUES (?,?,?,?,?)");
  $stmt->execute([
    $_POST['hotel_id'],
    $_POST['guest_name'],
    $_POST['checkin'],
    $_POST['checkout'],
    $_POST['email']
  ]);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmed</title>
  <style>
    body {font-family:Arial;background:#f7f7f7;margin:0;text-align:center;}
    .box {background:white;width:400px;margin:50px auto;padding:20px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);}
    h2 {color:green;}
  </style>
</head>
<body>
  <div class="box">
    <h2>Booking Confirmed!</h2>
    <p>Thank you, <?php echo htmlspecialchars($_POST['guest_name']); ?>. Your booking has been confirmed.</p>
    <button onclick="window.location.href='index.php'">Go Back Home</button>
  </div>
</body>
</html>
