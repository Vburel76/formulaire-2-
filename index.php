<?php
require_once 'controller/form-controller.php';

$arrayFormula = [
    1 => 'Etudiant',
    2 => 'Normal',
    3 => 'Premium'
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form GET</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>



    <?php if ($showForm) { ?>

        <h1 class="m-5 text-center">Formulaire de contact</h1>

        <!-- utilisation de la balise form : action la page de redirection et method la méthode à employer -->
        <form action="" method="POST">

            <div class="row justify-content-center">
                <div class="col-3 border border-secondary rounded shadow p-4">

                    <div class="my-2">
                        <label for="lastname">Nom</label><span class="ms-2 text-danger"><?= isset($error['lastname']) ? $error['lastname'] : '' ?></span>
                        <br>
                        <input type="text" id="lastname" name="lastname" placeholder="ex. DURANT" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                    </div>

                    <div class="my-2">
                        <label for="firstname">Prénom</label><span class="ms-2 text-danger"><?= isset($error['firstname']) ? $error['firstname'] : '' ?></span>
                        <br>
                        <input type="text" id="firstname" name="firstname" placeholder="ex. Jean" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                    </div>

                    <div class="my-2">
                        <label for="mail">Courriel</label><span class="ms-2 text-danger"><?= isset($error['mail']) ? $error['mail'] : '' ?></span>
                        <br>
                        <input type="mail" id="mail" name="mail" placeholder="ex. jean.durant@mail.fr">
                    </div>

                    <div class="my-2">
                        <label for="password">Mot de passe</label><span class="ms-2 text-danger"><?= isset($error['password']) ? $error['password'] : '' ?></span>
                        <br>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="my-2">
                        <label for="confirmPassword">Confirmation du mot de passe</label><span class="ms-2 text-danger"><?= isset($error['confirmPassword']) ? $error['confirmPassword'] : '' ?></span>
                        <br>
                        <input type="password" id="confirmPassword" name="confirmPassword">
                    </div>

                    <div class="my-2">
                        <label for="formula">Abonnement</label><span class="ms-2 text-danger"><?= isset($error['formula']) ? $error['formula'] : '' ?></span>
                        <br>
                        <select name="formula" id="formula">
                            <option selected disabled>Veuillez sélectionner une formule</option>
                            <option value="1" <?= isset($_POST['formula']) && $_POST['formula'] == 1 ? 'selected' : '' ?>>Etudiant</option>
                            <option value="2" <?= isset($_POST['formula']) && $_POST['formula'] == 2 ? 'selected' : '' ?>>Normal</option>
                            <option value="3" <?= isset($_POST['formula']) && $_POST['formula'] == 3 ? 'selected' : '' ?>>Premium</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <input type="checkbox" id="cgu" name="cgu">
                        <label for="cgu">J'ai lu et j'accepte les CGU</label><span class="ms-2 text-danger"><?= isset($error['cgu']) ? $error['cgu'] : '' ?></span>
                    </div>

                    <button class="btn btn-dark my-3">Valider</button>

                </div>
            </div>

        </form>

    <?php } else { ?>

        <h1 class="text-center">resultat</h1>

        <div class="row justify-content-center">


            <div class="card m-5 border border-dark " style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= safeInput($_POST['lastname']) . ' ' . safeInput($_POST['firstname']) ?></h5>
                    <p class="card-text"><?= safeInput($_POST['mail'] )?></p>
                    <p class="card-text"><?= safeInput($arrayFormula[$_POST['formula']]) ?></p>
                </div>
            </div>



        </div>





    <?php } ?>

</body>

</html>