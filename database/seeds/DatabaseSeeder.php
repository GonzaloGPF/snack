<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedConstants();

        if(app()->environment() == 'local' || app()->environment() == 'dev') {
            $this->call([
                UsersTableSeeder::class,
                ProductsTableSeeder::class,
                OrdersTableSeeder::class,
                OrderLinesTableSeeder::class
            ]);
        }
    }

    /**
     * Seeds constants table data
     *
     * @return DatabaseSeeder
     */
    public function seedConstants()
    {
        return $this->call([
            RolesTableSeeder::class
        ]);
    }
}
