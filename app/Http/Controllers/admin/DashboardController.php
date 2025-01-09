<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    function showDashboard() {
        $users = User::all();
        $count = $users->count();
        return view('admin.dashboard', compact('count', ));
    }

    function showTabelUser() {
        $users = User::all();
        return view('components.admin.user', compact('users', ));
    }
    

    function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->tasks()->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
