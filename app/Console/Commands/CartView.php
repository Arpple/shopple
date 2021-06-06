<?php

namespace App\Console\Commands;

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

        $product = (new CatalogService)->findProduct($id);
        $product = new ProductView($product);

        echo $product->toString() . PHP_EOL;

        return 0;
    }
}
