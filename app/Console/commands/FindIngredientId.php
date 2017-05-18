<?php

namespace App\Console\Commands;

use App\models\DTIngredients;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FindIngredientId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finds id of given item name ';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       Cache::put('super-ingredient', DTIngredients::all()->random(1)->first()->id, 120);

    }
}
