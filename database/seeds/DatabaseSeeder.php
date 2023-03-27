<?php

use App\Http\Controllers\LinkConfigurationController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LinkConfigurationSeeder::class);
    }
}
