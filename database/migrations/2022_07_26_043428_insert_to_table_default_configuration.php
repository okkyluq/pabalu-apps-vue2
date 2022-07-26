<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Menu;
use App\Models\OtoritasMenu;

return new class extends Migration
{

    public function up()
    {
        $superuser = User::create([
            'name' => 'Super User',
            'username' => 'superuser',
            'password' => bcrypt('superuser'),
            'email' => 'superuser@email.com',
        ]);

        $datamaster = Menu::create([
            'parent_id' => null,
            'text_menu' => 'Data Master',
            'url' => 'datamaster',
            'active' => true,
            'icon' => 'fa fa-folder',
            'created_by' => $superuser->id,
        ]);

        $pengaturan = Menu::create([
            'parent_id' => null,
            'text_menu' => 'Pangaturan',
            'url' => 'pangaturan',
            'active' => true,
            'icon' => 'fa fa-cogs',
            'created_by' => $superuser->id,
        ]);

        $datamenu = Menu::create([
            'parent_id' => $datamaster->id,
            'text_menu' => 'Data Menu',
            'url' => 'datamenu',
            'active' => true,
            'icon' => 'fa fa-file',
            'created_by' => $superuser->id,
        ]);

        $otoritas_menu = Menu::create([
            'parent_id' => $pengaturan->id,
            'text_menu' => 'Otoritas Menu',
            'url' => 'otoritasmenu',
            'active' => true,
            'icon' => 'fa fa-cog',
            'created_by' => $superuser->id,
        ]);

        $otoritas_pengaturan = OtoritasMenu::create([
            'menu_id' => $pengaturan->id,
            'view' => 'true',
            'create' => 'false',
            'edit' => 'false',
            'delete' => 'false',
            'export' => 'false',
            'import' => 'false',
        ]);

        $permission_view_pengaturan = Permission::updateOrCreate([
            'name' => 'view_pangaturan'
        ]);

        $otoritas_datamaster = OtoritasMenu::create([
            'menu_id' => $datamaster->id,
            'view' => 'true',
            'create' => 'false',
            'edit' => 'false',
            'delete' => 'false',
            'export' => 'false',
            'import' => 'false',
        ]);

        $permission_view_data_master = Permission::updateOrCreate([
            'name' => 'view_data_master'
        ]);

        $otoritas_otoritas_menu = OtoritasMenu::create([
            'menu_id' => $otoritas_menu->id,
            'view' => 'true',
            'create' => 'true',
            'edit' => 'true',
            'delete' => 'true',
            'export' => 'false',
            'import' => 'false',
        ]);

        $permission_view_otoritas_menu = Permission::updateOrCreate([
            'name' => 'view_otoritas_menu'
        ]);

        $permission_create_otoritas_menu = Permission::updateOrCreate([
            'name' => 'create_otoritas_menu'
        ]);

        $permission_edit_otoritas_menu = Permission::updateOrCreate([
            'name' => 'edit_otoritas_menu'
        ]);

        $permission_delete_otoritas_menu = Permission::updateOrCreate([
            'name' => 'delete_otoritas_menu'
        ]);

        $otoritas_data_menu = OtoritasMenu::create([
            'menu_id' => $datamenu->id,
            'view' => 'true',
            'create' => 'true',
            'edit' => 'true',
            'delete' => 'true',
            'export' => 'false',
            'import' => 'false',
        ]);

        $permission_view_data_menu = Permission::updateOrCreate([
            'name' => 'view_data_menu'
        ]);

        $permission_create_data_menu = Permission::updateOrCreate([
            'name' => 'create_data_menu'
        ]);

        $permission_edit_data_menu = Permission::updateOrCreate([
            'name' => 'edit_data_menu'
        ]);

        $permission_delete_data_menu = Permission::updateOrCreate([
            'name' => 'delete_data_menu'
        ]);

        $roles_super_user = Role::create(['name' => 'Super User', 'guard_name' => 'api']);
        $roles_general_manager = Role::create(['name' => 'General Manager', 'guard_name' => 'api']);
        $roles_manager = Role::create(['name' => 'Manager', 'guard_name' => 'api']);
        $roles_supervisor = Role::create(['name' => 'Supervisor', 'guard_name' => 'api']);
        $roles_staff = Role::create(['name' => 'Staff', 'guard_name' => 'api']);

        // create roles to user
        $super_user_create_roles = User::find($superuser->id)->assignRole($roles_super_user->name);

        // create permission to roles
        $roles_super_user->givePermissionTo($permission_view_pengaturan->name);
        $roles_super_user->givePermissionTo($permission_view_data_master->name);
        $roles_super_user->givePermissionTo($permission_view_otoritas_menu->name);
        $roles_super_user->givePermissionTo($permission_create_otoritas_menu->name);
        $roles_super_user->givePermissionTo($permission_edit_otoritas_menu->name);
        $roles_super_user->givePermissionTo($permission_delete_otoritas_menu->name);
        $roles_super_user->givePermissionTo($permission_view_data_menu->name);
        $roles_super_user->givePermissionTo($permission_create_data_menu->name);
        $roles_super_user->givePermissionTo($permission_edit_data_menu->name);
        $roles_super_user->givePermissionTo($permission_delete_data_menu->name);
    }


    public function down()
    {

    }
};
