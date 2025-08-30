<!-- airlines_user_project/book_flight.php -->
<?php
include 'db.php';

if (!isset($_GET['id'])) {
  echo "❌ Flight ID is missing!";
  exit;
}

$flight_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $passenger_name = $_POST['name'];
  $contact = $_POST['contact'];

  $stmt = $conn->prepare("INSERT INTO bookings (flight_id, passenger_name, contact) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $flight_id, $passenger_name, $contact);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "<script>alert('✅ Booking Confirmed!'); window.location='index.php';</script>";
  } else {
    echo "<script>alert('❌ Booking Failed');</script>";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Flight</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-primary text-center">Book Your Flight</h2>
  <form method="POST" class="col-md-6 mx-auto shadow p-4 rounded">
    <div class="mb-3">
      <label for="name" class="form-label">Passenger Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
      <label for="contact" class="form-label">Contact Number</label>
      <input type="text" class="form-control" name="contact" required>
    </div>
    <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
  </form>
</div>
</body>
</html>
