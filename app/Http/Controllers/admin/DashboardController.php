<?php

namespace App\Http\Controllers\admin;
use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    //
    function showDashboard() {
        $users = User::all();
        $tasks = Task::all();
        $countTasks = $tasks->count();
        $count = $users->count();

        $userByDay = User::selectRaw('DAY(created_at) as day, COUNT(*) as count')->whereYear('created_at', Carbon::now()->year)->groupBy('day')->orderBy('day')->get();
        
        $chartData = [
            'labels' => $userByDay->pluck('day')->map(function($day) {
                return Carbon::create()->day($day)->format('l');
            }),
            'data' => $userByDay->pluck('count')
        ];

        // chart tugas

        $taskByDay = Task::selectRaw('Day(created_at) as day, COUNT(*) as count')->whereYear('created_at', Carbon::now()->year)->groupBy('day')->orderBy('day')->get();

        $chartDataTask = [
            'labels' => $taskByDay->pluck('day')->map(function($day) {
                return Carbon::create()->day($day)->format('l');
            }),
            'data'=>$taskByDay->pluck('count')
        ];

        return view('admin.dashboard', compact('count', 'chartData', 'countTasks', 'chartDataTask'));
    }

    function showTabelUser() {
        $users = User::all();
        return view('components.admin.user', compact('users', ));
    }
    
    function showTabelTugas() {
        $tasks = Task::with('user')->get();
        return view('components.admin.task', compact('tasks'));
    }

    function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->tasks()->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
