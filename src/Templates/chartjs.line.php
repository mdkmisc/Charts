<?php
$graph = "
    <canvas id='$this->id' width='$this->width' height='$this->height'></canvas>
    <script>
    	var ctx = document.getElementById('$this->id');
    	var data = {
    	    labels: ["; foreach($this->labels as $label){$graph .= "'" . $label . "',";} $graph .="],
    	    datasets: [
    	        {
    	            label: '$this->element_label',
    	            lineTension: 0.3,
                    "; if($this->colors){ $graph .= "borderColor: '" . $this->colors[0] . "',"; } $graph .= "
    	            data: ["; foreach($this->values as $dta){$graph .= $dta . ',';} $graph .="],
    	        }
    	    ]
    	};

    	var myLineChart = new Chart(ctx, {
    		type: 'line',
    		data: data,
    		options: {
                responsive: "; $this->responsive ? $graph .= 'true' : $graph .= 'false'; $graph .= ",
    			title: {
    	            display: true,
                    text: '$this->title',
    				fontSize: 20,
    	        }
    	    }
    	});
    </script>
";
return $graph;
