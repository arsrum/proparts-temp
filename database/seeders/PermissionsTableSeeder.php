<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'address_create',
            ],
            [
                'id'    => 18,
                'title' => 'address_edit',
            ],
            [
                'id'    => 19,
                'title' => 'address_show',
            ],
            [
                'id'    => 20,
                'title' => 'address_delete',
            ],
            [
                'id'    => 21,
                'title' => 'address_access',
            ],
            [
                'id'    => 22,
                'title' => 'car_create',
            ],
            [
                'id'    => 23,
                'title' => 'car_edit',
            ],
            [
                'id'    => 24,
                'title' => 'car_show',
            ],
            [
                'id'    => 25,
                'title' => 'car_delete',
            ],
            [
                'id'    => 26,
                'title' => 'car_access',
            ],
            [
                'id'    => 27,
                'title' => 'order_create',
            ],
            [
                'id'    => 28,
                'title' => 'order_edit',
            ],
            [
                'id'    => 29,
                'title' => 'order_show',
            ],
            [
                'id'    => 30,
                'title' => 'order_delete',
            ],
            [
                'id'    => 31,
                'title' => 'order_access',
            ],
            [
                'id'    => 32,
                'title' => 'status_create',
            ],
            [
                'id'    => 33,
                'title' => 'status_edit',
            ],
            [
                'id'    => 34,
                'title' => 'status_show',
            ],
            [
                'id'    => 35,
                'title' => 'status_delete',
            ],
            [
                'id'    => 36,
                'title' => 'status_access',
            ],
            [
                'id'    => 37,
                'title' => 'contact_us_create',
            ],
            [
                'id'    => 38,
                'title' => 'contact_us_edit',
            ],
            [
                'id'    => 39,
                'title' => 'contact_us_show',
            ],
            [
                'id'    => 40,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 41,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
