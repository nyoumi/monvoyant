<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        
        $permissions = [

           'role-list',

           'role-create',

           'role-edit',

           'role-delete',

           'voyant-list',

           'voyant-create',

           'voyant-edit',

           'voyant-delete'

        ];

     

        foreach ($permissions as $permission) {

             Permission::create(['name' => $permission]);

        }

        $user = User::create([

            'name' => 'Nyoumi paul', 

            'email' => 'nyoumipaulius@gmail.com',

            'password' => bcrypt('Africa21')

        ]);

    

        $role = Role::create(['name' => 'Admin']);

     

        $permissions = Permission::pluck('id','id')->all();

   

        $role->syncPermissions($permissions);

     

        $user->assignRole([$role->id]);

    }

}
