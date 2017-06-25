
<?php 

include '../inc/header.php';
include_once '../inc/data.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Connexion</legend>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Pseudo</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="Pseudo" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Mot de passe</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="password" placeholder="Mot de passe" class="form-control"  type="password">
    </div>
  </div>
</div>
<!-- Text finish --!>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary" >Connexion <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <p>Pas encore inscrit ? <a href="register.php">Inscrivez vous ici !</a></p>
  </div>
</div>


</fieldset>
</form>
</div>
    </div>
<!-- /.container -->

</body>
</html>
<?php
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
  
  include_once('../inc/data.php');
  
  $req = $pdo->prepare('SELECT * FROM Users WHERE username = ?');
  $req->execute([$_POST['username']]);
  $user = $req->fetch();
  
  if($user){
  
    if(password_verify($_POST['password'], $user->password)){
      $_SESSION['auth'] = $user;
      session_regenerate_id();
      header('Location: account.php');
      exit();
    }
    else{ $_SESSION = "Ces identifiants ne correspondent à aucun compte ";}
  }
}

?>     
<?php include '../inc/footer.php' ?>