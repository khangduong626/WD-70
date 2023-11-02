<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.headers')
</head>
<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.sidebars.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navbars.nav')
        @yield('content')
        @include('layouts.footers')
    </main>
    @include('layouts.scripts')
</body>
</html>