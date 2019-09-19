function ShowHideCharts() {

   // alert("hoi");
    value = document.getElementById("ChartSelectBox").value;

    switch(value){
        case "kies":
            document.getElementById("chart1").classList.add("hidden");
            document.getElementById("chart2").classList.add("hidden");
            break;
        case "voeding":
            document.getElementById("chart1").classList.remove("hidden");
            document.getElementById("chart2").classList.add("hidden");
            break;
        case "gewicht":
            document.getElementById("chart1").classList.add("hidden");
            document.getElementById("chart2").classList.remove("hidden");
            break;           
               
    }


}



var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Vet', 'Zout', 'suiker', 'eiwitten'],
        datasets: [{
            label: 'voedingstoffen(gram)',
            data: [100, 12, 21, 320,],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'


            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx2 = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels:['januari','Februari','Maart','April','Mei','Juni','July','Augustes','September','Oktober','November','December'],
        datasets:[{
            label: 'jaar 1',
            data: [120,125,123,115,110,111,100,98,93,90,83,78],
            borderColor: "#3e95cd",
            fill: false

        }]

        
    },
    options: {
        title: {
            display: true,
            text: 'gewichts verlies'
        },
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
});
