<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles =[
            'admin',
            'user',
            'employee'
        ];

        $permissions =[
            'view users' ,
            'add users',
            'delete users'
        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate([
                'name'=>$permission ,
                'guard_name'=>'web'
            ]);
        }

        foreach($roles as $role) {
            $row=Role::firstOrCreate([
                'name'=>$role ,
                'guard_name'=>'web'
            ]);

            if($role == 'admin') {
                $row->syncPermissions( $permissions);
            }
        }


    }
}
