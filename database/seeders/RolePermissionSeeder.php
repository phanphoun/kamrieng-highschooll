<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view_dashboard',
            'manage_news',
            'manage_activities',
            'manage_achievements',
            'manage_gallery',
            'manage_events',
            'manage_notices',
            'manage_downloads',
            'manage_hero_slides',
            'manage_pages',
            'manage_leadership',
            'manage_enrollments',
            'manage_messages',
            'manage_users',
            'manage_settings',
            'manage_statistics',
            'view_audit_logs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $editor->givePermissionTo([
            'view_dashboard',
            'manage_news',
            'manage_activities',
            'manage_achievements',
            'manage_gallery',
            'manage_events',
            'manage_notices',
        ]);

        $viewer = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);
        $viewer->givePermissionTo(['view_dashboard']);
    }
}
