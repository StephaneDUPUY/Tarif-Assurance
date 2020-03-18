<?php

    require "functions.php";

	if (isset($_POST['age'])) {

        $level = calculateLevel($_POST['age'], $_POST['permis'], $_POST['accidents'], $_POST['anciennete']);
        $theLevel = $level['name'];
		$theClass = $level['class'];
	}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Assurance</title>

        <!-- Roboto 400 and 900 -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
        <link rel="stylesheet" href="style.css"> 
    </head>

    <body>

            <div class="container">

                <div class="formulaire">

                    <h1>Assurance</h1>
                    <h2>Calcul du tarif de votre client</h2>

                    <?php if (isset($theLevel)): ?>
                        <p>Vous avez droit au tarif <span class="<?=$theClass?>"><?=$theLevel?></span></p>
                    <?php endif; ?>

                    <form action="index.php" method="post">
                        <div class="label">Âge</div>
                        <div class="input"><input type="number" name="age" min="16" placeholder="" required></div>
                        <div class="label">Années de permis</div>
                        <div class="input"><input type="number" name="permis" min="0" placeholder="" required></div>
                        <div class="label">Nombre d'accidents responsables</div>
                        <div class="input"><input type="number" name="accidents" min="0" placeholder="" required></div>
                        <div class="label">Années chez son assureur</div>
                        <div class="input"><input type="number" name="anciennete" min="0" placeholder="" required></div>
                        <button>Calculer le tarif</button>
                    </form>

                    <?php
                        $priceExample = calculateLevel(28, 3, 2, 6);
                        $nameExample = $priceExample['name'];
                        $classExample = $priceExample['class'];
				    ?>
				    <p>
                        Par exemple, un conducteur ayant :
                        <ul>
                            <li>28 ans</li>
                            <li>3 ans de permis</li>
                            <li>2 accidents responsables</li>
                            <li>6 ans d'ancienneté chez nous</li>
                        </ul>
					    bénéficiera du tarif <span class="<?=$classExample?>"><?=$nameExample?></span>
				    </p>

                </div>

                <div>
                    <img src="voitures.jpg" alt="accident de voitures miniatures">
                </div>

            </div>
    </body>

</html>