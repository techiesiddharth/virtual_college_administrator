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
    <title>Add Question</title>
</head>

<?php
if ($_POST) {

    if ($_POST['ans'] == "") {
        echo '<div style="margin:0 40%;" class=" alert alert-danger" role="alert">
              Answer field can not be empty 
              </div>';
    } else {

        $query = "INSERT INTO `questions` (`keyword1`,`keyword2`,`keyword3`,`keyword4`,`answer`) VALUES 
    ('" . mysqli_real_escape_string($link, $_POST['key1']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key2']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key3']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key4']) . "',
    '" . mysqli_real_escape_string($link, $_POST['ans']) . "')";
        if (!mysqli_query($link, $query)) {
            $error = "<p>Couldn't sign you up. Please try again later</p>";
        } else {
            echo '<div style="margin:0 40%;" class=" alert alert-success" role="alert">
              Question successfully added 
              </div>';
            // header("Location: /virtual_college_administrator/admin-questions.php");
        }
    }
}
?>

<body style="text-align: center;">
    <h1>Add Questions</h1>
    <hr>
    <div style="margin-top: 15px;" class="container">
        <form method="POST">
            <div class="form-group row">
                <label for="rollno" class="col-sm-2 col-form-label">Keyword 1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key1">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Keyword 2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key2">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Keyword 3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key3">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Keyword 4</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key4">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ans">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Add</button>
        </form>
        <br>
        <button onclick="back()" class="btn btn-primary">Back</button>
    </div>

</body>
<script>
      function back()
      {
        window.location.replace("http://localhost/virtual_college_administrator/admin-questions.php");
      }
</script>
</html>