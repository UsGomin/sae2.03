const BoutonConnexion = document.getElementById('button-connexion');
const BoutonCreer = document.getElementById('button-creer');
const LoginModal = document.getElementById('login-modal');
const LoginContent = document.getElementById('login-content');
const FenConnexion = document.querySelector('.connexion');
const FenCreer = document.querySelector('.creercompte');
const BoutonClose = document.getElementById('button-close');

BoutonConnexion.addEventListener("click", ()=>{
    const html = FenConnexion.innerHTML;
    LoginContent.innerHTML = html;

    LoginModal.style.display="flex";
});


BoutonCreer.addEventListener("click", ()=>{
    const html = FenCreer.innerHTML;
    LoginContent.innerHTML = html;

    LoginModal.style.display="flex";
});

LoginModal.addEventListener("click", (e)=>{
    if(e.target === BoutonClose){
        LoginModal.style.display="none";
    }
});

document.addEventListener("submit", (e) => {
    // On vérifie si l'élément qui est soumis est bien notre formulaire (via son ID ou sa classe)
    if (e.target && e.target.id === 'form-creer') { 
        e.preventDefault(); // Empêche le rechargement de la page

        const FormulaireActif = e.target; // C'est le formulaire précis qui vient d'être soumis
        const Data = new FormData(FormulaireActif);

        fetch("insert_base.php", {
            method: "POST",
            body: Data
        })
        .then(response => response.text())
        .then(data => {
            .then(data => { LoginContent.innerHTML = data; })  // affiche la réponse (le lien)
            
            // Si le script PHP renvoie "Succès" (ou si vous voulez juste fermer après l'envoi) :
            // LoginModal.style.display = "none";
            // window.location.reload(); // Pour rafraîchir l'index et voir les changements
        })
        .catch(error => console.error("Erreur Fetch :", error));
    }
});
