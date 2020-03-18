<?php

	if (isset($_POST['age'])) {
		/*
			
			Une ancienneté de plus de 5 ans augmente le palier d'un niveau, si le conducteur n'est pas déjà refusé
        */

        // default level
        $level = 1;

        // level decreased by accident
		$level -= $_POST['accidents']; 

        // licence driver more than 2 year increase level
		if ($_POST['permis'] > 2) {
			$level++;
		}

        // age more than 25 years old increase level
		if ($_POST['age'] > 25) {
			$level++;
		}

        // level positive and insured more than 5 years increase level
		if ($level > 0 && $_POST['anciennete'] > 5) {
			$level++;
		}

		// first solution to manage negative level
		if ($level < 0) {
			$level = 0;
		}

		if ($level > 4) {
			$level = 4;
		}

		// second solution to manage negative level

		$level = max(0, $level);

		$level = min(4, $level);

		// labels for level
		$colorLevel = [
			["color" => "Refus d'assurer", "class" => "grey"],
			["color" => "Rouge", "class" => "red"],
			["color" => "Orange", "class" => "orange"],
			["color" => "Vert", "class" => "green"],
			["color" => "Bleu", "class" => "blue"]
		];

		// find the good one
        $theLevel = $colorLevel[$level]['color'];
        $class = $colorLevel[$level]['class'];

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
                        <p>Vous avez droit au tarif <span class="<?=$class?>"><?=$theLevel?></span></p>
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

                </div>

                <div>
                    <img src="voitures.jpg" alt="accident de voitures miniatures">
                </div>

            </div>
    </body>

</html>