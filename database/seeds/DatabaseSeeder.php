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


        // $this->call('AdminsTableSeeder');        
        // $this->call('CidadesParanaSeeder');
        // $this->call('UnitiesTableSeeder');
        // $this->call('ManagersTableSeeder');
        // $this->call('CoursesTableSeeder');
        // $this->call('StudentsTableSeeder');

        $this->call('UsersTableSeeder');


    }
}
