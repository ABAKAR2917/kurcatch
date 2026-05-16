<?php

  require ('../config/connexionBDD.php')

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insc.css">
  <title>Document</title>
</head>
<body >

  
  <section class="signup">

    <div class="left">
      <h1><span>Р</span>егистрация</h1>
      <img class="image2" src="../image/a3944438b6c9e773cab79eca7a02effd.png" alt="">
    </div>

    <div class="right">
      <form action="" method="post">
        <div class="formItem">
          <label for="Nom">Имя</label>
          <br>
          <input type="text" placeholder=" Ivan" name="nom" required>
        </div>
        <div class="formItem">
          <label for="Prenom">Фамилия</label>
          <br>
          <input type="text" placeholder=" Ivanovic" name="prenom" required>
        </div>
        <div class="formItem">
          <label for="Numero">номер телефона</label>
          <br>
          <input type="text" placeholder=" 8(999)-999-99-99" name="num" required>
        </div>
        <div class="formItem">
          <label for="Mail">Электронная почта</label>
          <br>
          <input type="text" placeholder=" ex: jean@exemple.com" name="mail" required>
        </div>
        <div class="formItem">
          <label for="Password">Пароль</label>
          <br>
          <input type="password" placeholder=" ••••••••" name="mdp" required>
        </div>
        <div class="formItem">
          <label for="Password">Подтверждение пароля</label>
          <br>
          <input type="password" placeholder=" ••••••••" name="cmdp" required>
        </div class="formItem">
        <button type="submit" class="btn-signup" name="inscrire">Зарегистрироваться</button>
      <h5 class="signornot">есть аккаунт?  <a href="connection.php"> Войти?</a></h5>
      
      <?php

        if(isset($_POST["inscrire"])){
          $mail = $_POST["mail"];
          $nom = $_POST["nom"];
          $prenom = $_POST["prenom"];
          $num = $_POST["num"];
          $mdp = $_POST["mdp"];
          $cmdp = $_POST["cmdp"];

          if($mdp == $cmdp){
            try{
              $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);
              $req = $pdo->prepare("INSERT INTO utilisateurs(nom, prenom, mail, num, mdp) VALUES(?,?,?,?,?)");
              $req->execute(array($nom, $prenom, $mail, $num, $hashed_mdp));
              echo '<script>window.location.href="products.php"</script>';
            }catch(PDOException $e){
                echo "<p style='color:red; text-align:center;'>❌ Erreur : " . $e->getMessage() . "</p>";
              }
            } else {
              echo "<p style='color:red; text-align:center;'>❌ Les mots de passe ne correspondent pas.</p>";
              }
          }
      ?>
    </form>
    </div>
  </section>

</body>
</html>


