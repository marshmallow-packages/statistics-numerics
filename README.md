![alt text](https://cdn.marshmallow-office.com/media/images/logo/marshmallow.transparent.red.png "marshmallow.")

# Marshmallow Statistics
Met de Marshmallow Statistics package is het mogelijk om snel en gemakkelijk json output te genereren die te gebruiken is voor de Numerics App. Deze package werkt standaard met de Basic Auth versie van Numerics om de JSON bestanden te beveiligen.

<img src="https://marshmallow.dev/cdn/readme/statistics/iPad.png" width="100%">

### Installatie
```
composer require marshmallow/statistics
```

Als composer klaar is, maak dan de Basic Auth gebruiker aan die toegang heeft om deze JSON bestanden online te bekijken via onderstaande artisan command.

```
php artisan statistics:install
```

## Controleer of het werkt
Als je de installatie gedaan hebt kan je onderstaande demo grafieken direct bekijken. Als je naar een van deze url's gaat zal je moeten inloggen met de Basic Auth credentials die je bij het installatie process hebt aangemaakt.
- https://marshmallow.dev/statistics/demo/toplist
- https://marshmallow.dev/statistics/demo/timer
- https://marshmallow.dev/statistics/demo/piechart
- https://marshmallow.dev/statistics/demo/numberanddifference
- https://marshmallow.dev/statistics/demo/namedlinegraph
- https://marshmallow.dev/statistics/demo/linegraph
- https://marshmallow.dev/statistics/demo/hourdensity
- https://marshmallow.dev/statistics/demo/gauge
- https://marshmallow.dev/statistics/demo/daydensity
- https://marshmallow.dev/statistics/demo/number
- https://marshmallow.dev/statistics/demo/label


## Kleur opties
Alle grafieken kan je voorzien van een kleur. Dit is de achtergrond kleur van de grafiek in de Numerics App. Hieronder vind je een lijst van alle kleuren die momenteel beschikbaar zijn.
```
(new Number)->title('Number')
    ->red()
    ->blue()
    ->green()
    ->purple()
    ->orange()
    ->midnightBlue()
    ->coffee()
    ->burgundy()
    ->wintergreen()
    ->value(123);
```

Het is ook mogelijk om `->color('red')` aan te roepen als dat makkelijker is om te gebruiken. Als je in deze method een kleur meegeeft die niet bestaat zal er een `Exception` gegooit worden.

## Maak je eigen stats
Om je eigen statistieken te maken moet je een Controller aanmaken waar je de statistieken gaat verzamelen. Doe dit met `php artisan make:controller MyOwnStatisticsController`. Zorg er voor dat deze controller de BaseController van deze package extend zodat er gebruikt gemaakt wordt van de Basic Auth functionaliteit.

Vervolgens maak je eerste method aan in deze nieuwe controller met bijvoorbeeld `salesToday()` en daar return je een `Number` grafiek in terug.

```
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Marshmallow\Statistics\App\Http\Statistics\Controllers\StatisticsController as StatisticsBaseController;

class MyOwnStatisticsController extends StatisticsBaseController
{
    public function salesToday ()
    {
    	return (new \Marshmallow\Statistics\App\Statistics\Number)->title('Verkoop vandaag')
                    ->color('green')
                    ->value(Orders::get()->count());
    }
}
```

Als je dit gedaan hebt, dan maak je een route aan zoals je gewent bent in Laravel om deze data beschikbaar te maken.
```
Route::get('/stats/sales-today', 'MyOwnStatisticsController@salesToday');
```

Nu kan je deze data zichtbaar maken in je Numerics App door de url `{{jouw domein}}/stats/sales-today` toe te voegen in de app. Let op dat je in de app dezelfde grafiek kiest die je ook in method gebruikt hebt. In dit voorbeeld gebruikte we `Number` dus moeten in de Numerics app kiezen voor de `Basic Widgets - Number from authenticated JSON data` in de `Custom JSON - Basic Auth` categorie.

## Verschillende grafieken
Hieronder een lijst van de verschillende grafieken die beschikbaar zijn in deze package. Klik door naar de specifieke grafiek om te bekijken hoe je deze aanspreekt en wat de opties zijn.

- [Label](https://github.com/Marshmallow-Development/package-statistics/blob/master/LABEL.md)
- [Number](https://github.com/Marshmallow-Development/package-statistics/blob/master/NUMBER.md)
- [DayDensity](https://github.com/Marshmallow-Development/package-statistics/blob/master/DAYDENSITY.md)
- [Gauge](https://github.com/Marshmallow-Development/package-statistics/blob/master/GAUGE.md)
- [HourDensity](https://github.com/Marshmallow-Development/package-statistics/blob/master/HOURDENSITY.md)
- [LineGraph](https://github.com/Marshmallow-Development/package-statistics/blob/master/LINEGRAPH.md)
- [NamedLineGraph](https://github.com/Marshmallow-Development/package-statistics/blob/master/NAMEDLINEGRAPH.md)
- [NumberAndDifference](https://github.com/Marshmallow-Development/package-statistics/blob/master/NUMBERANDDIFFERENCE.md)
- [PieChart](https://github.com/Marshmallow-Development/package-statistics/blob/master/PIECHART.md)
- [Timer](https://github.com/Marshmallow-Development/package-statistics/blob/master/TIMER.md)
- [TopList](https://github.com/Marshmallow-Development/package-statistics/blob/master/TOPLIST.md)
