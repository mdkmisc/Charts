<?php

$graph = "
<div "; if (!$this->responsive) {
    $graph .= "style='width: $this->width'";
} $graph .= "><center><b style='font-family: Arial, Helvetica, sans-serif;font-size: 18px;'>$this->title</b></center></div>
	<div id='$this->id' "; if (!$this->responsive) {
    $graph .= "style='height: $this->height; width: $this->width'";
} else {
	$graph .= "style='height: 100%; width: 100%;'";
} $graph .= " ></div>
    <script type='text/javascript'>
		Morris.Area({
		  element: '$this->id',
		  resize: true,
		  data: [
			";	
				$i = 0;
				foreach($this->values as $v){
					$l = $this->labels[$i];
					$graph .= "{x: \"$l\", y: $v},";
					$i++;
				}
			$graph .= "
		  ],
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: [\"$this->element_label\"],
		  hideHover: 'auto',
		  parseTime: false,
		  ";
			if($this->colors){
				$graph .= "lineColors: [\"" . $this->colors[0] . "\"],";
			}
		  $graph .= "
		  
		});
    </script>
";

return $graph;
