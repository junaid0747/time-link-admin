<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')
<body>
@include('admin.layout.navbar')
@include('admin.layout.sidebar')
@yield('content')
@include('admin.layout.footer')
@include('admin.assets.script')
</body>
</html>