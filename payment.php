 <?php
$conn = new mysqli("localhost", "root", "", "wellington"); // Removed space in db name

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Receive form data
$student_id = $_POST['student_id'];
$full_name = $_POST['full_name'];
$term = $_POST['term'];
$class = $_POST['class'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$transaction_ref = $_POST['transaction_ref'];
$payment_date = $_POST['payment_date'];
$status = $_POST['status'];

// Insert data into 'payments' table
$sql = "INSERT INTO payments (student_id, full_name, term, class, amount, method, transaction_ref, payment_date, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssissss", $student_id, $full_name, $term, $class, $amount, $method, $transaction_ref, $payment_date, $status);
 if ($stmt->execute()) {
    echo "<script>alert('Payments Saved Successfully!'); window.location.href='project.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>