<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . "/db.php";

$clients = 0;
$services = 0;
$bookings = 0;
$revenue = 0;

if ($conn) {

    $clientsRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"));
    $clients = $clientsRow['c'];

    $servicesRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"));
    $services = $servicesRow['c'];

    $bookingsRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"));
    $bookings = $bookingsRow['c'];

    $revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
    $revenue = $revRow['s'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
</head>

<body>

<?php include "nav.php"; ?>

<h2>Dashboard</h2>

<ul>
<li>Total Clients: <b><?php echo $clients; ?></b></li>
<li>Total Services: <b><?php echo $services; ?></b></li>
<li>Total Bookings: <b><?php echo $bookings; ?></b></li>
<li>Total Revenue: <b>₱<?php echo number_format((float)$revenue,2); ?></b></li>
</ul>

<p>
<a href="/assessment_beginner/pages/clients_add.php">Add Client</a> |
<a href="/assessment_beginner/pages/bookings_create.php">Create Booking</a>
</p>

</body>
</html>