    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1 items-center gap-5">
                <a href="#" class="-m-1.5 p-1.5 rounded-full">
                    <span class="sr-only">Your Company</span>
                    <img class="aspect-square w-14 rounded-full" src="{{ asset('images/logo.jpg') }}" alt="">
                </a>
                <div class="relative inline-block text-left">
                    <button class="dropdown-button flex items-center font-semibold bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md focus:outline-none">
                        Filter
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" stroke="currentColor" stroke-width="2" 
                                  d="M18 4H6c-1.105 0-2.026.91-1.753 1.98a8.02 8.02 0 0 0 4.298 5.238c.823.394 1.455 1.168 1.455 2.08v6.084a1 1 0 0 0 1.447.894l2-1a1 1 0 0 0 .553-.894v-5.084c0-.912.632-1.686 1.454-2.08a8.02 8.02 0 0 0 4.3-5.238C20.025 4.91 19.103 4 18 4z"/>
                        </svg>
                    </button>
                
                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                        <ul class="py-1 text-gray-700">
                            <li>
                                <form action="{{ route('orderTasksByDate') }}" method="GET">
                                <a href="{{ route('orderTasksByDate')}}" class="block px-4 py-2 hover:bg-gray-100">Date Ascending</a>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('orderTaskByDateDesc') }}" method="GET">
                                <a href="{{ route('orderTaskByDateDesc') }}" class="block px-4 py-2 hover:bg-gray-100">Date Descending</a>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('orderTaskByPriority') }}" method="GET">
                                <a href="{{route('orderTaskByPriority')}}" class="block px-4 py-2 hover:bg-gray-100">Priority</a>
                                </fomr>
                            </li>
                        </ul>
                    </div>
                </div>
                

            </div>
            {{-- btn add task --}}
            <div class="lg:flex lg:flex-1 lg:justify-end gap-3">
                <button
                    class="rounded-full bg-emerald-600 hover:bg-emerald-700 w-28 h-10 flex justify-center items-center gap-x-2">
                    <a href="{{ route('addTask') }}" class="text-sm font-semibold leading-6 text-white">Add Task</a>
                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <g fill="white" fill-rule="evenodd">
                            <path
                                d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor"
                                d="m14.535 12.225l4.242 4.243l-4.243 4.243a1 1 0 0 1-.707.293H11a1 1 0 0 1-1-1v-2.829a1 1 0 0 1 .293-.707zM17 2a2 2 0 0 1 1.995 1.85L19 4v4.02a5 5 0 0 0-4.27 1.192l-.196.185l-5.656 5.657a3 3 0 0 0-.872 1.923l-.007.198v2.829a3 3 0 0 0 .11.804l.06.192H5a2 2 0 0 1-1.995-1.85L3 19V4a2 2 0 0 1 1.85-1.995L5 2zm3.191 8.811a3 3 0 0 1 0 4.243L15.95 10.81a3 3 0 0 1 4.242 0ZM11 6H7a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2" />
                        </g>
                    </svg>
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="rounded-full border-solid border-2 text-black border-emerald-600 hover:bg-emerald-700 hover:text-white w-28 h-10 flex justify-center items-center gap-x-2">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </header>

