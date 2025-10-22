  <?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sheraton Hotels Clone</title>
  <style>
    body {font-family:Arial, sans-serif;margin:0;background:#f7f7f7;}
    header {background:#00264d;color:white;padding:20px;text-align:center;font-size:24px;}
    form {margin:20px auto;text-align:center;}
    input, button {padding:10px;margin:5px;border-radius:5px;border:1px solid #ccc;}
    .featured {display:flex;justify-content:center;gap:20px;flex-wrap:wrap;}
    .hotel {background:white;padding:15px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);width:250px;}
    .hotel img {width:100%;border-radius:10px;}
    .hotel h3 {margin:10px 0;}
  </style>
</head>
<body>
  <header>Sheraton Hotels Clone</header>
  
  <form id="searchForm">
    <input type="text" name="location" placeholder="Enter Location" required>
    <input type="date" name="checkin" required>
    <input type="date" name="checkout" required>
    <button type="submit">Search Hotels</button>
  </form>
  
  <h2 style="text-align:center;">Featured Hotels</h2>
  <div class="featured">
    <?php
      $stmt = $conn->query("SELECT * FROM hotels LIMIT 2");
      while($row = $stmt->fetch()){
        echo "<div class='hotel'>
        <img src='{$row['image']}'>
        <h3>{$row['name']}</h3>
        <p>{$row['location']}</p>
        <p>\${$row['price']} per night</p>
        </div>";
      }
    ?>
  </div>
  
<script>
document.getElementById('searchForm').addEventListener('submit', function(e){
  e.preventDefault();
  const loc = this.location.value;
  const ci = this.checkin.value;
  const co = this.checkout.value;
  window.location.href = `hotels.php?location=${loc}&checkin=${ci}&checkout=${co}`;
});
</script>
</body>
</html>
