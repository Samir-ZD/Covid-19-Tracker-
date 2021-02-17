<?php
include '../back/call.php';

?>
<!DOCTYPE html>
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

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- My Stylesheet -->
  <link rel="stylesheet" href="style.css" />
  </link>
  <!-- My jQuery -->
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>



  <script>
    $(document).ready(function() {
      // Get JSON data:
      valueAxis: {
        tickInterval: 75
      }
      $.getJSON('province1.json', function(data) {
        var state = [];
        var confirmed = [];
        var recovered = [];
        var deaths = [];

        var total_month;
        var total_recovered;
        var total_deaths;

        // Take the first element in statewise array and add the objects values into the above variables:
        total_month = data.confirmed;
        total_recovered = data.recovered;
        total_deaths = data.deaths;

        // The each loop select a single statewise array element:
        // Take the data in that array and add it to variables:
        $.each(data, function(id, obj) {
          state.push(obj.state);
          confirmed.push(obj.confirmed);
          recovered.push(obj.recovered);
          deaths.push(obj.deaths);
        });

        // Remove the first element in the states, confirmed, recovered, and deaths as that is the total value:
        state.shift();
        confirmed.shift();
        recovered.shift();
        deaths.shift();

        // console.log(confirmed);
        $("#confirmed").append(total_month);
        $("#recovered").append(total_recovered);
        $("#deaths").append(total_deaths);

        // Chart initialization:
        var myChart = document.getElementById("myChart1").getContext("2d");
        var chart = new Chart(myChart, {
          type: "radar", // radar / doughnut
          data: {
            labels: state,
            datasets: [{
                label: "Confirmed ",
                data: confirmed,
                minBarLength: 100,
                // backgroundColor: "#f1c40f",
                backgroundColor: 'rgb(255,255,0,0.6)',
              },
              {
                label: "Recovered ",
                data: recovered,
                minBarLength: 100,
                backgroundColor: "rgba(0,255, 0, 0.70)",

              },
              {
                label: "Deceased ",
                data: deaths,
                minBarLength: 100,
                backgroundColor: "rgba(255, 0, 0, 0.70)",

              },
            ],
          },
          option: {},
        });
        var myChart2 = document.getElementById("myChart2").getContext("2d");
        var chart2 = new Chart(myChart2, {
          type: "line", // radar / doughnut
          data: {
            labels: state,
            datasets: [{
                label: "Confirmed ",
                data: confirmed,
                // backgroundColor: "#f1c40f",
                bordercolor: '#e74c3c',
                backgroundColor: 'rgb(255,255,0,0.6)',
                minBarLength: 1000,
              },
              {
                label: "Recovered ",
                data: recovered,
                backgroundColor: "rgba(0,255, 0, 0.70)",
                minBarLength: 1000,
              },
              {
                label: "Deceased ",
                data: deaths,
                backgroundColor: "rgba(255, 0, 0, 0.70)",
                minBarLength: 1000,
              },
            ],
          },
          option: {},
        });
     
        var myChart3 = document.getElementById("myChart3").getContext("2d");
        var chart3 = new Chart(myChart3, {
          type: "pie", // radar / doughnut
          data: {
            labels: state,
            datasets: [{
                label: "Confirmed ",
                data: confirmed,
                // backgroundColor: "#f1c40f",
                bordercolor: '#e74c3c',
                backgroundColor: 'rgb(255,255,0)',
                minBarLength: 1000,
              },
              {
                label: "Recovered ",
                data: recovered,
                backgroundColor: "rgba(0,255, 0)",
                minBarLength: 1000,
              },
              {
                label: "Deceased ",
                data: deaths,
                backgroundColor: "rgba(255, 0, 0)",
                minBarLength: 1000,
              },
            ],
          },
          option: {},
        });
      });
     });
    //for total cases
    $(document).ready(function() {
      // Get JSON data:
      valueAxis: {
        tickInterval: 75
      }
      $.getJSON('Total-cases.json', function(data) {
        var month = [];
        var confirmed = [];
        var recovered = [];
        var deaths = [];

        var total_month;
        var total_recovered;
        var total_deaths;

        // Take the first element in statewise array and add the objects values into the above variables:
        total_month = data.confirmed;
        total_recovered = data.recovered;
        total_deaths = data.deaths;

        // The each loop select a single statewise array element:
        // Take the data in that array and add it to variables:
        $.each(data, function(id, obj) {
          month.push(obj.month);
          confirmed.push(obj.confirmed);
          recovered.push(obj.recovered);
          deaths.push(obj.deaths);
        });

        // Remove the first element in the states, confirmed, recovered, and deaths as that is the total value:
        month.shift();
        confirmed.shift();
        recovered.shift();
        deaths.shift();

        // console.log(confirmed);
        $("#confirmed").append(total_month);
        $("#recovered").append(total_recovered);
        $("#deaths").append(total_deaths);

        // Chart initialization:
        var myChart4 = document.getElementById("myChart4").getContext("2d");
        var chart4 = new Chart(myChart4, {
          type: "bar", // radar / doughnut
          data: {
            labels: month,
            datasets: [{
                label: "Confirmed ",
                data: confirmed,
                // backgroundColor: "#f1c40f",
                bordercolor: '#e74c3c',
                backgroundColor: 'rgb(255,255,0)',
                minBarLength: 1000,
              },
              {
                label: "Recovered ",
                data: recovered,
                backgroundColor: "rgba(0,255, 0)",
                minBarLength: 1000,
              },
              {
                label: "Deceased ",
                data: deaths,
                backgroundColor: "rgba(255, 0, 0)",
                minBarLength: 1000,
              },
            ],
          },
          option: {},
        });
      });
    });
  </script>
 
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
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

    /* Add a red background color to the cauncel button */
    .form-container .cancel {
      background-color: red;
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
  </style>

  <title>Local Cases(Lebanon)</title>
</head>

<body>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="index.js"></script>
    <div class="container-fluid p-3 my-1 bg-dark text-white">
    <h2 align="center">
      * This is a test website,please check official sources <img src='lebanon-flag.png' alt='Lebanon' height="30px" width="50px" /> *</h2>
  </div>

  <!-- <div class="container-fluid bg-light  text-center my-3">-->
  <div class="container-fluid p-3 my-1 bg-dark text-white sticky-top">
    <div class="text-center">
      <h5>Covid-19 Tables:</h5>

    </div>
  </div>
  <div class="centered">
    <h5 class="text-muted  text-center"> From Lebanon Select a Province: <img src='lebanon-flag.png' height="40px" width="65px" /></h5>
    <hr />

    <?php
    $province = array("", "akkar","baalbak", "beirut", "beqaa", "mountlebanon", "nabatiyah",  "northlebanon", "southlebanon"); // Lebanese Cities, feel free to use
    $lmt = array("", 5, 10, 15,25,30);
    ?>
    <form method="POST">
      <div class='container col-md'><select name="drp" class=" container custom-select col-6" size="3">

          <?php
          for ($x = 1; $x < sizeof($province); $x++) {
            echo "<option name='$x'>$province[$x]</option>";
          }
          /* echo "<option name='$province'>City 1/option>";
                echo "<option name='$province'>City 2</option>";
                echo "<option name='$province'>City 3</option>";
                echo "<option name='$province'>City 4</option>";*/
          ?>
        </select>
        <div class='container col-md'><select name="drpnb" class=" container custom-select col-6">

            <?php
            for ($x = 1; $x < sizeof($lmt); $x++) {
              echo "<option name='$x'>$lmt[$x]</option>";
            }
            /* echo "<option name='$province'></option>";
                echo "<option name='$province'>5</option>";
                echo "<option name='$province'>10</option>";
                echo "<option name='$province'>15</option>";*/
            ?>
          </select>
          <button type="submit" name="show" class="btn btn-dark btn-rounded">Search</button></div>

      </div>
      <?php
      //public mysqli::real_escape_string ( string $province) : string;
      error_reporting(E_ALL ^ E_NOTICE); //to ignore unidetified index
      error_reporting($test);

      // @mysqli_real_escape_string();
      // $province = intval($province);
      $test = mysqli_real_escape_string($test);
      $test2 = mysqli_real_escape_string($test2);

      $test = $_POST['drp']; //$test   =  mysqli_real_escape_string($test, null) ;
      $test2 = $_POST['drpnb'];

      // $province= mysqli_real_escape_string($conn,$province); // important fun() -> took a lot of time
      if (isset($_POST['show'])) { //check AJAX and PHP 
        $sql_sel = "SELECT * FROM $test LIMIT $test2 ";
        $result = mysqli_query($conn, $sql_sel);
        if ($result->num_rows > 0) {
      
          echo "<br/><div class='container table-responsive-sm'>" . "<table width='50%' class='table table-hover table-striped'><tr><th scope='th-small col'>Cases</th><th scope='col'>Province:</th><th scope='col'>Active:</th><th scope='col'>Recovered:</th><th scope='col'>Deaths:</th><th scope='col'>Date:</th></tr>";
          //while ($row = $result->fetch_assoc()) {
          // echo '<table border = 1px><tr><th>City</th></tr>';
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['Case_ID'] . '</td><td>' . $row['City'] . '</td><td>' . $row['Active'] . '</td><td>' . $row['Recovered'] . '</td><td>' . $row['Death'] . '</td><td>' . $row['InsDate'] . '</td></tr>' . '</div>';
          }
          echo '</table>' . '<br/>';
          //echo '<p style="color:green;">' . "Province Selected Successfuly" . '</p>';
          echo '<script>alert("Province Selected Succesfully")</script>' . '</div>';
          echo '<div class="container alert alert-success center" role="alert">
  Province Selected Successfuly</div>';
        } else {
          echo '<br>' . '<div class="container alert alert-danger" role="alert">Error: Selected province ( ' . $test . ' ) is either Covid-free or does not have any recent records</div>';
          //   echo '<p style="color:red;">' . "Error_SELECT: "."Selected province is either Covid-free or does not have recent records". '</p>'  . "<br>" . mysqli_error($conn);
        }
      }
      ?>
    </form>
  </div>
  </main>
  <div class="container-fluid p-3 my-4 bg-dark text-white sticky-top">
    <div class="text-center">
      <h5>Charts & analysis:</h5>
    </div>
  </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="p-4 col-md-6">
        <canvas class="rounded border border-dark" id="myChart1"></canvas>
      </div>
      <div class="p-4 col-md-6 ">
        <canvas class="rounded border border-dark" id="myChart2"></canvas>
      </div>
      <div class="p-4 col-md-6 ">
        <canvas class="rounded border border-dark" id="myChart3"></canvas>
      </div>
      <div class="p-4 col-md-6 ">
        <canvas class="rounded border border-dark" id="myChart4"></canvas>
      </div>
>
    </div>
  </div>
  <hr>
</body <!-- Footer -->
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
            <a></a><i class="mdi mdi-map-marker-radius"></i>Lebanon, LBN</a>
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
            <a href="https://example.com/index.php">Global Statics(test)</a>
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
     <a href="https://example.com/index.php"> Your Covid-19 Tracker</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>
