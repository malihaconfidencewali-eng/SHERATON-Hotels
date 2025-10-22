<?php include 'db.php';
$id = $_GET['id'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$stmt = $conn->prepare("SELECT * FROM hotels WHERE id=?");
$stmt->execute([$id]);
$hotel = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Hotel</title>
  <style>
    body {font-family:Arial;background:#f7f7f7;margin:0;}
    header {background:#00264d;color:white;padding:20px;text-align:center;font-size:24px;}
    form {background:white;width:400px;margin:20px auto;padding:20px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);}
    input, button {width:100%;padding:10px;margin:10px 0;border-radius:5px;border:1px solid #ccc;}
    button {background:#00264d;color:white;border:none;cursor:pointer;}
  </style>
</head>
<body>
  <header>Booking: <?php echo $hotel['name']; ?></header>
  <form action="confirm.php" method="POST">
    <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>">
    <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
    <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
    <input type="text" name="guest_name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Confirm Booking</button>
  </form>
</body>
</html>
