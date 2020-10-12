<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('project_categories')->insert(
            [
                ['name' => 'Youth Work'],
                ['name' => 'Gender & GBV'],
                ['name' => 'Activism'],
            ]
        );
    }
}
