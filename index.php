<!DOCTYPE html>
<html>

<head>
    <title>Blogger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<body>
    
    <?php
    //Voeg de database connectie in
    include('db.php');
    //hier starten we een sessie om je login status te onthouden
    session_start();
    ?>
    <header class="p-3 bg-dark text-white sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <strong>Blogger</strong>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                    <?php
                    //als de gebruiker is ingelogt laten we de link naar de dashboard zien
                    if (isset($_SESSION["loginstate"]) && $_SESSION["loginstate"] == true) {
                        echo '<li><a href="dashboard.php" class="nav-link px-2 text-white">Dashboard</a></li>';
                    }
                    ?>
                    <li><a href="about.php" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <?php
                //als de gebruiker is ingelogt willen we ook de logout knop laten zien
                if (isset($_SESSION["loginstate"]) && $_SESSION["loginstate"] == true) {
                    echo '<div class="text-end">
                    <a  href="logout.php" class="btn btn-warning">Logout</a>
                </div>';
                } else {
                    //als er niemand is ingelogt willen we de login form laten zien
                    echo '
                    <form class="row row-cols-lg-auto mb-3 mb-lg-0 me-lg-3" action="#" method="POST">
                        <div class="col-12">
                            <input type="email" id="email" aria-describedby="emailHelp" name="email" placeholder="Example@mail.com" class="form-control form-control-dark">
                        </div>
                        <div class="col-12">
                            <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Password" class="form-control form-control-dark">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning">Login</button>
                        </div>
                    </form>';
                }
                ?>

            </div>
        </div>
    </header>


    <?php

              


    //als we een post request ontvangen waar email en wachtwoord niet leeg is gaan we kijken of de gegevens in onze database staan.
    if (
        $_SERVER['REQUEST_METHOD'] == "POST"
        && isset($_POST["email"]) && $_POST["email"] != ""
        && isset($_POST["wachtwoord"]) && $_POST["wachtwoord"] != ""
    ) {
        //hier zetten we de POST data in een variabelle
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        //voordat we het wachtwoord in de database zetten zorgen we er voor dat we het wachtwoord is gehashed is
        $wachtwoordhash = hash('sha256', $wachtwoord);

        // maak een connectie met de database
        startConnection();

        //dit is een select query, we kijken of we iemand in de database hebben waar het wachtwoord en email het zelfde is als de ingevullde waardes
        $query = "SELECT * FROM gebruiker WHERE email = '$email' AND wachtwoord = '$wachtwoordhash'";


        //voer de query uit
        $result = executeQuery($query);
        //als we we een match vinden zetten we de gevens in sessie variabele zodat we ze later kunnen gebruiken
        while ($record = $result->fetch(PDO::FETCH_ASSOC))
        {


            $_SESSION["logId"] = $record['id'];
            $_SESSION["logVoornaam"] = $record['voornaam'];
            $_SESSION["logAchternaam"] = $record['achternaam'];
            $_SESSION["logEmail"] = $record['email'];

            //ook zetten we loginstate op true zodat we paginas kunnen beschermen van mensen die geen account hebben
            $_SESSION["loginstate"] = true;
            //vervolgens sturen we de gebruiker naar het dashboard
            header("location: dashboard.php");
        } 
    }

    startConnection();
    //in deze query willen we gegevens uit 2 tabellen ophalen, hiervoor moeten we ze aan elkaar koppelen, dit doen we op de primarey key aan de foreign key (de blauwe lijn in de database.pdf)
    //ook moeten we nu voor iedere waarden aangeven uit welke tabel de waarde komt
    $querySelectAll = "SELECT bericht.*, gebruiker.voornaam FROM bericht  JOIN gebruiker ON bericht.userId = gebruiker.id ORDER BY id DESC";
    $resultPosts = executeQuery($querySelectAll);   

   while ($row = $resultPosts->fetch(PDO::FETCH_ASSOC))
{
            echo '
            <div class="card mx-auto m-4" style="width:800px;">

                <div class="card-body"> 
                    <h5 class="card-title"><strong> ' . $row["title"] . '</strong></h5>
                    <p class="card-text"> ' . $row["bericht"] . '</p>
                </div>
                <div class="card-footer text-muted">
    By  ' . $row["voornaam"] . '
  </div>
            </div>';
        }
    
    //sluit connectie
    $db = null;

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>