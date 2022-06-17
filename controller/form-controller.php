<?php

$showForm =true;
// Ici le back pour controller les inputs
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $error = [];
    $regexName = "/^[a-zA-Zéèêë]+$/";


    if (isset($_POST['lastname'])) {

        if ($_POST['lastname'] == '') {
            $error['lastname'] = "champ obligatoire";
        } else if (!preg_match($regexName, $_POST['lastname'])) {

            $error['lastname'] = "Format invalide";
        }
    }


    if (isset($_POST['firstname'])) {
        if ($_POST['firstname'] == '') {

            $error['firstname'] = "Champ obligatoire";
        } else if (!preg_match($regexName, $_POST['firstname'])) {

            $error['firstname'] = "Format invalide";
        }

        if (isset($_POST['mail'])) {
            if ($_POST['mail'] == '') {

                $error['mail'] = "Champ obligatoire";
            } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $error['mail'] = "Format mail invalide";
            }
        }

        if (isset($_POST['password'])) {

            if ($_POST['password'] == '') {
                $error['password'] = "champ obligatoire";
            } else if ($_POST['confirmPassword'] == '' &&  $_POST['password'] != '') {
                $error['confirmPassword'] = 'champ obligatoire';
            } else if ($_POST['confirmPassword'] != $_POST['password']) {
                $error['password'] = "mot de passe différent";
            }
        }

        if (!isset($_POST['formula'])) {
            $error['formula'] = " selectionner un Abonnement";
        }

        if (!isset($_POST['cgu'])) {
            $error['cgu'] = "cocher la case";
        }

        if (count($error) == 0) {
            $showForm = false;
        }


    }
}

function safeInput($input){
$safeInput = trim($input);
$safeInput = htmlspecialchars($safeInput);
return $safeInput;
}




