<?php
$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Register</title>

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
                            <a class="nav-link" href="/virtual_college_administrator/login.php">Login Here</a><span class="sr-only">(current)</span>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

    </div>

    <div class="text-center">

        <?php

        if ($_POST) {

            $query = "SELECT * FROM students WHERE `roll_no` = '" . $_POST["rollNo"] . "'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);

            if ($row) {
                if ($row['accountExist'] == 1) {
                    echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
                        Account already exists
                       </div>';
                } else {
            //         echo '<div style="margin:0 40%;" class=" alert alert-success" role="alert">
            //         New User created
            //    </div>';
               $sql = "INSERT INTO login (sid, roll_no, username, password)
                VALUES ('$row[sid]','$row[roll_no]', '$row[email]', '$row[password]')";

              if ($link->query($sql) === TRUE) {
                echo '<div style="margin:0 40%;" class=" alert alert-success" role="alert">
                New User created
           </div>';
             } else {
             echo "Error: " . $sql . "<br>" . $link->error;
                }
               $sql = "UPDATE students SET accountExist=1 WHERE `roll_no` = '" . $_POST["rollNo"] . "'";
               if ($link->query($sql) === TRUE) {
                 echo "Record updated successfully";
               } else {
                 echo "Error updating record: " . $link->error;
               }
                }
            } else {
                echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
                    Roll Number not found in database
               </div>';
            }
        }

        ?>

        <form method="POST" class="form-signin">
            <img class="mb-4" src="logo.jpeg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>
            <label for="inputRollNo" class="sr-only">Roll Number</label>
            <input name="rollNo" type="text" class="form-control" placeholder="Roll Number" required autofocus>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email"class="form-control" placeholder="Email address" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <hr>
            <a class="alter-text" href="/virtual_college_administrator/login.php">Already registered?</a>
            <p class="text-muted">&copy; 2020</p>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>