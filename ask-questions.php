<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Ask Questions</title>

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
    <link href="ask-questions.css" rel="stylesheet">
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
                            <a class="nav-link" href="dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="file"></span>
                                Ask questions <span class="sr-only">(current)</span>
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
                    <h1 class="h2">Ask Questions</h1>
                </div>

                <div id="chats">
                    <p style="padding: 15px; width: 30%; background-color: #cfe3e0; color:black; border-radius:10px;" class="bot-message">Hey there, What do you wanna know today?</p>
                </div>

                <div style="top: 94%;" class="send-question d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3"">
                    <input id="message" placeholder=" Type your question here">
                    <img id="sendButton" src="send.svg">
                </div>

            </main>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script>

    <script>
        $("#sendButton").click(function() {
            // $.ajax({
            //     method: "POST",
            //     url: "send-message.php",
            //     data: {
            //         content: $("#messagge").val()
            //     }
            // })
            var message = $("#message").val();
            document.getElementById("chats").innerHTML += "<p style='left: 70%; width:30%; position:relative; display: block; text-align:right; background-color:#cef4f5; color:black; padding: 15px; border-radius:10px;'>" + message + "<p><br>";
            if(message == "What are the subjects in 4th sem for SE department?"){
                document.getElementById("chats").innerHTML += '<p style= "padding: 15px; width: 30%; background-color: #cfe3e0; color:black; border-radius:10px;">The subjects in 4th sem are: Software Engineering, DBMS,Digital electronics, COA , Discreet Structure and FEC </p>';
            }
            else if(message == "What is my timetable?"){
                document.getElementById("chats").innerHTML += '<p style= "padding: 15px; width: 50%; background-color: #cfe3e0; color:black; border-radius:10px;">Here is your timetable<img src="A2SE.jpg"></p>';
            }
            else if(message == "What is my fee status?"){
                document.getElementById("chats").innerHTML += '<p style= "padding: 15px; width: 30%; background-color: #cfe3e0; color:black; border-radius:10px;">Guest accounts are not allowed to access this data</p>';
            }
            else if(message == "When will results be declared for 4th sem of SE department?"){
                document.getElementById("chats").innerHTML += '<p style= "padding: 15px; width: 30%; background-color: #cfe3e0; color:black; border-radius:10px;">Your result will be declared on 25th of may 2021</p>';
            }
            else{
                document.getElementById("chats").innerHTML += "<p style= 'padding: 15px; width: 30%; background-color: #cfe3e0; color:black; border-radius:10px;'>I am sorry. I couldn't understand your question</p>";
            }
            $("#message").val("");
        });
    </script>

</body>

</html>