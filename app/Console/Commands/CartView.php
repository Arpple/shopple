<?php

namespace App\Console\Commands;

use App\Core\Checkout\Domain\CartService;
use App\Core\User\Domain\UserService;
use Illuminate\Console\Command;

class CartView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:view {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View current cart';

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
        $username = $this->argument('username');
        $user = (new UserService)->login($username);

        if (is_null($user)) {
            echo 'user not found';
            return 1;
        }

        $cart = (new CartService($user->id))
            ->get();

        $result = (new \App\Console\Checkout\CartView($user, $cart))
            ->toString();

        echo $result . PHP_EOL;

        return 0;
    }
}
