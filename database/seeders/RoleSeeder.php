<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::factory()->create([
            'name' => 'Admin'
        ]);

        $editor = Role::factory()->create([
            'name' => 'Editor'
        ]);
        $viewer = Role::factory()->create([
            'name' => 'Viever'
        ]);

        $permissions = Permission::all();
        $admin->permissions()->attach($permissions->pluck('id'));

        $editor->permissions()->attach($permissions->pluck('id'));
        $editor->permissions()->detach(4);

        $viewer->permissions()->attach([1,3,5,7]);

/*
        foreach ($permissions as $permission){
            \DB::table('role_persissions')->insert([
                'permission_id' => $permission->id,
                'role_id' => $admin->id
            ]);
        }
*/

    }
}
