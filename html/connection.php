<?php
require('../config/connexionBDD.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/insc.css">
  <title>connexion</title>
</head>
<body >

  
  <section class="signup">

    <div class="insc-gauche">
      <h1><span>C</span>onnexion</h1>
      <img class="image2" src="../image/a3944438b6c9e773cab79eca7a02effd.png" alt="">
    </div>

    <div class="insc-droite">
      <form action="" method="post">
        
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
        <button type="submit" class="btn-signup" value="se connecter" name="connecte">Войти</button>
      <h5 class="signornot">Нет аккаунта?  <a href="index.php"> Зарегистрироваться</a></h5>
      <?php
        if(isset($_POST["connecte"])){
            $mail = $_POST["mail"];
            $mdp = $_POST["mdp"];

            try {
                // Ищем пользователя по email
                $req = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
                $req->execute([':mail' => $mail]);
                $user = $req->fetch();

                // Если пользователь найден и пароль верен
                if ($user && password_verify($mdp, $user['mdp'])) {
                    // Успешный вход
                    session_start();
                    $_SESSION['user_id'] = $user['id']; // если есть поле id
                    $_SESSION['user_nom'] = $user['nom'];
                    echo '<script>window.location.href="products.php"</script>';
                    exit;
                } else {
                    echo "<p style='color:red; text-align:center;'>❌ Email ou mot de passe incorrect.</p>";
                }
            } catch(PDOException $e) {
                echo "<p style='color:red; text-align:center;'>❌ Erreur : " . $e->getMessage() . "</p>";
            }
        }
      ?>
      </form>
    </div>
  </section>

</body>
</html>


