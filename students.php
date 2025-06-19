 <?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "wellington";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize and get POST data
$fullName = $_POST['fullName'] ?? '';
$studentClass = $_POST['studentClass'] ?? '';
$studentID = $_POST['studentID'] ?? '';
$dob = $_POST['dob'] ?? '';
$gender = $_POST['gender'] ?? '';
$parentName = $_POST['parentName'] ?? '';
$parentContact = $_POST['parentContact'] ?? '';
$address = $_POST['address'] ?? '';
$email = $_POST['email'] ?? '';

// Handle photo upload
$photoPath = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
  $targetDir = "uploads/";
  if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
  }
  $photoName = basename($_FILES["photo"]["name"]);
  $targetFile = $targetDir . time() . "_" . $photoName;
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    $photoPath = $targetFile;
  }
}

// Insert into database (include photo path)
$sql = "INSERT INTO students (full_name, student_class, student_id, dob, gender, parent_name, parent_contact, address, email, photo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $fullName, $studentClass, $studentID, $dob, $gender, $parentName, $parentContact, $address, $email, $photoPath);

if ($stmt->execute()) {
  echo "<script>alert('Student registered successfully.'); window.location.href='index.php';</script>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
