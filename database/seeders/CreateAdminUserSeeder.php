<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        // ++++++++++++++++ Admin Seeder ++++++++++++++++
        $user = User::create([
            'name'       => 'mahmoud',
            'email'      => 'admin@admin.com',
            'password'   => bcrypt('password') ,
            'roles_name' => ['owner'],
            'Status'     => 'مفعل'
        ]);
        // role
        $role = Role::create(['name' => 'owner']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
