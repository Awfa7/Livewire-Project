<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:styles />
    <livewire:scripts />

</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-between px-4 bg-indigo-500 text-white">
        <div class="py-4">
            <a class="mx-3 py-4 px-6 {{ request()->routeIs('home') ? 'bg-indigo-600' : '' }}" href="/">Home</a>
            @auth
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('comment-ticket') ? 'bg-indigo-600' : '' }}"
                    href="/comment-ticket">Comment-Ticket</a>
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('counter') ? 'bg-indigo-600' : '' }}"
                    href="/counter">Counter</a>
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('calculator') ? 'bg-indigo-600' : '' }}"
                    href="/calculator">Calculator</a>
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('todoList') ? 'bg-indigo-600' : '' }}"
                    href="/todoList">TodoList</a>
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('cascading-dropdown') ? 'bg-indigo-600' : '' }}"
                    href="/cascading-dropdown">Cascading dropdown</a>
                <a class="mx-3 py-4 px-6 {{ request()->routeIs('products') ? 'bg-indigo-600' : '' }}"
                    href="/products">Product Search</a>
            @endauth
        </div>

        @auth
            <livewire:logout />
        @endauth
        @guest
            <div class="py-4">
                <a class="mx-3" href="/login">Login</a>
                <a class="mx-3" href="/register">Register</a>
            </div>
        @endguest
    </div>
    <div class="my-10 w-full flex justify-center">
        {{ $slot }}
    </div>


</body>

</html>
