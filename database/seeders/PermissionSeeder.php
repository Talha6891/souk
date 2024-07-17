<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = collect([
            ['name' => 'user create', 'module_name' => 'user',],
            ['name' => 'user update', 'module_name' => 'user',],
            ['name' => 'user delete', 'module_name' => 'user',],
            ['name' => 'user show', 'module_name' => 'user',],
            ['name' => 'user index', 'module_name' => 'user',],

            ['name' => 'permission index', 'module_name' => 'permission'],
            ['name' => 'permission create', 'module_name' => 'permission'],
            ['name' => 'permission update', 'module_name' => 'permission'],
            ['name' => 'permission delete', 'module_name' => 'permission'],
            ['name' => 'permission show', 'module_name' => 'permission'],

            ['name' => 'role index', 'module_name' => 'role'],
            ['name' => 'role create', 'module_name' => 'role'],
            ['name' => 'role update', 'module_name' => 'role'],
            ['name' => 'role delete', 'module_name' => 'role'],
            ['name' => 'role show', 'module_name' => 'role'],

            ['name' => 'database_backup viewAny', 'module_name' => 'database_backup'],
            ['name' => 'database_backup create', 'module_name' => 'database_backup'],
            ['name' => 'database_backup delete', 'module_name' => 'database_backup'],
            ['name' => 'database_backup download', 'module_name' => 'database_backup'],

            ['name'=>'menu users_list', 'module_name'=>'menu'],
            ['name'=>'menu role_permission', 'module_name'=>'menu'],
            ['name'=>'menu role_permission_permissions', 'module_name'=>'menu'],
            ['name'=>'menu role_permission_roles', 'module_name'=>'menu'],
            ['name'=>'menu database_backup', 'module_name'=>'menu'],

            ['name' => 'category index', 'module_name' => 'category'],
            ['name' => 'category create', 'module_name' => 'category'],
            ['name' => 'category update', 'module_name' => 'category'],
            ['name' => 'category delete', 'module_name' => 'category'],
            ['name' => 'category show', 'module_name' => 'category'],

            ['name' => 'service index', 'module_name' => 'service'],
            ['name' => 'service create', 'module_name' => 'service'],
            ['name' => 'service update', 'module_name' => 'service'],
            ['name' => 'service delete', 'module_name' => 'service'],
            ['name' => 'service show', 'module_name' => 'service'],

            ['name' => 'plan index', 'module_name' => 'plan'],
            ['name' => 'plan create', 'module_name' => 'plan'],
            ['name' => 'plan update', 'module_name' => 'plan'],
            ['name' => 'plan delete', 'module_name' => 'plan'],
            ['name' => 'plan show', 'module_name' => 'plan'],

            ['name' => 'customerRequest index', 'module_name' => 'customerRequest'],
            ['name' => 'customerRequest create', 'module_name' => 'customerRequest'],
            ['name' => 'customerRequest update', 'module_name' => 'customerRequest'],
            ['name' => 'customerRequest delete', 'module_name' => 'customerRequest'],
            ['name' => 'customerRequest show', 'module_name' => 'customerRequest'],
        ]);

        $web = collect([]);

        $permissions->map(function ($permission) use ($web) {
            $web->push([
                'name' => $permission['name'],
                'module_name' => $permission['module_name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        Permission::insert($web->toArray());
    }
}
