<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'write',
            'create',
        ];

        $permissions_by_role = [
            'administrator' => [
                'user management',
                'content management',
                'financial management',
                'reporting',
                'payroll',
                'disputes management',
                'api controls',
                'database management',
                'repository management',
                'category',
                'brand',
                'products',
            ],
            'developer' => [
                'api controls',
                'database management',
                'repository management',
            ],
            'analyst' => [
                'content management',
                'financial management',
                'reporting',
                'payroll',
            ],
            'support' => [
                'reporting',
            ],
            'trial' => [
            ],
        ];

        // Create permissions with the guard name
        foreach ($permissions_by_role['administrator'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::create([
                    'name' => $ability . ' ' . $permission,
                    'guard_name' => 'web',
                ]);
            }
        }

        // Create roles and assign permissions with the guard name
        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }

            Role::create(['name' => $role, 'guard_name' => 'web'])->syncPermissions($full_permissions_list);
        }

        // Assign roles to users
        User::find(1)->assignRole('administrator');
        User::find(2)->assignRole('developer');
    }
}
