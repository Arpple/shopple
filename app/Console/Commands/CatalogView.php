<?php

namespace App\Console\Commands;

use App\Console\Catalog\ProductView;
use App\Core\Catalog\Domain\CatalogService;
use Illuminate\Console\Command;

class CatalogView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:view {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View product detail';

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
        $id = $this->argument('id');
        $id = intval($id);

        $product = (new CatalogService)->findProduct($id);
        $product = new ProductView($product);

        echo $product->toString() . PHP_EOL;

        return 0;
    }
}
