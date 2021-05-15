<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}
function bargraph1( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/20;
    return $x;
}
function bargraph2( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/20;
    return $x;
}
function bargraph3( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/25;
    return $x;
}
function bargraph4( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/30;
    return $x;
}
function bargraph5( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/20;
    return $x;
}
function bargraph6( $s){
    $y=(int)($s[0])*10 + (int)($s[1]);
    $x = ($y*100)/25;
    return $x;
}
?>


<?php
$query = "SELECT * FROM students WHERE sid = ".$_SESSION['id'];
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);

$dataPoints = array(
    array("y" => bargraph1($row['att1']), "label" => "DBMS"),
    array("y" =>  bargraph2($row['att2']), "label" => "SE"),
    array("y" =>  bargraph3($row['att3']), "label" => "DE"),
    array("y" =>  bargraph4($row['att4']), "label" => "COA"),
    array("y" =>  bargraph5($row['att5']), "label" => "Discrete"),
    array("y" =>  bargraph6($row['att6']), "label" => "FEC")
);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Current Attendance"
                },
                axisY: {
                    title: "Attendance percentage",
                    includeZero: true,
                    suffix: "%",
                },
                dataPointWidth: 40,
                data: [{
                    type: "bar",
                    yValueFormatString: "## percent",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontWeight: "bolder",
                    indexLabelFontColor: "white",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Delhi Technological University</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/virtual_college_administrator/">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ask-questions.php">
                                <span data-feather="file"></span>
                                Ask questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                My Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Account Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <br>
                <h4>Your attendance</h4>
                <div id="chartContainer" style="height: 450px; width: 100%;"></div>
                <br>
                <?php
                    $query = "SELECT * FROM students WHERE sid = ".$_SESSION['id'];
                    $result = mysqli_query($link,$query);
                    $row = mysqli_fetch_array($result);
                
                ?>
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Attendance in number</th>
                            <th scope="col">Attendance in percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>DBMS</td>
                            <td><?php echo $row['att1'] ?></td>
                            <td><?php echo bargraph1($row['att1']) ?></td> 
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>SE</td>
                            <td><?php echo $row['att2'] ?></td>
                            <td><?php echo bargraph2($row['att2']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>DE</td>
                            <td><?php echo $row['att3'] ?></td>
                            <td><?php echo bargraph3($row['att3']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>COA</td>
                            <td><?php echo $row['att4'] ?></td>
                            <td><?php echo bargraph4($row['att4']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Discrete</td>
                            <td><?php echo $row['att5'] ?></td>
                            <td><?php echo bargraph5($row['att5']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>FEC</td>
                            <td><?php echo $row['att6'] ?></td>
                            <td><?php echo bargraph6($row['att6']) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- <h4>Your timetable</h4>
                <img src="A2SE.jpg"> -->

            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>