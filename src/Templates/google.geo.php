<?php

$graph = "
    <script type='text/javascript'>
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
            ['Country', '$this->element_label'],
          ";
          $i = 0;
            foreach ($this->values as $dta) {
                $e = $this->labels[$i];
                $v = $dta;
                $graph .= "['$e', $v],";
                $i++;
            }
            $graph .= '
        ]);

        var options = {
          height: 400-39,
          colorAxis: {colors: ['; if ($this->colors and count($this->colors >= 2)) {
                $graph .= "'".$this->colors[0]."', '".$this->colors[1]."'";
            } $graph .= "]},
          datalessRegionColor: '#e0e0e0',
          defaultColor: '#607D8',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('$this->id'));

        chart.draw(data, options);
      }
    </script>
    <center><b style='font-family: Arial, Helvetica, sans-serif;font-size: 18px;'>$this->title</b><br><br></center>
    <div id='$this->id'></div>
";

return $graph;
