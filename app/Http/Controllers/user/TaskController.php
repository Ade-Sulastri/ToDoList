<?php

namespace App\Http\Controllers\user;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    function showTasks() {
        $user = Auth::user();
        $tasks = Task::where('user_id', Auth::id())->get();
        // dd($user);
        return view('user.home', compact('tasks', 'user'));
    }

    function addTask() {
        $task = new Task();
        return view('user.add_task', compact('task'));
    }

    function saveTask(Request $request) {
        $task = new Task();
        $task->task = $request->task;
        $task->deadline = $request->deadline;
        $task->priority = $request->priority;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('showTasks')->with('success', 'Tugas ditambahkan');
    }

    function editTask($id) {
        $task = Task::find($id);
        return view('user.edit_task', compact('task'));
    }

    function updateTask(Request $request, $id) {
        $task = Task::find($id);
        $task->task = $request->task;
        $task->deadline = $request->deadline;
        $task->priority = $request->priority;
        $task->update();

        return redirect()->route('showTasks')->with('success', 'Tugas berhasil diupdate');
    }

    function deleteTask($id) {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('showTasks')->with('success', 'Tugas berhasil dihapus');
    }
}
