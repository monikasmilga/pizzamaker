<?php
/**
 * Created by PhpStorm.
 * User: karolis
 * Date: 5/17/2017
 * Time: 9:49 AM
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateAdministrator extends Command
{
    protected $signature = "make:admin";

    protected $description = "Create admin user account";

    public function handle()
    {
        $this->comment("Creating admin user");
        $email = $this->ask('Please provide email');


//
//        $this->info("info");
//        $this->error("error");
    }
}