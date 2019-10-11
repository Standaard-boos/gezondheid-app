
window.onload = function (){
    seePass()
}

function seePass(){
    let seePassword = document.querySelectorAll('.seePassword');
    let bool = true;    
    Array.from(seePassword).forEach(e => {
        e.addEventListener('click',() => {
            let input = e.parentNode.childNodes[3];
            if(bool) {
                input.type = 'text'
                e.className = 'fas fa-eye-slash fa-lg icon-right seePassword'
                bool = false;
            }else{
                input.type = 'password'
                e.className = 'fas fa-eye fa-lg icon-right seePassword'
                bool = true;
            }
        })
    });
}

