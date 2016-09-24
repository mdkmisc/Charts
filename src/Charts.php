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

use Illuminate\Support\Facades\Facade;
use Request;

use ConsoleTVs\Charts\Chart;

/**
 * This is the charts facade class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Charts extends Facade
{
    /**
     * Return a new chart instance
     *
     * @param string $type
     * @param string $library
     */
    public static function new($type, $library = null)
    {
        return new Chart($type, $library);
    }

    /**
     * Return all the libraries available
     *
     * @param string $type
     */
    public static function libraries($type = null)
    {
        $libraries = [];
        foreach(scandir(__DIR__ . '/Templates') as $file) {

            if($file != '.' and $file != '..') {

                $library = explode(".", $file)[0];

                if(!in_array($library, $libraries)) {

                    if(!$type or $type == explode(".", $file)[1]){
                        array_push($libraries, $library);
                    }

                }

            }

        }
        return $libraries;
    }

    /**
     * Return all the types available
     *
     * @param string $library
     */
    public static function types($library = null)
    {
        $types = [];
        foreach(scandir(__DIR__ . '/Templates') as $file) {

            if($file != '.' and $file != '..') {

                $type = explode(".", $file)[1];

                if(!in_array($type, $types)) {

                    if(!$library or $library == explode(".", $file)[0]){
                        array_push($types, $type);
                    }

                }

            }

        }
        return $types;
    }

    /**
     * Return all the library assets
     */
    public static function assets()
    {
        return include __DIR__ . "/includes.php";
    }
}
