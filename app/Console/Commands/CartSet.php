<?php

namespace App\Console\Commands;

use App\Console\Checkout\CartView;
use App\Core\Checkout\CartService;
use App\Core\User\UserService;
use Illuminate\Console\Command;

class CartSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:set {username} {productId} {quantity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set cart product';

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

        $productId = $this->argument('productId');
        $quantity = $this->argument('quantity');

        $cart = (new CartService($user->id))
            ->setProductItem($productId, $quantity)
            ->get();

        $result = (new CartView($user, $cart))
            ->toString();

        echo $result . PHP_EOL;

        return 0;
    }
}
