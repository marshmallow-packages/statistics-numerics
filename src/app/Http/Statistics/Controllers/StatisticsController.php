<?php

namespace Marshmallow\Statistics\App\Http\Statistics\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Marshmallow\Statistics\App\Statistics\Gauge;
use Marshmallow\Statistics\App\Statistics\Label;
use Marshmallow\Statistics\App\Statistics\Timer;
use Marshmallow\Statistics\App\Statistics\Number;
use Marshmallow\Statistics\App\Statistics\TopList;
use Marshmallow\Statistics\App\Statistics\PieChart;
use Marshmallow\Statistics\App\Statistics\LineGraph;
use Marshmallow\Statistics\App\Statistics\DayDensity;
use Marshmallow\Statistics\App\Statistics\HourDensity;
use Marshmallow\Statistics\App\Statistics\NamedLineGraph;
use Marshmallow\Statistics\App\Statistics\NumberAndDifference;

class StatisticsController extends Controller
{
    public function __construct ()
    {
        $this->middleware(['auth.basic', function ($request, $next) {
            
            $user = auth()->user();
            if (!$user) {
                abort(403);
            }
            $auth = sha1($user->id . $user->email . $user->password);
            if ($auth !== env(config('statistics.auth'))) {
                abort(403);
            }

            return $next($request);
        }]);
    }
    
    public function toplist ()
    {
        return (new TopList)->title('Developer')
                            ->valueTitle('Lines of code')
                            ->value('Stef', 1450)
                            ->value('Daan', 30);
    }

    public function timer ()
    {
        return (new Timer)->title('Timer')
                                ->date(Carbon::now()->addDays(2));
    }

    public function piechart ()
    {
        return (new PieChart)->title('PieChart')
                                ->value('Sunday', 1450)
                                ->value('Monday', 350)
                                ->value('Friday', 1850);
    }

    public function numberanddifference ()
    {
        return (new NumberAndDifference)->title('NumberAndDifference')
                                ->value(1450)
                                ->compareTo(1250);
    }

    public function namedlinegraph ()
    {
        return (new NamedLineGraph)->title('NamedLineGraph')
                                ->value('Sunday', 1450)
                                ->value('Monday', 350)
                                ->value('Friday', 1850);
    }

    public function linegraph ()
    {
        return (new LineGraph)->title('LineGraph')
                                ->value(1450)
                                ->value(350)
                                ->value(1850);
    }

    public function hourdensity ()
    {
        return (new HourDensity)->title('HourDensity')
                                ->addHours([
                                    1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24
                                ]);
    }

    public function gauge ()
    {
        return (new Gauge)->title('%')
                            ->min(0)
                            ->value(63)
                            ->max(100);
    }

    public function daydensity ()
    {
        return (new DayDensity)->title('DayDensity')
                            ->addDay(Carbon::now(), 100)
                            ->addDay(Carbon::now()->subDays(1), 20)
                            ->addDay(Carbon::now()->subDays(2), 40)
                            ->addDay(Carbon::now()->subDays(3), 75);
    }

    public function number ()
    {
        return (new Number)->title('Number')
                            ->value(123);
    }

    public function label ()
    {
        return (new Label)->title('Label')
                            ->value('passed');
    }
}
