
$(document).ready(function ()
{
    $.ajax({
        type: "POST",
        url: "/api/chart",
        dataType: "json",
        async: false,
        success: function (data)
        {
            var gescoordePunten = 12;
            //var totaalPunten = 40;
            if(data[0][0]>25){
                gescoordePunten = gescoordePunten - 2;
            }
            if(data[0][1]> 25){
                gescoordePunten = gescoordePunten -2;
            }
            if(data[0][2]> 25){
                gescoordePunten = gescoordePunten -2;
            }

            console.log(gescoordePunten);
            console.log(data);

            var opts = {
                angle: -0.2, // The span of the gauge arc
                lineWidth: 0.2, // The line thickness
                radiusScale: 0.84, // Relative radius
                pointer: {
                    length: 0.6, // // Relative to gauge radius
                    strokeWidth: 0.031, // The thickness
                    color: '#000000' // Fill color
                },
                limitMax: false,     // If false, max value increases automatically if value > maxValue
                limitMin: false,     // If true, the min value of the gauge will be fixed
                colorStart: '#6FADCF',   // Colors
                colorStop: '#8FC0DA',    // just experiment with them
                strokeColor: '#E0E0E0',  // to see which ones work best for you
                generateGradient: true,
                highDpiSupport: true,     // High resolution support



                staticZones: [

                    {strokeStyle: "#F03E3E", min: 0, max: 3}, // Red from 100 to 130
                    {strokeStyle: "#ffa500", min: 3, max: 6}, // orrange
                    {strokeStyle: "#FFDD00", min: 6, max: 9}, // Yellow
                    {strokeStyle: "#30B32D", min: 9, max: 12}, // Green

                ]

            };
            var target = document.getElementById('foo'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 12; // set max gauge value
            gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
            gauge.animationSpeed = 19; // set animation speed (32 is default value)
            gauge.set(gescoordePunten); // set actual value

            switch (gescoordePunten) {
                case 0:
                case 1:
                case 2:
                case 3:
                    document.getElementById("gezondText").innerHTML = "u bent ongezond bezig";
                    break;
                case 4:
                case 5:
                case 6:
                    document.getElementById("gezondText").innerHTML = "u bent een beetje ongezond bezig";
                    break;
                case 7:
                case 8:
                case 9:
                    document.getElementById("gezondText").innerHTML = "u bent een beetje gezond bezig";
                    break;
                case 10:
                case 11:
                case 12:
                    document.getElementById("gezondText").innerHTML = "u bent gezond bezig";
                    break;

            }

        }
    });
});




