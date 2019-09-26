
window.onload = function (){
    seePass()
}

function seePass(){
    let seePassword = document.querySelector('#seePassword');
    let loginPasswordInput = document.querySelector('#loginPasswordInput');
    let bool = true;
    seePassword.addEventListener('click', () => { 
        if(bool){
            loginPasswordInput.type = 'text'
            seePassword.className = 'fas fa-eye-slash fa-lg icon-right'
            bool = false;
        }else{
            loginPasswordInput.type = 'password'
            seePassword.className = 'fas fa-eye fa-lg icon-right'
            bool = true;
        }
    })
}

