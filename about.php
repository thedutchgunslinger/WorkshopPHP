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
                    <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <?php
                    //als de gebruiker is ingelogt laten we de link naar de dashboard zien
                    if (isset($_SESSION["loginstate"]) && $_SESSION["loginstate"] == true) {
                        echo '<li><a href="dashboard.php" class="nav-link px-2 text-white">Dashboard</a></li>';
                    }
                    ?>
                    <li><a href="about.php" class="nav-link px-2 text-secondary">About</a></li>
                </ul>

                <?php
                //als de gebruiker is ingelogt willen we ook de logout knop laten zien
                if (isset($_SESSION["loginstate"]) && $_SESSION["loginstate"] == true) {
                    echo '<div class="text-end">
                    <a  href="logout.php" class="btn btn-warning">Logout</a>
                </div>';
                }
                ?>

            </div>
        </div>
    </header>
    <div class="card mx-auto m-4" style="width:800px;">

        <div class="card-body">
            <h1>Over de opdracht</h1>

            <p>Help! de site is kapot. ik kan alleen nog maar de post op de homepagina zien! de rest werkt niet meer.
                Normaal kan ik inloggen. als ik ingelogt heb kan ik op mijn dashboard al mijn eigen post zien. vanaf daar kan ik ze ook bewerken en verwijderen.
                maar dat werkt allemaal niet meer! kan je helpen?
            </p>
            <h2>Aantal op te lossen fouten:</h2>
            <ul>
                <li>De login Werkt niet.</li>
                <li>De posts in het dashboard worden niet ingeladen.</li>
                <li>Er worden geen nieuwe posts toegevoegd.</li>
                <li>De posts in het dashboard worden niet verwijderd.</li>
                <li>De posts in het dashboard kunnen niet bewerkt worden.</li>
            </ul>
            <h2>Accounts</h2>
            <p> Er zijn 2 accounts die je kan gebruiken:</p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Account 1
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><strong>Email: </strong>dev@dev.com</p>
                            <p><strong>Wachtwoord: </strong>dev</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Account 2
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><strong>Email: </strong>test@test.com</p>
                            <p><strong>Wachtwoord: </strong>test</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>