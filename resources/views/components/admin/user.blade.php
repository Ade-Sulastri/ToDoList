<x-admin.layout>
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table id="users" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($users && count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (Cache::has('user-is-online-' . $user->id))
                                                    {{ $user->status }}
                                                @else
                                                    Offline
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button>
                                                        <i class="fas fa-trash text-red-500"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Tidak tersedia data user</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
