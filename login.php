<?php
$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}

session_start();

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Login</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="signin.css">

</head>

<body>
    <div class="header">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
            <h4><a class="navbar-brand" href="#">Delhi Technological University</a></h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/virtual_college_administrator/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/virtual_college_administrator/register.php">Register Here</a><span class="sr-only">(current)</span>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

    </div>

    <div class="text-center">

        <?php

        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query  = "SELECT * FROM login WHERE `username` = '" . $email . "'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);

            if ($row) {
                if ($password == $row['password']) {
                    $_SESSION['id'] = $row['sid'];
                    // print_r($_SESSION);
                    header("Location:dashboard.php");
                } else {
                    echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
               Invalid credentials
              </div>';
                }
            } else {
                echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
              User not found
              </div>';
            }
        }

        ?>

        <form class="form-signin" method="POST">
            <img class="mb-4" src="logo.jpeg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <hr>
        </form>
        <button onclick="login()" id="guestLogin" class="btn btn-success">SignIn as Guest</button>
        <br><br>
        <a class="alter-text" href="/virtual_college_administrator/register.php">Not registered?</a>
        <p class="text-muted">&copy; 2020</p>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        function login() {
            window.location.replace("http://localhost/virtual_college_administrator/ask-questions.php");
        }
    </script>
</body>

</html>