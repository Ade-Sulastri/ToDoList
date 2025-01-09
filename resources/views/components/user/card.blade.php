@props(['tasks'])
<div class="flex items-center justify-center p-6 lg:px-8">
    <div class="card w-80 sm:w-96 md:w-auto max-2/4 h-96 bg-emerald-100 rounded-xl overflow-y-auto p-1 md:p-5 shadow-md">
        <table class="min-w-full text-left font-light text-surface text-base text-gray-600">
            <thead class="border-b border-neutral-200 font-normal dark:border-white/10">
                <tr>
                    <th scope="col" class="px-1 md:px-6 py-4 text-sm md:text-base"></th>
                    <th scope="col" class="px-1 md:px-6 py-4 text-sm md:text-base">Task</th>
                    <th scope="col" class="px-1 md:px-6 py-4 text-sm md:text-base">Deadline</th>
                    <th scope="col" class="px-1 md:px-6 py-4 text-sm md:text-base">Priority</th>
                    <th scope="col" class="px-1 md:px-6 py-4 text-sm md:text-base">Action</th>
                    {{-- hidden md:block --}}
                </tr>
            </thead>
            <tbody>
                @if ($tasks->isEmpty())
                    <tr>
                        <td class="text-center font-normal pt-3" colspan="6">Belum mempunyai tugas</td>
                    </tr>
                @else
                    @foreach ($tasks as $task)
                        <tr class="border-neutral-200 dark:border-white/10 font-normal">
                            <td class="whitespace-nowrap px-1 md:px-6 py-4 font-medium">
                                <div class="form-control">
                                    <label class="cursor-pointer label">
                                        <input type="checkbox"
                                            class="checkbox border-black [--chkbg:theme(colors.emerald.600)] [--chkfg:white] checked:border-black" />
                                    </label>
                                </div>
                            </td>
                            <td class="whitespace-normal break-words px-2 md:px-6 py-4 text-sm md:text-base">{{ $task->task }}</td>
                            <td class="whitespace-normal break-words px-2 md:px-6 py-4 text-sm md:text-base">
                                {{ \Carbon\Carbon::parse($task->deadline)->format('m/d/Y') }}
                            </td>
                            <td class="whitespace-normal px-2 md:px-6 py-4 border-black flex items-center text-xs md:text-base">
                                <span
                                    class="
                                        @if ($task->priority == 'High priority') bg-red-500 
                                        @elseif($task->priority == 'Middle priority') 
                                            bg-yellow-500 
                                        @else 
                                            bg-green-500 @endif
                                        text-white px-2 py-1 rounded-lg">
                                    {{ $task->priority }}
                                </span>
                            </td>
                            <td class="whitespace-normal px-1 md:px-6 py-4">
                                <span class="flex flex-col md:flex-row justify-center items-center gap-1 md:gap-3">
                                    <a href="{{ route('editTask', $task->id) }}">
                                        <div class="bg-white p-1 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="blue"
                                                    d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z" />
                                                <path fill="blue"
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <form action="{{ route('deleteTask', $task->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-white p-1 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="red"
                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
