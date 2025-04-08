<?php
//$dateGmt = gmdate('Y-m-d H:i');
//$date1 = str_replace('-', '/', $dateGmt);
//$tomorrow = date('m-d-Y',strtotime($date1 . "+26 days"));
//
//echo $tomorrow;

//
//require_once 'function/paydunya/paydunya/setup.php';
//require_once 'function/paydunya/paydunya/checkout/checkout_invoice.php';
//require 'function/paydunya/paydunya.php';
//Paydunya_Setup::setMode(["test"|"live"]);

Paydunya_Setup::setMasterKey("**************************");
Paydunya_Setup::setPublicKey("**************************");
Paydunya_Setup::setPrivateKey("**************************");
Paydunya_Setup::setMode(["test"]);
Paydunya_Setup::setToken("**************************");

Paydunya_Checkout_Store::setName("Magasin Chez Sandra"); // Seul le nom est requis
Paydunya_Checkout_Store::setTagline("L'élégance n'a pas de prix");
Paydunya_Checkout_Store::setPhoneNumber("336530583");
Paydunya_Checkout_Store::setPostalAddress("Dakar Plateau - Etablissement kheweul");
Paydunya_Checkout_Store::setWebsiteUrl("http://www.chez-sandra.sn");
Paydunya_Checkout_Store::setLogoUrl("http://www.chez-sandra.sn/logo.png");
// Configuration globale de l'URL de redirection après annulation de paiement.
Paydunya_Checkout_Store::setCancelUrl("http://www.chez-sandra.sn/logo.png");

// Configuration globale de l'URL de redirection après confirmation de paiement.
Paydunya_Checkout_Store::setReturnUrl("");

$co = new Paydunya_Checkout_Invoice();
$co->setTotalAmount(100);
$co->setDescription("Description Optionnelle");
$co->addCustomData("Prénom", "Badara");
$co->addCustomData("Nom", "Alioune");
$co->addCustomData("CartId", '45555');
$co->addCustomData("Coupon","NOEL");

// Le code suivant décrit comment créer une facture de paiement au niveau de nos serveurs,
// rediriger ensuite le client vers la page de paiement
// et afficher ensuite son reçu de paiement en cas de succès.
if($co->create()) {
    header("Location: ".$co->getInvoiceUrl());
}else{
    echo $co->response_text;
}


echo "✅ SDK PayDunya chargé manuellement";
