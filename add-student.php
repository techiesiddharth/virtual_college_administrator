<?php
$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Add Student</title>
</head>

<?php
if ($_POST) {
    if ($_POST['rollno'] == "") {
        echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
              Some field(s) are missing
              </div>';
    } 
    else {

        $query = "SELECT * FROM students WHERE `roll_no` = '" . $_POST["rollno"] . "'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if ($row) {
            echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
        Student with same roll number exists in database
        </div>';
        } else {
            echo '<div style="margin:0 40%;" class=" alert alert-success" role="alert">
        Student successfully added in the database 
        </div>';
        $sql = "INSERT INTO students (roll_no, email, password, name, address, att1, att2, att3, att4, att5, att6, branch, year, fee_status, accountExist)
        VALUES ('". $_POST['rollno'] ."','". $_POST['email'] ."','". $_POST['password'] ."','". $_POST['name'] ."','". $_POST['address'] ."','". $_POST['att1'] ."','". $_POST['att2'] ."','". $_POST['att3'] ."','". $_POST['att4'] ."','". $_POST['att5'] ."','". $_POST['att6'] ."','". $_POST['branch'] ."','". $_POST['year'] ."','". $_POST['feeStatus'] ."',0)";

      if ($link->query($sql) === TRUE) {
     echo "New record created successfully";
     } else {
     echo "Error: " . $sql . "<br>" . $link->error;
        }
        }
    }

    // header("Location: /virtual_college_administrator/admin-students.php");
}
?>

<body style="text-align: center;">
    
    <div style="margin-top: 15px;" class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Add Student</h1>
        </div>
        <div class="col-md-2">
            <button onclick="admindash()" id="back" class="btn btn-success">Back</button>
        </div>
    </div>
    <hr>
        <form method="POST">
            <div class="form-group row">
                <label for="rollno" class="col-sm-2 col-form-label">Roll No</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="rollno">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 1 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att1">
                </div>
            </div>
            <div class=" form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Subject 2 Attendance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="att2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Subject 3 Attendance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="att3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Subject 4 Attendance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="att4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Subject 5 Attendance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="att5">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Attendance" class="col-sm-2 col-form-label">Subject 6 Attendance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="att6">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Branch</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="branch">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Fee Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="feeStatus">
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
    <script>
        function admindash() {
            window.location.replace("http://localhost/virtual_college_administrator/admin-students.php");
        }
    </script>
</body>

</html>