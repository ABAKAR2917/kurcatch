<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <title>Document</title>
</head>
<body>
  <section class="global">
    <div class="btnHorizontal">
      <button class="bouton" id="modifier">Изменить</button>
      <button class="bouton" id="ajouter">Добавить</button>
      <button class="bouton" id="supprimer">Удалить</button>
    </div>

    <div class="transparent">
      <div class="scroller">
        <div id="element1">
          <h3>Изменить товар</h3>
          <form action="">
            <div class="formItem">
              <label for="nom">Id Товара</label>
              <br>
              <input type="text" placeholder="Id Товара">
            </div>
            <div class="formItem">
              <label for="nom">имя товара</label>
              <br>
              <input type="text" placeholder="Новое имя товара">
            </div>
            <div class="formItem">
              <label for="nom">details товара</label>
              <br>
              <input type="text" placeholder="детали">
            </div>
            <div class="formItem">
              <label for="nom">цена товара</label>
              <br>
              <input type="text" placeholder="Новая цена">
            </div>
            <button class="modifier"></button>
          </form>
        </div>
        
        <div id="element2">
          <h3>Добавить товар</h3>
          <form action="">
            <div class="formItem">
              <label for="nom">имя товара</label>
              <br>
              <input type="text" placeholder="имя товара">
            </div>
            <div class="formItem">
              <label for="nom">details товара</label>
              <br>
              <input type="text" placeholder="детали">
            </div>
            <div class="formItem">
              <label for="nom">цена товара</label>
              <br>
              <input type="text" placeholder="Новая цена">
            </div>
            <input class="bouton" type="submit" value="modifier le produit" name="ajouter">
            <?php
              if(isset($_POST["ajouter"])){
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

        <div id="element3">
          <h3>Удалить товар</h3>
          <form action="">
            <div class="formItem">
              <label for="nom">Id Товара</label>
              <br>
              <input type="text" placeholder="Id Товара">
            </div>
            <button class="modifier"></button>
          </form>
        </div>

      </div>
    </div>
  </section>

  <script>
      // Récupération des boutons et des trois éléments
    const btnModifier = document.getElementById('modifier');
    const btnAjouter = document.getElementById('ajouter');
    const btnSupprimer = document.getElementById('supprimer');
    const element1 = document.getElementById('element1');
    const element2 = document.getElementById('element2');
    const element3 = document.getElementById('element3');

    // Fonction pour cacher tous les formulaires
    function cacherTous() {
      element1.style.display = 'none';
      element2.style.display = 'none';
      element3.style.display = 'none';
    }

    // Afficher seulement celui qu'on veut
    btnModifier.addEventListener('click', () => {
      cacherTous();
      element1.style.display = 'block';
    });
    btnAjouter.addEventListener('click', () => {
      cacherTous();
      element2.style.display = 'block';
    });
    btnSupprimer.addEventListener('click', () => {
      cacherTous();
      element3.style.display = 'block';
    });

    // Au départ : on affiche le premier formulaire
    cacherTous();
    element1.style.display = 'block';
  </script>
</body>
</html>