<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">
    
    @vite('resources/css/app.css')
</head>

<body class="bg-emerald-50">
    <x-user.navbar></x-user.navbar>
    @if (session('success'))
        <x-alert.success :message="session('success')"/>
    @endif
    <main class="flex flex-col items-center justify-center min-h-screen gap-y-5">
        <div class="flex flex-col items-center justify-center">
            <h1 class="font-semibold text-2xl">To Do List Maker</h1>
            <p>Welcome: {{ $user->name }}</p>
        </div>
        <x-user.card :tasks="$tasks"></x-user.card>
    </main>

    {{-- script --}}
    <script src="{{ asset('js/dropdown.js') }}"></script>
</body>

</html>
