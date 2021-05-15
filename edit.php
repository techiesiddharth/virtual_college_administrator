<?php
$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}

$id = $_GET['sid'];

$query = "SELECT * FROM students WHERE sid = " . $id;
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Edit</title>
</head>

<?php
// if($_POST){
//     header("Location: /virtual_college_administrator/admin-students.php");
// }
?>
<?php

if ($_POST) {
   
        if ($row) {
            echo '<div style="margin:0 40%;" class=" alert alert-success" role="alert">
        Student successfully added in the database 
        </div>';
        $sql = "UPDATE students 
        SET roll_no='". $_POST['rollno'] ."',name='". $_POST['name'] ."',address='". $_POST['address'] ."',att1='". $_POST['att1'] ."',att2='". $_POST['att2'] ."',att3='". $_POST['att3'] ."',att4='". $_POST['att4'] ."',att5='". $_POST['att5'] ."',att6='". $_POST['att6'] ."',branch='". $_POST['branch'] ."',year='". $_POST['year'] ."',fee_status='". $_POST['feeStatus'] ."'
        WHERE sid=" . $id;
          
      if ($link->query($sql) === TRUE) {
     echo "New record updated successfully";
     } else {
     echo "Error: " . $sql . "<br>" . $link->error;
        }
        }
    // header("Location: /virtual_college_administrator/admin-students.php");
}

?>

<body style="text-align: center;">
    <h1>Edit Student</h1>
    <hr> 
    <div style="margin-top: 15px;" class="container">
        <form method="POST">
            <div class="form-group row">
                <label for="rollno" class="col-sm-2 col-form-label">Roll No</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="rollno" value="<?php echo $row['roll_no'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 1 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att1" value="<?php echo $row['att1'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 2 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att2" value="<?php echo $row['att2'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 3 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att3" value="<?php echo $row['att3'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 4 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att4" value="<?php echo $row['att4'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject 5 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att5" value="<?php echo $row['att5'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Attendance" class="col-sm-2 col-form-label">Subject 6 Attendance</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="att6" value="<?php echo $row['att6'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="branch" value="<?php echo $row['branch'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="year" value="<?php echo $row['year'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Fee Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="feeStatus" value="<?php echo $row['fee_status'] ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>

        </form>
    </div>

</body>

</html>