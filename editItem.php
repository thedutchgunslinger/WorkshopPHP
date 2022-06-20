<!DOCTYPE html>
<html>

<head>
    <title>Blogger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<body>
    <header class="p-3 bg-dark text-white sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <strong>Blogger</strong>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="dashboard.php" class="nav-link px-2 text-secondary">Dashboard</a></li>
                    <li><a href="about.php" class="nav-link px-2 text-white">About</a></li>
                </ul>



                <div class="text-end">
                    <a href="logout.php" class="btn btn-warning">Logout</a>
                </div>


            </div>
        </div>
    </header>

    <?php
    session_start();
    if ($_SESSION["loginstate"] == true) {
        include('db.php');

        $id = $_GET["id"];
        $userId = $_SESSION['logId'];
        // haal de gegevens op uit de database waar het id overeenkomt van de post en laad die in de form
  

                echo '

<form  action="#" method="POST">
            <div class="card mx-auto m-4" style="width:800px;">

                <div class="card-body">
                  <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="' . $row["title"] . '">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="bericht">' . $row["bericht"] . '</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
    </form>';
            
        
    } else {
        header("location: index.php");
    }


    // UPDATE DE GEGEVENS IN DE DATABASE
    if (
        $_SERVER['REQUEST_METHOD'] == "POST"
        && isset($_POST["title"]) && $_POST["title"] != ""
        && isset($_POST["bericht"]) && $_POST["bericht"] != ""
    ) {
        $title = $_POST['title'];
        $bericht = $_POST['bericht'];



    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>