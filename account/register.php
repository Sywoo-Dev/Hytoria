
<?php 

include '../inc/header.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class="container">

    <form class="well form-horizontal" action=" " method="post">
<fieldset>

<!-- Form Name -->
<legend>Inscription</legend>





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
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail" class="form-control"  type="email">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Mot de passe</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input  name="password" placeholder="Mot de passe" class="form-control"  type="password">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Confirmer le Mot de passe</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input  name="password_confirmation" placeholder="Confirmation du mot de passe" class="form-control"  type="password">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary" >Inscription <span class=" glyphicon glyphicon-ok"></span></button>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <p>Vous possédez déjà un compte ? <a href="index.php">Connectez vous ici !</a></p>
  </div>
</div>


</fieldset>
</form>
</div>
    </div><!-- /.container -->
</body>
</html>
<?php 

if(!empty($_POST)){
  
  $errors = array();
    
  //vérification du pseudo//
  
  if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
    $errors['username'] = "username invalide ! (Caractere speciaux)";
  } else{
    $req = $pdo->prepare('SELECT id FROM Users WHERE username = ?');
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if($user){
      $errors['username'] = 'Ce nom est déjà enregistré';
    }
  }
  
  //vérification du mail//
  
  if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Votre E-mail est invalide!";
  } else{
    $req = $pdo->prepare('SELECT id FROM Users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
      $errors['email'] = 'Ce mail est déjà utilisé';
    }
  } 

    //correspondance des 2 mot de passe //
  
  if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirmation']){
    $errors['password'] = "Les deux mots de passe ne correspondent pas!";
  }
  
  //enregistrement de l'utilistaeur si condition "ok"//
  
  if(empty($errors)){
    $req = $pdo->prepare("INSERT INTO Users SET username = ?, password = ?, email = ?");
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
     $req->execute([$_POST['username'], $password, $_POST['email']]);
      header('Location: account.php');
    exit();

  } 
}
include "../inc/footer.php";

?>












