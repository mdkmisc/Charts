<?php

$graph = "
    <script type='text/javascript'>
        $(function () {
            $('#$this->id').highcharts({
                chart: {
                    "; if (!$this->responsive) {
    $graph .= "
                        width: $this->width,
                        height: $this->height,";
}
                    $graph .= "              
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: \"$this->title\",
                },
                tooltip: {
                    pointFormat: '{point.y} <b>({point.percentage:.1f}%)</b>'
                },
                plotOptions: {
                    pie: {
						innerSize: 250,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}%)',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    colorByPoint: true,
                    data: [
                    ";
                    $i = 0;
                    foreach ($this->values as $dta) {
                        $e = $this->labels[$i];
                        $v = $dta;
                        $graph .= "{name: \"$e\", y: $v},";
                        $i++;
                    }
                    $graph .= "
                    ]
                }]
            });
        });
    </script>
    <div id='$this->id'></div>
";

return $graph;
