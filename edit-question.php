<?php
$link = mysqli_connect("localhost", "root", "", "admin");

if (mysqli_connect_error()) {
    die("Database connection error");
}

$id = $_GET['qid'];

$query = "SELECT * FROM questions WHERE qid = " . $id;
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
if ($_POST) {

    $query1 = "DELETE FROM `questions` WHERE qid = ".$id;
    $result = mysqli_query($link,$query1);

    $query = "INSERT INTO `questions` (`keyword1`,`keyword2`,`keyword3`,`keyword4`,`answer`) VALUES 
    ('" . mysqli_real_escape_string($link, $_POST['key1']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key2']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key3']) . "',
    '" . mysqli_real_escape_string($link, $_POST['key4']) . "',
    '" . mysqli_real_escape_string($link, $_POST['ans']) . "')";
    if(mysqli_query($link,$query)){
        header("Location: /virtual_college_administrator/admin-questions.php");
    }
}
?>

<body style="text-align: center;">
    <h1>Edit Questions</h1>
    <hr>
    <div style="margin-top: 15px;" class="container">
        <form method="POST">
            <div class="form-group row">
                <label for="rollno" class="col-sm-2 col-form-label">Keyword 1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key1" value="<?php echo $row['keyword1'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Keyword 2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key2" value="<?php echo $row['keyword2'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Keyword 3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key3" value="<?php echo $row['keyword3'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Keyword 4</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="key4" value="<?php echo $row['keyword4'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Answer</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ans" value="<?php echo $row['answer'] ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save</button>

        </form>
    </div>

</body>

</html>