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


