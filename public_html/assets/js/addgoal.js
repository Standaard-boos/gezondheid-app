window.onload = function (){
    this.chooseWaarden()
}


function chooseWaarden(){
        const goal_quantity = document.querySelector('#goal_quantity')
        goal_quantity.addEventListener('change', () => {
        e = goal_quantity;
        e.options[e.selectedIndex].value;
    })
}