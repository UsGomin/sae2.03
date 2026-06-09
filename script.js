const BoutonConnexion = document.getElementById('button-connexion');
const BoutonCreer = document.getElementById('button-creer')
const LoginModal = document.getElementById('login-modal');
const LoginContent = document.getElementById('login-content');
const FenConnexion = document.querySelector('.connexion');
const FenCreer = document.querySelector('.creercompte');


BoutonConnexion.addEventListener("click", ()=>{
    const html = FenConnexion.innerHTML;
    LoginContent.innerHTML = html;

    LoginModal.showModal();
});


BoutonCreer.addEventListener("click", ()=>{
    const html = FenCreer.innerHTML;
    LoginContent.innerHTML = html;

    LoginModal.showModal();
});

LoginModal.addEventListener("click", (e)=>{
    if(e.target === LoginModal){
        LoginModal.close();
    }
});


