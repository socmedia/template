<?php

namespace Modules\Marketing\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Marketing\Entities\Faq;

class MarketingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Faq::factory()->count(100)->create();
        // $this->call("OthersTableSeeder");
    }
}
