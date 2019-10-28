
function ShowHideCharts() {


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

$(document).ready(function(){
    $.ajax({
        type: "POST",
        // data: {
        //     invoiceno:11
        // },
        url: "/api/chart",
        dataType: "json",
        async: false,
        success: function(data) {


            if(data[0] == null){
                document.getElementById("NodataChart1").innerHTML = "We hebben geen data om te tonen!";
                document.getElementById('myChart').style.display = 'none';



            }else if(data[0].length == 1){
                document.getElementById('ToFewChart1').innerHTML = "Je hebt te weinig data";
                document.getElementById('myChart').style.display = 'none';

            }else {

                var labels = [];
                var j = 1;
                for(var i = 0; i < data[0].length; i++){
                    console.log("hoi");
                    var weegmoment = "weegmoment " + j;
                    labels.push(weegmoment);
                    j++;

                }

            }
            if (data[1] == null){
                document.getElementById("NodataChart2").innerHTML = "We hebben geen data om te tonen!";
                document.getElementById('myChart2').style.display = 'none';
            }







            console.log(labels);

            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'gewicht',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',

                        data:  data[0]//[0, 10, 5, 2, 20, 30, 45]

                    }]
                },

                // Configuration options go here
                options: {}
            });

            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myPieChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['vet','suiker','zout' , 'protine'],
                    datasets:[{
                        label: 'Totaal',
                        data: data[1],//[100,10,300],
                        backgroundColor:[ "#9bf542", "#b042f5" , "#f56042","#ffff00"],
                    }],
                },
                options: {}
            });

        }
    });



});




// var ctx = document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['Vet', 'Zout', 'suiker', 'eiwitten'],
//         datasets: [{
//             label: 'voedingstoffen(gram)',
//             data: [100, 12, 21, 320,],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)'
//
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });
//
// var ctx2 = document.getElementById('myChart2').getContext('2d');
// var myChart2 = new Chart(ctx2, {
//     type: 'line',
//     data: {
//         labels:['januari','Februari','Maart','April','Mei','Juni','July','Augustes','September','Oktober','November','December'],
//         datasets:[{
//             label: 'jaar 1',
//             data: [120,125,123,115,110,111,100,98,93,90,83,78],
//             borderColor: "#3e95cd",
//             fill: false
//
//         }]
//
//     },
//     options: {
//         title: {
//             display: true,
//             text: 'gewichts verlies'
//         },
//         scales: {
//             yAxes: [{
//                 stacked: true
//             }]
//         }
//     }
// });
