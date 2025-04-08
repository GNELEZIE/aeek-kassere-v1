<?php
// Chargement manuel du SDK


// === CONFIGURATION DE L'API ===

include_once "function/paydunya/KEYS.php";

// Montant total (en FCFA)
$co->setTotalAmount(200);
$co->setDescription("Paiement pour une commande chez Chez Sandra");

// Champs personnalisés
$co->addCustomData("Prénom", "Badara");
$co->addCustomData("Nom", "Alioune");
$co->addCustomData("CartId", '45555');
$co->addCustomData("Coupon", "NOEL");

// CRÉATION DE LA FACTURE & REDIRECTION
if($co->create()) {
    // Redirige vers la page de paiement PayDunya
    header("Location: " . $co->getInvoiceUrl());
    exit;
} else {
    // Affiche une erreur si échec
    echo "Erreur lors de la création de la facture : " . $co->response_text;
}
?>
