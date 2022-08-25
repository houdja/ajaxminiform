<?php 

    $success = false;
    $msg = 'Une erreur est survenue... scriptPHP';
    $data = [];

    if(isset($_POST['pseudo']) && $_POST['pseudo'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['mdp']) && $_POST['mdp'] != ''){

        //strip_tags = evitez les tag HTML
        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        if(strlen($pseudo) <= 10){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                //inscrire l'utilisateur en db
                $success = true;
                $msg = 'Utilisateur inscrit';
                $data['mdp'] = $mdp;
            }else{
                $msg = 'Votre email est incorrect.';
            }
        }else{
            $msg = 'Votre doit contenir 10 caracteres.';
        }
    } else{
        $msg = 'Veuillez remplir tout les champs...';
    }

    $res = ['success' => $success,'msg' => $msg, 'data' => $data];
    echo json_encode($res);
?>