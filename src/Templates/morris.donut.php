<?php

$graph = '
<div '; if (!$this->responsive) {
    $graph .= "style='width: $this->width'";
} $graph .= "><center><b style='font-family: Arial, Helvetica, sans-serif;font-size: 18px;'>$this->title</b></center></div>
	<div id='$this->id' "; if (!$this->responsive) {
    $graph .= "style='height: $this->height; width: $this->width'";
} else {
    $graph .= "style='height: 100%; width: 100%;'";
} $graph .= " ></div>
    <script type='text/javascript'>
		Morris.Donut({
		  element: '$this->id',
		  resize: true,
		  data: [
			";
                $i = 0;
                foreach ($this->values as $v) {
                    $l = $this->labels[$i];
                    $graph .= "{label: \"$l\", value: $v},";
                    $i++;
                }
            $graph .= '
		  ],
		  ';
            if ($this->colors) {
                $graph .= 'colors: [';
                foreach ($this->colors as $c) {
                    $graph .= "\"$c\",";
                }
                $graph .= ']';
            }
          $graph .= '
		  
		});
    </script>
';

return $graph;
