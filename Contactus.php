<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
<!-- vue js -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- My jQuery -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="path/to/chartjs/dist/Chart.js"></script>
    <title>Contact us</title>
    <style>
        
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
ul {
    padding: 0;
    list-style-type: none;
}
    </style>
</head>
 <h2>Under Development</h2>
<p3>Covid-19 tracker is a personal project that provides you with the latest Covid-19 Cases in Lebanon and World Wide. <br/>also you can contact us directly via email at: <a href="mailto:example@email.com">example@email.com .</a></p3>
<body>
<!-- Default form contact -->
<form class="text-center border border-light p-5" method="POST">

        <div class="container-fluid p-3 my-3 bg-dark text-white">
        <div class="text-center">
            <h5>Contact us:</h5>
        </div>
    </div><br/>

    <!-- Name -->
    <input type="text" name="name" class="form-control mb-4" placeholder="Name" required>

    <!-- Email -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" required>

    <!-- Subject -->
    <input type="text" name="subject" class="form-control mb-4" placeholder="Subject" required>
    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" name="message" rows="3" placeholder="Message" required></textarea>
    </div>
<br/>
    <!-- Send button -->
    <button  name='submit' class="btn btn-info btn-block" type="submit">Send</button>

</form>
<!-- Default form contact -->
<!-- Material form contact -->
<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data

    $name = $_POST['name'];
     $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'example@email.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name:</h4><p>'.$name.'</p>
                <h4>Email:</h4><p>'.$email.'</p>
                <h4>Subject:</h4><p>'.$subject.'</p>
                <h4>Message:</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                echo "<SCRIPT>alert('Thank you for reaching us, we will reply to you soon!');
                document.location = 'https://example.com/index.php';</SCRIPT>";
                $statusMsg = 'Your contact request has been submitted successfully !';
                $msgClass = 'succdiv';
              
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>
</body>
<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-3">Our Mission:</h5>
        <p>track the spread of Covid-19 in Lebanon and world-wide, and to update you with all important news on demand.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold mt-3 mb-3">About us:</h5>

        <ul class="list-unstyled">
          <li>
            <a>Lebanon</a><span class="bfh-countries"></span>
          </li>
          <li>
            <a>Al-shouf, LBN</a>
          </li>
          <li>
            <a>tel not available yet</a>
          </li>
          <li>
            <a hred=mailto: "example@email.com">example@email.com</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold  mt-3 mb-3">Site Map:</h5>

        <ul class="list-unstyled">
      
          <li>
            <a href="https://example.com/index.php">Global Statics(test)</a>
          </li>
          <li>
             <a href="">Local Statitcs(test)</a>
          </li>
          <li>
            <a href="https://example.com/Contactus.php">Contact us</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
  
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

 <hr>
 

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h5 class="mb-1">Subscribe to us! </h5>
    </li>
    <li class="list-inline-item">
     <button type="button" class="btn btn-danger btn-rounded" class="open-button" onclick="openForm()">Sign up</button>
    </li>
  </ul>
  <!-- Call to action -->


<div class="form-popup" id="myForm">
  <form method="POST" class="form-container">
    <h1>Subscibe:</h1>

    <label><b>name</b></label>
    <input type="text" placeholder="Enter your name" name="name" required>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter your Email" name="email" required>

    <button type="submit" class="btn" name='sub'>register</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById('myForm').reset();
}
document.getElementById('myForm').reset();
</script>
<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['sub'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = 'Your Covid-19Tracker Subscribe Request';
 //   $message ='please verify by following this link ';
 $message = "<html><head>
<title>Your email at the time</title>
</head>
<body>
</body>";
    $sublink= 'https://example.com/signup.php';
  //  $subject = $_POST['subject'];
//    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'example@email.com';
            $emailSubject = 'Subscribe Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Your Name: </h4><p>'.$name.' </p>
                <h4>Your Email: </h4><p>'.$email.'</p>
                <h4>Subject: </h4><p>'.$subject.'</p>
                <h4>Message: </h4><p>'.$message.'<br>'.$sublink.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header = "From: $noreply@intaxfin.com\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Your contact request has been submitted successfully !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>
  



 <!-- Copyright -->
  <div class="footer-copyright text-center py-5 container-fluid p-3 my-3 bg-dark text-white">© 2020 Copyright:
    <a href="https://example.com/index.php"> Your Covid-19 Tracker</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->






</html>
