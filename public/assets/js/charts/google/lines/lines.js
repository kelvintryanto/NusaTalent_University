/* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - lines
 *
 *  Google Visualization line chart demonstration
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */


// Line chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawLineChart);


// Chart settings
function drawLineChart() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Revenue', 'Total Revenue', 'Asd'],
        ['2004',  1000,      400,             500],
        ['2005',  1170,      460,             100],
        ['2006',  660,       1120,             300],
        ['2007',  1030,      540,             900]
    ]);

    // Options
    var options = {
        fontName: 'Roboto',
        height: 400,
        curveType: 'function',
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        pointSize: 4,
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'Sales and Expenses',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var line_chart = new google.visualization.LineChart($('#google-line')[0]);
    line_chart.draw(data, options);
}


// Resize chart
// ------------------------------

$(function () {

    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawLineChart();
    }
});
