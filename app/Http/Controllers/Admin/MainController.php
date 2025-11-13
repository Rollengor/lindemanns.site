<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MainController extends Controller
{
    public function index(): View {
        /*$user = Auth::user();

        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);

        $all = Permission::create(['name' => 'all']);
        $create = Permission::create(['name' => 'create']);
        $edit = Permission::create(['name' => 'edit']);
        $delete = Permission::create(['name' => 'delete']);

        $superAdmin->givePermissionTo($all);
        $admin->givePermissionTo($all);
        $manager->givePermissionTo($all);

        $user->assignRole('super-admin');*/

        return view('admin.main.index');
    }
}
