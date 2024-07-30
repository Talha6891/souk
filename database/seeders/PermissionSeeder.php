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

            ['name' => 'warehouse index', 'module_name' => 'warehouse'],
            ['name' => 'warehouse create', 'module_name' => 'warehouse'],
            ['name' => 'warehouse update', 'module_name' => 'warehouse'],
            ['name' => 'warehouse delete', 'module_name' => 'warehouse'],
            ['name' => 'warehouse show', 'module_name' => 'warehouse'],
            // supervisor status update
            ['name' => 'warehouse-order-status-update', 'module_name' => 'warehouse'],


            ['name' => 'client index', 'module_name' => 'client'],
            ['name' => 'client create', 'module_name' => 'client'],
            ['name' => 'client update', 'module_name' => 'client'],
            ['name' => 'client delete', 'module_name' => 'client'],
            ['name' => 'client show', 'module_name' => 'client'],

            ['name' => 'order index', 'module_name' => 'order'],
            ['name' => 'order create', 'module_name' => 'order'],
            ['name' => 'order update', 'module_name' => 'order'],
            ['name' => 'order delete', 'module_name' => 'order'],
            ['name' => 'order show', 'module_name' => 'order'],
            ['name' => 'order import_file', 'module_name' => 'order'],
            ['name' => 'order export_file', 'module_name' => 'order'],


            ['name' => 'employee index', 'module_name' => 'employee'],
            ['name' => 'employee create', 'module_name' => 'employee'],
            ['name' => 'employee update', 'module_name' => 'employee'],
            ['name' => 'employee delete', 'module_name' => 'employee'],
            ['name' => 'employee show', 'module_name' => 'employee'],
        ]);

        $sanctum = collect([]);

        $permissions->map(function ($permission) use ($sanctum) {
            $sanctum->push([
                'name' => $permission['name'],
                'module_name' => $permission['module_name'],
                'guard_name' => 'sanctum',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        Permission::insert($sanctum->toArray());
    }

}
