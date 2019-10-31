
const food = document.querySelector('#voedsel')
const drink = document.querySelector('#drink')
const gewicht = document.querySelector('#gewicht')

food.addEventListener('input', () => {
    if (food.value.length > 0) {
        drink.readOnly = true
        gewicht.readOnly = true

    }else{
        drink.readOnly = false
        gewicht.readOnly = false
    }
})
drink.addEventListener('input', () => {
    if (drink.value.length > 0) {
        food.readOnly = true
        gewicht.readOnly = true
    }else{
        food.readOnly = false
        gewicht.readOnly = false
    }
})

gewicht.addEventListener('input', () =>{
    if(gewicht.value.length > 0){
        food.readOnly = true
        drink.readOnly = true
    }else{
        food.readOnly = false
        drink.readOnly = false
    }
})
