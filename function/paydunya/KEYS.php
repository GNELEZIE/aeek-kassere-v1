<?php
Paydunya_Setup::setMasterKey("SBo7ykQH-ZhK5-gGXG-6LDU-j3oSE7uqOB7X");
Paydunya_Setup::setPublicKey("test_public_Rr5Rljg4PcDZOjNrPFMGOGMLIYa");
Paydunya_Setup::setPrivateKey("test_private_942cqfziSUfRddpOu282t9VkINo");
Paydunya_Setup::setToken("2kUzj4hmA1GG8wP6W7dk");
Paydunya_Setup::setMode("test"); // Optionnel en mode test. Utilisez cette option pour les paiements tests.


// Mode : "test" ou "live"
Paydunya_Setup::setMode("test");

// Nom du compte marchand PayDunya (ex: "tera_vision")


// === INFORMATION DU MAGASIN ===
Paydunya_Checkout_Store::setName("AEEK 2025"); // Requis
Paydunya_Checkout_Store::setTagline("Sortie détente AEEK 2025");
Paydunya_Checkout_Store::setPhoneNumber("336530583");
Paydunya_Checkout_Store::setPostalAddress("Plage de gran Bassam");
Paydunya_Checkout_Store::setWebsiteUrl("https://aeek-kassere.com");
Paydunya_Checkout_Store::setLogoUrl("https://aeek-kassere.com/assets/media/logoAEEK.png");

// URLS de retour
Paydunya_Checkout_Store::setCancelUrl("https://aeek-kassere.com/sortie-detente-annule");
Paydunya_Checkout_Store::setReturnUrl("https://aeek-kassere.com/sortie-detente-success");

// === CRÉATION DE LA FACTURE ===
$co = new Paydunya_Checkout_Invoice();