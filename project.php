 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>School Fees Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="stylee.css">
</head>
<body>
  <button class="menu-toggle" id="menuToggle">
    <i class="fas fa-bars"></i>
  </button>
  
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar py-4" id="sidebar">
        <h4 class="text-center"><i class="fas fa-school me-2"></i><b>John Osogo Boys</b></h4>
        <nav class="nav flex-column px-3">
          <a class="nav-link active" href="#" data-section="studentReg"><i class="fas fa-user-plus me-2"></i>Student Registration</a>
          <a class="nav-link" href="#" data-section="feeStructure"><i class="fas fa-table me-2"></i>Fee Structure</a>
          <a class="nav-link" href="#" data-section="paymentEntry"><i class="fas fa-money-bill-wave me-2"></i>Payment Entry</a>
          <a class="nav-link" href="#" data-section="receiptGen"><i class="fas fa-file-invoice me-2"></i>Generate Receipt</a>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 p-4">
        
        <!-- Student Registration -->
        <div id="studentReg" class="content-section active">
          <div class="form-title"><i class="fas fa-user-plus me-2"></i>Student Registration</div>
          <form action="students.php" method="POST" class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="fullName" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Class</label>
              <input type="text" name="studentClass" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Student ID</label>
              <input type="text" name="studentID" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Gender</label>
              <select name="gender" class="form-select" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Parent/Guardian Name</label>
              <input type="text" name="parentName" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Parent Contact</label>
              <input type="text" name="parentContact" class="form-control" required>
            </div>
            <div class="col-md-12">
              <label class="form-label">Home Address</label>
              <input type="text" name="address" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary mt-3">Register Student</button>
            </div>
          </form>
        </div>

        <!-- Fee Structure -->
        <div id="feeStructure" class="content-section">
          <div class="form-title"><i class="fas fa-table me-2"></i>Fee Structure</div>
          <form action="fees.php" method="POST" class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Academic Year</label>
              <input type="text" name="year" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Class</label>
              <input type="text" name="class" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Term</label>
              <input type="text" name="term" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Amount (Ksh)</label>
              <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Fee Category</label>
              <select name="category" class="form-select" required>
                <option value="">Select Category</option>
                <option>Tuition</option>
                <option>Boarding</option>
                <option>Meals</option>
                <option>Exam</option>
                <option>Development</option>
                <option>Others</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Status</label>
              <select name="status" class="form-select" required>
                <option value="">Select Status</option>
                <option>Active</option>
                <option>Inactive</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-success">Save Structure</button>
            </div>
          </form>
        </div>

        <!-- Payment Entry -->

        
        <div id="paymentEntry" class="content-section">
          <div class="form-title"><i class="fas fa-money-bill-wave me-2"></i>Payment Entry</div>
          <form action="payment.php" method="POST" class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Student ID</label>
              <input type="text" name="student_id" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Full Name</label>
              <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Term</label>
              <select name="term" class="form-select" required>
                <option value="">Select Term</option>
                <option>Term 1</option>
                <option>Term 2</option>
                <option>Term 3</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Class</label>
              <input type="text" name="class" class="form-control" placeholder="e.g., Form 2" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Amount Paid</label>
              <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Payment Method</label>
              <select name="method" class="form-select" required>
                <option value="">Select Method</option>
                <option>Cash</option>
                <option>M-Pesa</option>
                <option>Bank Transfer</option>
                <option>Cheque</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Transaction Reference</label>
              <input type="text" name="transaction_ref" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Payment Date</label>
              <input type="date" name="payment_date" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Status</label>
              <select name="status" class="form-select" required>
                <option>Successful</option>
                <option>Pending</option>
                <option>Failed</option>
              </select>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit Payment</button>
            </div>
          </form>
        </div>

        <!-- Receipt Generation -->
        <div id="receiptGen" class="content-section">
          <div class="form-title"><i class="fas fa-file-invoice me-2"></i>Generate Receipt</div>
          <form action="receipt.php" method="POST" class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Payment ID</label>
              <input type="text" name="payment_id" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Issued Date</label>
              <input type="date" name="issued_date" class="form-control" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-secondary">Generate Receipt</button>
            </div>
          </form>
        </div>
        
        <!-- Footer -->
        <div class="footer">
          <p>© 2025 School Fees Management System | JOHN OSOGO</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Mobile menu toggle
    document.getElementById('menuToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.style.width = sidebar.style.width === '250px' ? '70px' : '250px';
    });
    
    // Section switching
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll(".content-section");

    navLinks.forEach(link => {
      link.addEventListener("click", function(e) {
        e.preventDefault();
        navLinks.forEach(l => l.classList.remove("active"));
        this.classList.add("active");

        const sectionId = this.getAttribute("data-section");
        sections.forEach(section => {
          section.classList.remove("active");
          if (section.id === sectionId) {
            section.classList.add("active");
          }
        });
      });
    });
    
    // Set today's date as default for date fields
    const today = new Date().toISOString().split('T')[0];
    document.querySelector('input[name="payment_date"]').value = today;
    document.querySelector('input[name="issued_date"]').value = today;
  </script>

  
</body>
</html>