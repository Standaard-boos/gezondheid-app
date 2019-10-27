window.onload = function () {
    this.getDataInp()
}



function getDataInp() {
    const updateGoalBtn = document.querySelectorAll('.updateGoalBtn')
    const deleteGoalBtn = document.querySelectorAll('.deleteGoalBtn')
    Array.from(updateGoalBtn).forEach((e) => {
        const previousinput = e.parentNode.childNodes[5].childNodes[3].value
        e.addEventListener('click', (x) => {
            const input = e.parentNode.childNodes[5].childNodes[3].value
            const parent = e.parentNode;
            const id = parent.getAttribute('task-id')
            if (input.length > 0 && Number.isInteger(parseInt(input))) {
                if (input !== previousinput){
                    document.querySelector('.deleted').style.display = "none"
                    updateGoal(input, id)
                }else{
                    document.querySelector('.deleted').style.display = "block"
                    document.querySelector('.alert').innerHTML += "De ingevoerde waarde is nog steeds hetzelfde"
                }
            }
        })
    })
    Array.from(deleteGoalBtn).forEach((e) => {
        e.addEventListener('click', (x) => {
            x.preventDefault()
            const parent = e.parentNode;
            const id = parent.getAttribute('task-id')
            deleteGoal(id)
        })
    })
}
function getGoals() {
    const jqxhr = $.get("/getGoals", (data) => {
        $('#seeGoalsForm').html(data);
    })
}
function deleteGoal(id) {
    if (confirm("Weet je het zeker dat je het wilt verwijderen ?")) {
        const rawResponse = $.ajax({
            type: "POST",
            url: "/deleteGoal",
            data: { id: id, action: 'delete' },
            success: function (data) {
                const json = JSON.parse(data)
                document.querySelector('.deleted').style.display = "block"
                document.querySelector('.alert').innerHTML += "Doel verwijderd!"
                getGoals()
            },
            error: function (e) {
                console.log(e)
            }
        });
    }
}

function updateGoal(data, id) {
    const rawResponse = $.ajax({
        type: "POST",
        url: "/ajax",
        data: { data: data, id: id, action: 'update' },
        success: function (data) {
            const json = JSON.parse(data)
            document.querySelector('.edited').style.display = "block"
            document.querySelector('.alertsuccess').innerHTML += "Doel gewijzigd!"
        },
        error: function (e) {
            console.log(e)
        }
    });
}

