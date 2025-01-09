<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-emerald-50">

    <div class="flex justify-center items-center max-h-screen h-screen">
        <div class="bg-emerald-700 h-auto w-80 md:w-1/2 max-2/4 p-5 px-10 py-8 rounded-md">
            @if (session('warning'))
                <x-alert.warning :message="session('warning')" />
            @endif
            <div>
                <h1 class="text-white text-center font-medium text-2xl pb-1">Login</h1>
                <p class="text-white text-center font-light mb-1">Masuk kembali dengan akun yang sudah Anda daftarkan
                </p>
            </div>
            <hr>
            <form action="{{ route('submitLogin') }}" method="POST" class="pt-5 text-gray-900">
                @csrf
                <div class="mb-5 mt-5">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                                d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path
                                d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="email" name="email" id="email" class="grow" placeholder="Email"
                            autocomplete="off" required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="password" name="password" id="password" class="grow" placeholder="Password"
                            autocomplete="off" required minlength="3" />
                    </label>
                </div>
                <div class="mb-3 text-center pt-3">
                    <button type="submit"
                        class="bg-emerald-50 hover:bg-emerald-100 px-4 py-1 rounded-md font-normal text-gray-900">Login</button>
                    <p class="text-white pt-3 font-thin">Don't have an account? <a
                            href="{{ route('showRegistration') }}" class="hover:underline">Register</a></p>
                </div>
                <div class="flex justify-center ">
                    <div class="mb-3 w-1/2">
                        <label class="input input-bordered flex items-center justify-center gap-2">
                            <a href="{{ route('redirectToGoogle') }}" class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 48 48">
                                    <path fill="#ffc107"
                                        d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917" />
                                    <path fill="#ff3d00"
                                        d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691" />
                                    <path fill="#4caf50"
                                        d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.9 11.9 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44" />
                                    <path fill="#1976d2"
                                        d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917" />
                                </svg>
                                <span class="font-semibold">Continue with Google</span> 
                            </a>
                        </label>
                    </div>
                </div>
            </form>


            {{-- <a href="{{ route('redirectToGoogle') }}" class="btn btn-primary"> Login with Google </a> --}}
        </div>
    </div>
</body>

</html>
