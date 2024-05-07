<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="flex flex-col min-h-screen">
    <header class="h-20 w-full flex justify-center items-center bg-gray-300/50">
        @include('includes.header')
    </header>
    <div id="main" class="container border border-gray-400 max-w-[768px] mx-auto p-4 flex-grow flex flex-col justify-center items-center">
        @yield('content')
    </div>
    <footer class="h-20 w-full flex justify-center items-center bg-gray-500/5">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>

