<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SkyJet Airlines - Book Flights</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="images/plane-logo.png" alt="Logo" width="30" class="d-inline-block align-text-top">
        SkyJet Airlines
      </a>
    </div>
  </nav>

  <header class="hero-section text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Book Your Flight Now</h1>
      <p class="lead">Smooth. Fast. Reliable. Fly with SkyJet!</p>
    </div>
  </header>

  <div class="container mt-5">
    <h2 class="mb-4 text-center text-primary">Available Flights</h2>
    <div class="row">
      <?php
        $result = $conn->query("SELECT * FROM flights");
        while ($row = $result->fetch_assoc()) {
      ?>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img src="images/flight.jpg" class="card-img-top" alt="Flight">
          <div class="card-body">
            <h5 class="card-title">Airline: <?= $row['airline'] ?></h5>
            <p class="card-text">
              <strong>From:</strong> <?= $row['source'] ?><br>
              <strong>To:</strong> <?= $row['destination'] ?><br>
              <strong>Departure:</strong> <?= $row['departure'] ?><br>
              <strong>Arrival:</strong> <?= $row['arrival'] ?><br>
              <strong>Price:</strong> ₹<?= $row['price'] ?>
            </p>
            <a href="book_flight.php?id=<?= $row['id'] ?>" class="btn btn-success w-100">Book Now</a>

          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <footer class="footer bg-primary text-white text-center py-3 mt-5">
    &copy; 2025 SkyJet Airlines. All rights reserved.
  </footer>
</body>
</html>
