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
                    <h5 class="uppercase text-xs tracking-wider font-extrabold">Status</h5>
                    <h1 class="capitalize text-lg mt-1 mb-1">
                        $
                    </h1>
                    <p class="capitalize text-xs text-gray-500">( $<span class="num-2"></span> in the last year )
                    </p>
                </div>
            </div>
            <!-- status -->
        
        </div>
        <!-- end status -->

        <!-- congrats & summary -->
        <div class="grid grid-cols-3 lg:grid-cols-1 gap-2">
            <!-- congrats -->
            <div class="card col-span-1">

                <div class="card-body h-full flex flex-col justify-between">

                    <div>
                        <h1 class="text-lg font-bold tracking-wide">Congratulations Moe!</h1>
                        <p class="text-gray-600 mt-2">Best seller of the month</p>
                    </div>

                    <div class="flex flex-row mt-10 items-end">

                        <div class="flex-1">
                            <h1 class="font-extrabold text-4xl text-teal-400">$89k</h1>
                            <p class="mt-3 mb-4 text-xs text-gray-500">You have done 57.6% more sales today.</p>
                            <a href="#" class="btn-shadow py-3">
                                view sales
                            </a>
                        </div>

                        <div class="flex-1 ml-10 w-32 h-32 lg:w-auto lg:h-auto overflow-hidden">
                            <img class="object-cover" src="{{ asset('images/list.png') }}">
                        </div>

                    </div>

                </div>

            </div>
            <!-- end congrats -->
            <div class="card p-0 overflow-hidden col-span-2 lg:col-span-1 flex flex-row lg:flex-col">

                <!-- right -->
                <div class="border-r border-gray-200 w-2/3 lg:w-full lg:mb-5">

                    <!-- top -->
                    <div class="p-5 flex flex-row flex-wrap justify-between items-center">
                        <h2 class="font-bold text-lg">Order Summary</h2>
                        <div class="flex flex-row justify-center items-center">
                            <a href="#" class="btn mr-4 text-sm py-2 block">month</a>
                            <a href="#" class="btn-shadow text-sm py-2 block">week</a>
                        </div>
                    </div>
                    <!-- end top -->

                    <!-- chart -->
                    <div id="SummaryChart"></div>
                    <!-- end chart -->

                </div>
                <!-- end right -->

                <!-- left -->
                <div class="w-1/3 lg:w-full">

                    <!-- top -->
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="font-bold text-lg mb-6">Sales History</h2>

                        <div class="flex flex-row justify-between mb-3">
                            <div class="">
                                <h4 class="text-gray-600 font-thin">Puma Shoes</h4>
                                <p class="text-gray-400 text-xs font-hairline">30 min ago</p>
                            </div>
                            <div class="text-sm font-medium">
                                <span class="text-green-400">+</span> $250
                            </div>
                        </div>

                        <div class="flex flex-row justify-between mb-3">
                            <div class="">
                                <h4 class="text-gray-600 font-thin">Google Pixel 4 xl</h4>
                                <p class="text-gray-400 text-xs font-hairline">1 day ago</p>
                            </div>
                            <div class="text-sm font-medium">
                                <span class="text-red-400">-</span> $10
                            </div>
                        </div>

                        <div class="flex flex-row justify-between">
                            <div class="">
                                <h4 class="text-gray-600 font-thin">Nike Air Jordan</h4>
                                <p class="text-gray-400 text-xs font-hairline">2 hour ago</p>
                            </div>
                            <div class="text-sm font-medium">
                                <span class="text-red-400">-</span> $98
                            </div>
                        </div>



                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="p-5">
                        <h2 class="font-bold text-lg mb-2">Sales History</h2>
                        <strong class="text-teal-400 font-extrabold text-xl">$82,950.96</strong>

                        <div class="bg-gray-300 h-2 rounded-full mt-2 relative">
                            <div class="rounded-full bg-teal-400 h-full w-3/4 shadow-md"></div>
                        </div>
                    </div>
                    <!-- end bottom -->

                </div>
                <!-- end left -->

            </div>
        </div>
        <!-- end congrats & summary -->


    </div>

</x-admin.layout>
