<?php

namespace Marshmallow\Statistics\App\Console\Commands;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistics:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Doe de setup voor de statistics.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$exitCode = Artisan::call('vendor:publish', [
            '--provider' => 'Marshmallow\Statistics\StatisticsServiceProvider',
            '--tag' => ['config'],
            '--force' => true,
        ]);

    	$email = $this->ask('Email om in te loggen voor de authenticatie', 'stats@marshmallow.dev');

    	$user = User::where('email', $email)->get()->first();
    	if ($user) {
    		$this->error('Deze gebruiker bestaat al. Maak een nieuwe aan of gebruik de bestaande.');
    		return;
    	}

    	$password = $this->secret('Wachtwoord voor de authenticatie');
    	$name = $this->ask('Naam van de gebruiker', 'Marshmallow Stats User');
        
    	$password = bcrypt($password);

    	$user = User::create([
    		'name' => $name,
    		'email' => $email,
    		'password' => $password,
    	]);

    	$auth = sha1($user->id . $email . $password);
    	$env_key = config('statistics.auth');
    	$exitCode = Artisan::call("env:set $env_key $auth");

        $this->info('De gebruiker is aangemaakt. De ingevoerd gegevens kunnen gebruikt worden om statistieken op te halen.');
    }

}
