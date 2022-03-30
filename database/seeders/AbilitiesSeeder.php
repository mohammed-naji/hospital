<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitiesSeeder extends Seeder
{
    protected $per = [
        'view-departments' => 'View All Departments',
        'update-department' => 'Update Single Departments',
        'delete-department' => 'Delete Single Departments',
        'show-department' => 'Show Single Departments',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Editor'
        ]);

        foreach($this->per as $code => $name) {
            Permission::create([
                'code' => $code,
                'name' => $name
            ]);
        }

    }
}
