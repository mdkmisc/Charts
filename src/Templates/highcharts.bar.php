<?php
$graph = "
    <script type='text/javascript'>
        $(function () {
            $('#$this->id').highcharts({
                chart: {
                    "; if(!$this->responsive) $graph .= "
                        width: $this->width,
                        height: $this->height,";
                    $graph .= " 
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: '$this->title'
                },
                plotOptions: {
                   column: {
                       pointPadding: 0.2,
                       borderWidth: 0
                   }
               },
               xAxis: {
                    categories: [
                        ";
                        foreach($this->labels as $label){
                            $graph .= "'$label',";
                        }
                        $graph .="
                    ],
                    crosshair: true
                },
                series: [{
                    name: '$this->element_label',
                    data: [
                    ";
                    foreach($this->values as $dta){
                        $graph .= "$dta,";
                    }
                    $graph .="
                    ]
                }]
            });
        });
    </script>
    <div id='$this->id'></div>
";
return $graph;
