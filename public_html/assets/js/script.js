
window.onload = function (){
    this.seePass()
    this.chooseMoreDrugs()
}

function seePass(){
    const seePassword = document.querySelectorAll('.seePassword');
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

function chooseMoreDrugs(){
    const input_quantity = document.querySelector('.input_quantity')
    const select_quantity = document.querySelector('#select_quantity')

    select_quantity.addEventListener('change', () => {
        if (select_quantity.options[select_quantity.selectedIndex].value == 'more'){
            input_quantity.type = 'number'
        }else{
            input_quantity.type = 'hidden'
        }

    })
}