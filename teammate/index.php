<?php 
include '../inc/header.php';
$reponse = $pdo->query('SELECT * FROM staff');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">Notre Team</h1>
            </div>
        <?php while ($donnes = $reponse->fetch()) { ?>   
            <div class="col-lg-4 col-sm-6 text-center">
                <a href=<?php echo $donnes->contact ?> target="_blank"><img class="img-circle img-responsive img-center" src=<?php echo $donnes->linkimg ?> width="200" height="200" alt=""></a>

                <h3><?php echo $donnes->name ?>
                    <small>Job :</small>
                </h3>
                <p><?php echo $donnes->Job ?></p>
            </div>
   
        <?php } ?>    
         </div>

<?php include '../inc/footer.php'; ?>
</body>
</html>