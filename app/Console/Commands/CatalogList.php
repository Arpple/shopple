<?php

namespace App\Console\Commands;

use App\Console\Catalog\ProductListView;
use App\Core\Catalog\CatalogService;
use Illuminate\Console\Command;

class CatalogList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all products';

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
        (new CatalogService)
            ->listProducts()
            ->map(fn ($p) => new ProductListView($p))
            ->map(fn ($p) => $p->toString())
            ->each(function ($p) {
                echo $p;
                echo PHP_EOL;
            });

        return 0;
    }
}
