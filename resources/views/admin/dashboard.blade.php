<x-admin.layout>
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- status -->
        <div class="grid grid-cols-4 gap-2 mt-1 mb-3 lg:grid-cols-2">

            <!-- status -->
            <div class="card col-span-2">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">Users</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">{{ $count }}</h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )
                    </p>
                </div>
            </div>
            <!-- status -->

            <!-- status -->
            <div class="card col-span-2">
                <div class="card-body">
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">Tasks</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">
                        {{ $countTasks }}
                    </h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )
                    </p>
                </div>
            </div>
            <!-- status -->

        </div>
        <!-- end status -->

        <!-- congrats & summary -->
        <div class="grid grid-cols-2 lg:grid-cols-1 gap-2">
            <div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">

                <!-- right -->
                <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">

                    <!-- top -->
                    <div class="p-5 flex flex-row flex-wrap justify-between items-center">
                        <h2 class="font-bold text-lg">Pengguna App To Do List</h2>
                    </div>
                    <!-- end top -->
                    <script>
                        var chartData = @json($chartData);
                    </script>
                    <!-- chart -->
                    <div id="userChart"></div>
                    <!-- end chart -->

                </div>
                <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">

                    <!-- top -->
                    <div class="p-5 flex flex-row flex-wrap justify-between items-center">
                        <h2 class="font-bold text-lg">Grafik Tugas</h2>
                    </div>
                    <!-- end top -->
                    <script>
                        var chartDataTask = @json($chartDataTask);
                    </script>
                    <!-- chart -->
                    <div id="taskChart"></div>
                    <!-- end chart -->

                </div>
                <!-- end right -->
            </div>
        </div>
    </div>

</x-admin.layout>
