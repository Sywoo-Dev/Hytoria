<?php 

include 'inc/header.php';
$reponse = $pdo->query('SELECT * FROM news ORDER BY `id` DESC');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link href="csstoindex/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="csstoindex/1-col-portfolio.css" rel="stylesheet">

</head>
<body>
 


   <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hytoria&trade;
                    <small>News</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
    <?php while ($donnes = $reponse->fetch()) { ?>   
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src=<?php echo $donnes->imglink ?> alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $donnes->title ?></h3>
                <h4><?php echo $donnes->subtitle ?></h4>
                <p><?php echo $donnes->Preface ?></p>
                <a class="btn btn-primary" href="#">Plus de détails<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div></br>
        <!-- /.row -->
<?php } ?>
         </div>

        <hr>

        </div>

        <!-- /.row -->





    <script src="jstoindex/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="jstoindex/bootstrap.min.js"></script>
</body>
</html> 
<?php include 'inc/footer.php';?>