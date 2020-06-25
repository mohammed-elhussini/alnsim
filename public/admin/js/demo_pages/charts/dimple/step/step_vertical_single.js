/* ------------------------------------------------------------------------------
 *
 *  # Dimple.js - single vertical step
 *
 *  Demo of a single step chart. Data stored in .tsv file format
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var DimpleStepVerticalSingle = function() {


    //
    // Setup module components
    //

    // Chart
    var _stepVerticalSingle = function() {
        if (typeof dimple == 'undefined') {
            console.warn('Warning - dimple.min.js is not loaded.');
            return;
        }

        // Main variables
        var element = document.getElementById('dimple-step-vertical-single');


        // Initialize chart only if element exsists in the DOM
        if(element) {

            // Construct chart
            var svg = dimple.newSvg(element, "100%", 500);


            // Chart setup
            // ------------------------------

            d3.tsv("../../../admin/demo_data/dimple/demo_data.tsv", function (data) {

                // Filter data
                data = dimple.filterData(data, "Owner", ["Aperture", "Black Mesa"])


                // Create chart
                // ------------------------------

                // Define chart
                var myChart = new dimple.chart(svg, data);

                // Set bounds
                myChart.setBounds(0, 0, "100%", "100%")

                // Set margins
                myChart.setMargins(70, 10, 20, 45);


                // Create axes
                // ------------------------------

                // Horizontal
                var x = myChart.addMeasureAxis("x", "Unit Sales");

                // Vertical
                var y = myChart.addCategoryAxis("y", "Month");
                    y.addOrderRule("Date");


                // Construct layout
                // ------------------------------

                // Add line
                var s = myChart
                    .addSeries(null, dimple.plot.line)
                    .interpolation = "step";


                // Add styles
                // ------------------------------

                // Font size
                x.fontSize = "12";
                y.fontSize = "12";

                // Font family
                x.fontFamily = "Roboto";
                y.fontFamily = "Roboto";


                //
                // Draw chart
                //

                // Draw
                myChart.draw();


                // Resize chart
                // ------------------------------

                // Add a method to draw the chart on resize of the window
                $(window).on('resize', resize);
                $('.sidebar-control').on('click', resize);

                // Resize function
                function resize() {

                    // Redraw chart
                    myChart.draw(0, true);
                }
            });
        }
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _stepVerticalSingle();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DimpleStepVerticalSingle.init();
});
