<?php 
include 'fonction.php';
start();
include 'data.php';

$session = $_SESSSION['auth'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <Meta name="Description" content="Hytoria Team de développeurs, et de builders compétents et passionés">
    <meta name="author" content="Sywoo">

    <title>Hytoria&trade;</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/round-about.css" rel="stylesheet">


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
     
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Hytoria</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Hytoria&trade;</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Qui sommes nous ?</a>
                    </li>

                    <li>
                        <a href="../services/">Nos services</a>
                    </li>

                    <li>
                        <a href="../teammate/">Notre équipe</a>
                    </li>
                    <li>
                        <a href="#">Nous contacter</a>
                    </li>
<?php if(isset($session)){ ?>
                    <li>
                        <a href="#">Mon Compte</a>
                    </li>
 <?php } ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
           <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </nav>
</body>
</html>