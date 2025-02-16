<?php

namespace App\Http\Controllers\user;

use XMLWriter;
use App\Models\Task;
use SimpleXMLElement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class TaskController extends Controller
{
    function showTasks()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', Auth::id())
            ->orderByRaw("FIELD(priority, 'High priority', 'Middle priority', 'Low priority')")
            ->get();
        // dd($user);

        return view('user.home', compact('tasks', 'user'));
    }

    function orderTasksByDate()
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('deadline', 'asc')
            ->get();

        return view('user.home', compact( 'user', 'tasks'));
    }

    function orderTaskByDateDesc() {
        $user = Auth::user();
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy('deadline', 'desc')
            ->get();

        return view('user.home', compact( 'user', 'tasks'));
    }

    function orderTaskByPriority() {
        $user = Auth::user();
        $tasks = Task::where('user_id', Auth::id())
            ->orderByRaw("FIELD(priority, 'High priority', 'Middle priority', 'Low priority')")
            ->get();
        // dd($user);

        return view('user.home', compact('tasks', 'user'));
    }

    function addTask()
    {
        $task = new Task();
        return view('user.add_task', compact('task'));
    }

    function saveTask(Request $request)
    {
        // validasi data
        $validasiData = Validator::make($request->all(), [
            'task' => 'required|string|max:255',
            'deadline' => 'required|date|after:now',
            'priority' => 'required|in:Low priority,Middle priority,High priority',
        ]);

        if ($validasiData->fails()) {
            return redirect()->back()->withErrors($validasiData)->withInput();
        }

        $task = new Task();
        $task->task = $request->task;
        $task->deadline = $request->deadline;
        $task->priority = $request->priority;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('showTasks')->with('success', 'Tugas ditambahkan');
    }

    function editTask($id)
    {
        $task = Task::find($id);
        return view(
            'user.edit_task',
            compact('task')
        );
    }

    function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        $task->task = $request->task;
        $task->deadline = $request->deadline;
        $task->priority = $request->priority;
        $task->update();

        return redirect()->route('showTasks')
            ->with('success', 'Tugas berhasil diupdate');
    }

    function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('showTasks')
            ->with('success', 'Tugas berhasil dihapus');
    }

    function viewPDF()
    {
        $data = Task::with('user')->get();

        $pdf = FacadePdf::loadView('components.admin.report', array(
            'data' => $data
        ))->setPaper('a4', 'portrait');

        return $pdf->stream();
    }
    function exportPDF()
    {
        $data = Task::with('user')->get();

        $pdf = FacadePdf::loadview('components.admin.report', array(
            'data' => $data
        ))->setPaper('a4', 'portrait');

        return $pdf->download('tasks-details.pdf');
    }

    function exportCSV()
    {
        $filename = 'tasks-details.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'name',
                'email',
                'created_at',
                'task',
                'deadline',
                'priority',
            ]);

            Task::with('user')->chunk(25, function ($tasks) use ($handle) {
                foreach ($tasks as $task) {
                    $data = [
                        isset($task->user->name) ? $task->user->name : '',
                        isset($task->user->email) ? $task->user->email : '',
                        isset($task->user->created_at) ? $task->user->created_at : '',
                        isset($task->task) ? $task->task : '',
                        isset($task->deadline) ? $task->deadline : '',
                        isset($task->priority) ? $task->priority : '',
                    ];

                    fputcsv($handle, $data);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }

    function exportXML()
    {
        $data = Task::with('user')->get();

        $xml = new SimpleXMLElement('<tasks/>');

        foreach ($data as $task) {
            $taskXml = $xml->addChild('task');
            $taskXml->addChild('id', $task->id);
            $taskXml->addChild('task', $task->task);
            $taskXml->addChild('created_at', $task->created_at);
        }

        $fileName = 'tasks.xml';
        $filePath = storage_path('app/' . $fileName);

        file_put_contents($filePath, $xml->asXML());

        // Mengirim file untuk diunduh
        return Response::download($filePath, $fileName)
            ->deleteFileAfterSend(true);
    }
}
