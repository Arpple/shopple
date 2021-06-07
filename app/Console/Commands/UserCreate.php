<?php

namespace App\Console\Commands;

use App\Core\User\Domain\UserAlreadyExistsException;
use App\Core\User\Domain\UserService;
use Illuminate\Console\Command;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Signup new user';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        try {
            (new UserService)->signup($name);
        } catch (UserAlreadyExistsException $e) {
            echo $e->getMessage();
            return 1;
        }

        echo 'welcome ' . $name . PHP_EOL;

        return 0;
    }
}
