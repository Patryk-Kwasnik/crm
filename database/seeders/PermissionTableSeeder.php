<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'news-categories-list',
            'news-categories-create',
            'news-categories-edit',
            'news-categories-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name'=>'admin']);
        }
    }
}
