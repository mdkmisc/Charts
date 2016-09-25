<?php

/*
 * This file is part of consoletvs/charts.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Charts;

/**
 * This is the chart class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Chart
{
    public $type;
    public $library;
    public $title;
    public $element_label;
    public $labels;
    public $values;
    public $colors;
    public $responsive;

    /**
     * Return a new chart instance.
     *
     * @param $library
     */
    public function __construct($type, $library = null)
    {
        // Set the chart type
        $this->type = $type;

        // Set the default chart data
        $this->title = config('charts.default.title');
        $this->height = config('charts.default.height');
        $this->width = config('charts.default.width');
        $this->element_label = config('charts.default.element_label');
        $this->labels = [];
        $this->values = [];
        $this->colors = [];
        $this->responsive = config('charts.default.responsive');
        $length = 10; // The random identifier length.
        $this->id = substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

        // Set the chart library
        $this->library = $library ? $library : config('charts.default.library');
    }

    /**
     * Set chart library.
     *
     * @param string $library
     */
    public function setLibrary($library)
    {
        $this->library = $library;

        return $this;
    }

    /**
     * Set chart labels.
     *
     * @param array $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Set chart values.
     *
     * @param array $values
     */
    public function setValues($values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Set uf chart is responsive (will ignore dimensions if true).
     *
     * @param string $label
     */
    public function setElementLabel($label)
    {
        $this->element_label = $label;

        return $this;
    }

    /**
     * Set chart title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set chart colors.
     *
     * @param array $colors
     */
    public function setColors($colors)
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Set chart width.
     *
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Set chart height.
     *
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set chart dimensions (width, height).
     *
     * @param int $width
     * @param int $height
     */
    public function setDimensions($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    /**
     * Set if chart is responsive (will ignore dimensions if true).
     *
     * @param bool $responsive
     */
    public function setResponsive($responsive)
    {
        $this->responsive = $responsive;

        return $this;
    }

    /**
     * Return and array of all the chart settings.
     */
    public function settings()
    {
        return (array) $this;
    }

    /**
     * Render the chart.
     */
    public function render()
    {
        try {
            return include __DIR__."/Templates/$this->library.$this->type.php";
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
