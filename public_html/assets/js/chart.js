function ShowHideCharts()
{
    value = document.getElementById("ChartSelectBox").value;

    switch (value)
    {
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

$(document).ready(function ()
{
    $.ajax({
        type: "POST",
        url: "/api/chart",
        dataType: "json",
        async: false,
        success: function (data)
        {

            if (data[0] == null)
            {
                document.getElementById("NodataChart1").innerHTML = "We hebben geen data om te tonen!";
                document.getElementById('myChart').style.display = 'none';

            } else if (data[0].length == 1)
            {
                document.getElementById('ToFewChart1').innerHTML = "Je hebt te weinig data";
                document.getElementById('myChart').style.display = 'none';
            } else
            {
                var labels = [];
                var j = 1;
                for (var i = 0; i < data[0].length; i++)
                {
                    var weegmoment = "Weegmoment " + j;
                    labels.push(weegmoment);
                    j++;
                }
            }
            if (data[1] == null)
            {
                document.getElementById("NodataChart2").innerHTML = "We hebben geen data om te tonen!";
                document.getElementById('myChart2').style.display = 'none';
            }

            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Gewicht',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: data[0]
                    }]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            afterBody: function (t, d)
                            {
                                return 'kg';
                            }
                        }
                    }
                }
            });

            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myPieChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Vet', 'Suiker', 'Zout', 'Proteïne'],
                    datasets: [{
                        label: 'Totaal',
                        data: data[1],
                        backgroundColor: ["#9bf542", "#b042f5", "#f56042", "#ffff00"],
                    }],
                },
                options: {
                    tooltips: {
                        callbacks: {
                            afterBody: function (t, d)
                            {
                                return 'procent';
                            }
                        }
                    }
                }
            });
        }
    });
});
