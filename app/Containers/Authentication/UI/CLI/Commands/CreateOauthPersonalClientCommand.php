<?php

namespace App\Containers\Authentication\UI\CLI\Commands;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Authentication\Actions\CreateOauthPersonalClientAction;
use App\Ship\Parents\Commands\ConsoleCommand;
use Laravel\Passport\Client;

class CreateOauthPersonalClientCommand extends ConsoleCommand
{
    use CallableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authentication:create:oauth-personal-client
                            {--name= : The name of the client}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create Personal Oauth Client";

    public function handle()
    {
        $name = $this->option('name') ?: $this->ask(
            'What should we name the personal access client?',
            config('app.name').' Personal Access Client'
        );

        /** @var Client $client */
        $client = $this->call(CreateOauthPersonalClientAction::class, [$name]);

        $this->info('Personal access client created successfully.');
        $this->line('<comment>Client ID:</comment> '.$client->id);
        $this->line('<comment>Client Secret:</comment> '.$client->secret);
    }
}
