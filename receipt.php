 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    .receipt-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 1.6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      background-color: #fff;
      border-radius: 10px;
    }

    .receipt-box h3 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
      color: #2a2a2a;
      text-transform: uppercase;
    }

    .receipt-box h4 {
      margin: 0;
      font-size: 18px;
      font-weight: bold;
    }

    .receipt-box p {
      margin: 4px 0;
    }

    .table-bordered {
      width: 100%;
      border-collapse: collapse;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #ccc;
      padding: 8px 12px;
    }

    .table-bordered th {
      background-color: #f5f5f5;
      text-align: left;
    }

    .text-center {
      text-align: center;
    }

    .text-end {
      text-align: right;
    }

    .mt-4 {
      margin-top: 1.5rem;
    }

    .mt-5 {
      margin-top: 3rem;
    }

    .mb-4 {
      margin-bottom: 1.5rem;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 8px 20px;
      font-size: 16px;
      border-radius: 5px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      cursor: pointer;
    }

    .form-title {
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      color: #007bff;
      margin: 30px auto 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .col-md-6 {
      width: 50%;
      padding: 0 10px;
    }

    @media (max-width: 768px) {
      .col-md-6 {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = new mysqli("localhost", "root", "", "wellington");
if ($conn->connect_error) {
    die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
}

// Validate input
if (!isset($_POST['payment_id']) || !isset($_POST['issued_date'])) {
    die("<div class='alert alert-danger'>Missing required data.</div>");
}

$payment_id = $conn->real_escape_string($_POST['payment_id']);
$issued_date = $conn->real_escape_string($_POST['issued_date']);

// Fetch payment details
$stmt = $conn->prepare("SELECT id, full_name, student_id, term, class, amount, transaction_ref, method FROM payments WHERE id = ?");
$stmt->bind_param("i", $payment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $payment = $result->fetch_assoc();

    $full_name = $payment['full_name'];
    $student_id = $payment['student_id'];
    $term = $payment['term'];
    $class = $payment['class'];
    $amount = number_format($payment['amount'], 2);
    $ref = $payment['transaction_ref'];
    $method = $payment['method'];

    // Save to receipts table
    $insert = $conn->prepare("INSERT INTO receipts (payment_id, full_name, term, amount, transaction_ref, issued_date) VALUES (?, ?, ?, ?, ?, ?)");
    $insert->bind_param("isssss", $payment_id, $full_name, $term, $payment['amount'], $ref, $issued_date);
    $insert->execute();

    echo "
    <div class='form-title'><i class='fas fa-file-alt'></i> Preview Receipt</div>
    <div class='receipt-box'>
      <h3>PAYMENT RECEIPT</h3>
      <div class='text-center mb-4'>
        <h4>JOHN OSOGO</h4>
        <p>P.O Box 12345, Nairobi | Tel: 0743333243</p>
      </div>

      <div class='row mb-4'>
        <div class='col-md-6'>
          <p><strong>Receipt No:</strong> RCPT-" . date("Y") . "-$payment_id</p>
          <p><strong>Date:</strong> $issued_date</p>
        </div>
        <div class='col-md-6 text-end'>
          <p><strong>Payment ID:</strong> PAY-" . date("Y") . "-$payment_id</p>
          <p><strong>Student ID:</strong> $student_id</p>
        </div>
      </div>

      <div class='mb-4'>
        <p><strong>Received from:</strong> Mr./Ms. $full_name</p>
        <p><strong>Student Name:</strong> $full_name</p>
        <p><strong>Class:</strong> $class</p>
      </div>

      <table class='table table-bordered'>
        <thead>
          <tr>
            <th>Description</th>
            <th>Amount (Ksh)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>$term Fees - Tuition</td>
            <td>$amount</td>
          </tr>
          <tr>
            <td class='text-end'><strong>Total</strong></td>
            <td><strong>$amount</strong></td>
          </tr>
        </tbody>
      </table>

      <div class='mt-4'>
        <p><strong>Payment Method:</strong> $method</p>
        <p><strong>Transaction Ref:</strong> $ref</p>
      </div>
                 <hr>
      <div class='mt-5 row'>
        <div class='col-md-6'>
          <p>_________________________</p>
          <p>Parent/Guardian Signature</p>
        </div>
        <div class='col-md-6 text-end'>
          <p>_________________________</p>
          <p>School Stamp & Signature</p>
        </div>
      </div>

      <div class='text-center mt-4'>
        <button class='btn btn-primary' onclick='window.print()'><i class='fas fa-print me-2'></i>Print Receipt</button>
      </div>
    </div>";
} else {
    echo "<div class='alert alert-warning'>Payment ID not found.</div>";
}

$conn->close();
?>

</body>
</html>
