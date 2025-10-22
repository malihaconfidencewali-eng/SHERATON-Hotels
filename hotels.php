<?php include 'db.php'; 
$location = $_GET['location'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Available Hotels</title>
  <style>
    body {font-family:Arial;background:#f7f7f7;margin:0;}
    header {background:#00264d;color:white;padding:20px;text-align:center;font-size:24px;}
    .list {display:flex;flex-wrap:wrap;gap:20px;padding:20px;justify-content:center;}
    .hotel {background:white;width:300px;padding:15px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);}
    .hotel img {width:100%;border-radius:10px;}
    .hotel h3 {margin:10px 0;}
    button {padding:10px;background:#00264d;color:white;border:none;border-radius:5px;cursor:pointer;}
  </style>
</head>
<body>
  <header>Hotels in <?php echo htmlspecialchars($location); ?></header>
  
  <div class="list">
    <?php
      $stmt = $conn->prepare("SELECT * FROM hotels WHERE location LIKE ?");
      $stmt->execute(["%$location%"]);
      while($row = $stmt->fetch()){
        echo "<div class='hotel'>
        <img src='{$row['image']}'>
        <h3>{$row['name']}</h3>
        <p>{$row['description']}</p>
        <p>Price: \${$row['price']} / night</p>
        <button onclick=\"window.location.href='book.php?id={$row['id']}&checkin=$checkin&checkout=$checkout'\">Book Now</button>
        </div>";
      }
    ?>
  </div>
</body>
</html>
