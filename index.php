<?php

include '../back/php.php';

//header("Content-Type: application/json; charset=UTF-8");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fa185d2fc7.js" crossorigin="anonymous"></script>
    <title>Global Cases</title>
    <style>
 

        *{
            margin:0;
            padding:0;
        }

        body {
            background-image: none;
 
            overflow: visible;
            font-family: Arial, Helvetica, sans-serif;
        }

 table {
            width:  100%;
            border-collapse: collapse;
        }
     
        .scrollingTable {
            width: 30em;
            overflow-y: auto;
        }

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
    .form-container input[type=text],
    .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
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
      margin-bottom: 10px;
      opacity: 0.8;
    }

 

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }

    ul {
      padding: 0;
      list-style-type: none;
    }
     th {
  position: sticky;
  padding: 0.25rem;
  
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}

    </style>
    <script type="text/javascript">
        function makeTableScroll() {
            // Constant retrieved from server-side via JSP
            var maxRows = 15;

            var table = document.getElementById('myTable');
            var wrapper = table.parentNode;
            var rowsInTable = table.rows.length;
            var height = 0;
            if (rowsInTable > maxRows) {
                for (var i = 0; i < maxRows; i++) {
                    height += table.rows[i].clientHeight;
                }
                wrapper.style.height = height + "px";
            }
        }
    </script>
 
</head>

<body onload=" makeTableScroll()">
<div class="container-fluid p-1  bg-dark text-white">
    <h2 align="center"><u><big>This is a test website,please check official sources </u></big> <img src='lebanon-flag.png' alt='Lebanon' height="30px" width="50px" />  *<br/><u><small> Use Screen Rotation on Mobile to View Full table </small></u></h2>
  </div>


    <div class="container-fluid p-4 my-1 bg-dark text-white">
    <div class="text-center">
      <h5>Your Covid-19 Global Tracker:</h5>
    </div>
    </div>
    <div class="container-fluid my-5">
       
        <div class="row text-center">
            <div class="col-4 text-warning">
                <h5>Confirmed</h5>
                <?php echo $total_conf; ?>
            </div>
            <div class="col-4 text-success">
                <h5>Recovered</h5>
                <?php echo $total_rec; ?>
            </div>
            <div class="col-4 text-danger">
                <h5>Deaths</h5>
                <?php echo $total_death; ?>
            </div>

        </div>
    </div>
 <div class="table-responsive">
    <div class="container-fluid sm-12 ">
        <div class="container-fluid sticky-top">
             <div class="scrolling table">
           
                <table style="border:2px solid black" id="myTable" class="table table-dark sticky-top table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Countries</th>
                            <th scope="col">Confirmed</th>
                            <th scope="col">Recovered</th>
                            <th scope="col">Deceased</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key => $value) {
                            $inc = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                        ?>
                            <tr>
                                <th>
                                    <?php echo $key; ?>
                                <td>
                                    <?php echo $value[$days_count]['confirmed']; ?>
                                    <?php if ($inc != 0) { ?>
                                        <small class="text-danger"><i class="fas fa-arrow-up"></i><?php echo $inc;
                                                                                                } ?></small>
                                </td>
                                <td>
                                    <?php echo $value[$days_count]['recovered']; ?>

                                </td>
                                <td>
                                    <?php echo $value[$days_count]['deaths']; ?>

                                </td>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    
    <hr >
</body>
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
            <a>Lebanon <i class="mdi mdi-map-marker-radius"></i></a><span class="bfh-countries" data-country="US" data-flags="true"></span>
          </li>
          <li>
            <a><i class="mdi mdi-phone-in-talk"></i>tel not avialable yet</a>
          </li>
          <li>
            <a href="mailto:example@email.com" >example@email.com</a>
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
            <a href="https://example.com/index.php">Global statics(test)</a>
          </li>
          <li>
            <a href="https://example.com/LocalCases.php">Local Statitcs(test)</a>
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
      <input type="text" placeholder="Enter Email" name="name" required>

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

  if (isset($_POST['sub'])) {
 $link = "https://example.com/signup.php";
$name = $_POST['name'];
$email = $_POST['email'];
$message = "Thank your for subscribing to website!\nTo complete your registration, Please follow this link below:\n".$link."\nin case you incounter any problem, please feel free to contacts us through Contact us page on our website.\nRegards.";


//$message =  . $link."\n

$from = "example@email.com";

    if (!empty($email) && !empty($name)) {

      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $statusMsg = 'Please enter your valid email.';
        $msgClass = 'errordiv';
      }
      else {
            $headers = "From: $from";
            mail($email, 'Your Form', $message);
            mail("$from", "$email", 'Thank you', "$message" );
            //echo "<h1>Thank You</h1>";
      }      exit();
}
}

  ?>
 

  <!-- Copyright -->
  <div class="footer-copyright text-center py-5 container-fluid p-4 my-3 bg-dark text-white">© 2020 Copyright:
     <a href="https:example.com/index.php"> Your Covid-19 Tracker</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>
