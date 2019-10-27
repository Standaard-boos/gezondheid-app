window.onload = function () {
    this.getDataInp()
}

function getDataInp() {
    const updateGoalBtn = document.querySelectorAll('.updateGoalBtn')
    const deleteGoalBtn = document.querySelectorAll('.deleteGoalBtn')
    Array.from(updateGoalBtn).forEach((e) => {
        e.addEventListener('click', (x) => {
            const input = e.parentNode.childNodes[5].childNodes[3].value
            const parent = e.parentNode;
            const id = parent.getAttribute('task-id')

            if (input.length > 0 && Number.isInteger(parseInt(input))) {
                updateGoal(input, id)
            }
        })
    })
    Array.from(deleteGoalBtn).forEach((e) => {
        e.addEventListener('click', () => {
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
    const rawResponse = $.ajax({
        type: "POST",
        url: "/deleteGoal",
        data: { id: id, action: 'delete' },
        success: function (data) {
            const json = JSON.parse(data)
            getGoals()
        },
        error: function (e) {
            console.log(e)
        }
    });
}

function updateGoal(data, id) {
    const rawResponse = $.ajax({
        type: "POST",
        url: "/ajax",
        data: { data: data, id: id, action: 'update' },
        success: function (data) {
            const json = JSON.parse(data)

        },
        error: function (e) {
            console.log(e)
        }
    });
}

