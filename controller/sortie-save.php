<?php

if(isset($_POST['nom']) and  isset($_POST['phone']) and isset($_POST['formkey']) and $_SESSION['myformkey'] == $_POST['formkey']){

    extract($_POST);

    $nom = htmlentities(trim(addslashes($nom)));
    $aeek = htmlentities(trim(addslashes($aeek)));
    $phone = htmlentities(trim(addslashes($phone)));
    $dateGmts = gmdate('Y-m-d H:i');
    $aeek = 'oui';
    $an = '2025';
    $propriete = 'phone';
    $verif = $sortie->verifInscrit($propriete,$phone);

    if($dataS = $verif->fetch()){
        $errors['register'] = 'Impossible de s\'inscrire, ce numéro a été déjà inscrit !';
    }else{
        $save = $sortie->addSortie25($dateGmts,$nom,$phone,$aeek,$an);

        if($save > 0){

            $tab = array(
                "id_user" => $save,
            );
            $_SESSION['_valid'] = $tab;

            Paydunya_Setup::setMasterKey("SBo7ykQH-ZhK5-gGXG-6LDU-j3oSE7uqOB7X");
            Paydunya_Setup::setPublicKey("live_public_sElHU9RasWcJOdWWedBs1ql2nqt");
            Paydunya_Setup::setPrivateKey("live_private_rwQxOGyD3icDqYkkFWVJZ3KOllF");
            Paydunya_Setup::setToken("Jh5EI0oEuGkxitgLRyjK");
            Paydunya_Setup::setMode("live"); // Optionnel en mode test. Utilisez cette option pour les paiements tests.


// Mode : "test" ou "live"
//            Paydunya_Setup::setMode("test");

// Nom du compte marchand PayDunya (ex: "tera_vision")


// === INFORMATION DU MAGASIN ===
            Paydunya_Checkout_Store::setName("AEEK 2025"); // Requis
            Paydunya_Checkout_Store::setTagline("Sortie détente AEEK 2025");
            Paydunya_Checkout_Store::setPhoneNumber("07 07 22 92 71");
            Paydunya_Checkout_Store::setPostalAddress("Plage de grand Bassam");
            Paydunya_Checkout_Store::setWebsiteUrl("https://aeek-kassere.com");
            Paydunya_Checkout_Store::setLogoUrl("https://aeek-kassere.com/assets/media/logoAEEK.png");

// URLS de retour
            Paydunya_Checkout_Store::setCancelUrl("https://aeek-kassere.com/sortie-detente-annule");
            Paydunya_Checkout_Store::setReturnUrl("https://aeek-kassere.com/sortie-detente-success");

// === CRÉATION DE LA FACTURE ===
            $co = new Paydunya_Checkout_Invoice();
// Montant total (en FCFA)
            $co->setTotalAmount(2550);
            $co->setDescription("La participation à la sortie détente est de 2500 F");

// Champs personnalisés
            $co->addCustomData("Nom & Prénom", $nom);
            $co->addCustomData("Téléphone", $phone);
//            $co->addCustomData("CartId", '45555');
//            $co->addCustomData("Coupon", "NOEL");

// CRÉATION DE LA FACTURE & REDIRECTION
            if($co->create()) {
                // Redirige vers la page de paiement PayDunya

                $save = $sortie->updateSortieById($co->$transaction_id,$save);
                header("Location: " . $co->getInvoiceUrl());
                exit;
            } else {
                // Affiche une erreur si échec
                echo "Erreur lors de la création de la facture : " . $co->response_text;
            }
        }else{
            $errors['register'] = 'Action Impossible une erreur s\'est produite !';
        }
    }



}