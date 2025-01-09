<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-emerald-50">
    <div class="flex justify-center items-center max-h-screen h-screen">
        <div class="bg-emerald-700 h-auto w-80 md:w-1/2 max-2/4 p-5 px-10 rounded-md">
            <div>
                <h1 class="text-white text-center font-medium text-2xl pb-1">Edit Task</h1>
            </div>
            <hr>
            <form action="{{ route('updateTask', $task->id) }}" method="POST" class="pt-5 text-gray-900">
                @csrf
                <div class="mb-3">
                    <label for="" class="text-white font-normal">Task</label>
                    <input type="text" name="task" id="task" placeholder="Task"
                        class="focus:outline-none p-3 rounded-md w-full bg-stone-50 " autocomplete="off"
                        value="{{ $task->task }}">
                </div>
                <div class="mb-3">
                    <label for="" class="text-white font-normal">Deadline</label>
                    <input type="date" name="deadline" id="deadline" placeholder="Deadline"
                        class="focus:outline-none p-3 rounded-md w-full bg-stone-50"
                        value="{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label for="" class="text-white font-normal">Priority</label>
                    <select name="priority" id="priority" class="focus:outline-none p-3 rounded-md w-full bg-stone-50">
                        <option value="High priority" {{ $task->priority == 'High priority' ? 'selected' : '' }}>High
                            priority</option>
                        <option value="Middle priority" {{ $task->priority == 'Middle priority' ? 'selected' : '' }}>
                            Middle priority</option>
                        <option value="Low priority" {{ $task->priority == 'Low priority' ? 'selected' : '' }}>Low
                            priority</option>
                    </select>
                </div>
                <div class="mb-3 text-center pt-3">
                    <button type="submit"
                        class="bg-emerald-100 hover:bg-emerald-200 px-4 py-1 rounded-md font-normal text-gray-900">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
