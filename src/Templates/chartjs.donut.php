<?php

$graph = "
    <canvas id='$this->id' width='$this->width' height='$this->height'></canvas>
    <script>
        var ctx = document.getElementById('$this->id');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["; foreach ($this->labels as $label) {
    $graph .= "'".$label."',";
} $graph .= '],
                datasets: [{
                    data: ['; foreach ($this->values as $dta) {
    $graph .= $dta.',';
} $graph .= '],
                    backgroundColor: [';
                    if ($this->colors) {
                        foreach ($this->colors as $color) {
                            $graph .= '"'.$color.'",';
                        }
                    } else {
                        foreach ($this->values as $dta) {
                            $graph .= "'".sprintf('#%06X', mt_rand(0, 0xFFFFFF))."',";
                        }
                    }
                    $graph .= '],
                }]
            },
            options: {
                responsive: '; $this->responsive ? $graph .= 'true' : $graph .= 'false'; $graph .= ",
                title: {
                    display: true,
                    text: \"$this->title\",
                    fontSize: 20,
                }
            }
        });
    </script>
";

return $graph;
