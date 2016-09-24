# Charts
### Create charts for laravel using diferent charts libraries

Charts is a multi-library chart package to create interactive charts using laravel.

## Libraries

Charts include the following libraries by default:

- ChartJS
- Highcharts
- Google

## Types

Charts include the following chart types by default:

- Pie Chart
- Line Chart
- Bar Chart
- Geo Chart

## Installation

To install charts use composer

### Download

```
composer require consoletvs/charts
```

### Add service provider

Add the following service provider to the array in: ```config/app.php```

```
ConsoleTVs\Charts\ChartsServiceProvider::class,
```

### Publish the assets

```
php artisan vendor:publish --tag=charts_config
php artisan vendor:publish --tag=charts_assets --force
```
