<?php

return "
    <script src='" . asset('/vendor/consoletvs/charts/jquery-3.0.0.min.js') . "'></script>

    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>google.charts.load('current', {'packages':['corechart', 'geochart']});</script>

    <script src='" . asset('/vendor/consoletvs/charts/highcharts/js/highcharts.js') . "'></script>
    <script src='" . asset('/vendor/consoletvs/charts/highcharts/js/modules/exporting.js') . "'></script>
    <script src='" . asset('/vendor/consoletvs/charts/highmaps/js/modules/map.js') . "'></script>
    <script src='" . asset('/vendor/consoletvs/charts/highmaps/js/modules/data.js') . "'></script>
    <script src='" . asset('/vendor/consoletvs/charts/highmaps/maps/world.js') . "'></script>

    <script src='" . asset('/vendor/consoletvs/charts/chartjs/Chart.js') . "'></script>
";
