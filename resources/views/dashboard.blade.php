<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite("resources/css/app.css")
</head>
<body>
<div class="w-full h-screen bg-[#F8FAFC] flex">

    <header class="w-full h-12 bg-white shadow-lg flex justify-between items-center">
        <ul class="flex items-center">
            <li class="w-full bg-[#F1F3F5] text-center mx-3 p-2 rounded-2xl"><a href={{ route("images") }}>Dashboard</a></li>
            @if(Auth::user()->hasRole(\App\Enums\RolesEnum::SUPER_ADMIN->value))
                <li class="w-full bg-[#F1F3F5] text-center mx-3 p-2 rounded-2xl"><a href={{ route("users") }}>Users</a></li>
            @endif
            @if(Auth::user()->hasRole(\App\Enums\RolesEnum::ADMIN->value))
                <li class="w-full bg-[#F1F3F5] text-center mx-3 p-2 rounded-2xl"><a href={{ route("users") }}>Users</a></li>
            @endif
        </ul>
        <h2 class="mr-10">{{ Auth::user()->name }}</h2>
    </header>
</div>
</body>
</html>
