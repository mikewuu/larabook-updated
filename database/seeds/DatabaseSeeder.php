<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {


    protected $tables = [
        'users',
        'statuses'
    ];


    protected $seeders = [
        'UserTableSeeder',
        'StatusTableSeeder'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        // Call seeder in seeder array
        foreach($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }

    }

    /**
     * Clean out the database for a new seed generation
     */
    private function cleanDatabase()
    {
        // Tell MySQL to not bother checking for foreign keys because table will be dropped
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        // Turn back on foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
