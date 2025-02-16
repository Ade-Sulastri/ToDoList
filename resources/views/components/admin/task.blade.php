<x-admin.layout>
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table id="users" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tugas</th>
                                    <th class="text-center">Deadline</th>
                                    <th class="text-center">Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tasks && count($tasks) > 0)
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->task }}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</td>
                                            <td>
                                                <span
                                                    class="
                                                  @if ($task->priority == 'High priority') bg-red-500 
                                                  @elseif($task->priority == 'Middle priority') 
                                                      bg-yellow-500 
                                                  @elseif($task->priority == 'Low priority') 
                                                      bg-green-500 @endif
                                                  text-white px-2 py-1 rounded-lg">
                                                    {{ $task->priority }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Tidak tersedia data user</p>
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-4 flex items-center justify-end gap-3">
                            <div>
                                <a href="{{ route('exportXML') }}">
                                    <button
                                        class="border rounded p-2 px-3 bg-blue-500 hover:bg-blue-600 text-white">Download
                                        .xml</button>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('exportCSV') }}">
                                    <button
                                        class="border rounded p-2 px-3 bg-blue-500 hover:bg-blue-600 text-white">Download
                                        .csv</button>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('exportPDF') }}">
                                    <button
                                        class="border rounded p-2 px-3 bg-blue-500 hover:bg-blue-600 text-white">Download
                                        .pdf</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
