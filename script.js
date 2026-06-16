const BoutonPasCompte = document.querySelector('.button-no-compte');
const BoutonDejaCompte = document.querySelector('.button-deja-compte');
const FenConnexion = document.getElementById('connexion');
const FenCreer = document.getElementById('creercompte');

BoutonPasCompte.addEventListener("click", () => {
    FenConnexion.style.display ="none";
    FenCreer.style.display = "flex";
});


BoutonDejaCompte.addEventListener("click", () => {
    FenConnexion.style.display ="flex";
    FenCreer.style.display = "none";
});
