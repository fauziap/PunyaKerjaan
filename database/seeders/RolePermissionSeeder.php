<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage categories',
            'manage tools',
            'manage projects',
            'manage project tools',
            'manage applicants',

            // other singular action
            'apply job',
            'topup wallet',
            'withdraw wallet',
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $clientRole = Role::firstOrCreate([
            'name' => 'project_client'
        ]);

        $clientPermission = [
            'manage projects',
            'manage project tools',
            'manage applicants',
            'topup wallet',
            'withdraw wallet',
        ];
        $clientRole->syncpermissions($clientPermission);

        $freelancerRole = Role::firstOrCreate([
            'name' => 'Project_freelancer'
        ]);

        $freelancerPermission = [
            'apply job',
            'withdraw wallet'
        ];
        $freelancerRole->syncPermissions($freelancerPermission);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'occupation' => 'Owner',
            'connect' => 9999,
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('123123')
        ]);

        $user->assignRole($superAdminRole);

        $wallet = new Wallet([
            'balance' => 0,
        ]);
        $user->wallet()->save($wallet);
    }
}
