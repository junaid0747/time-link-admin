<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layout.metatags')
@include('admin.assets.datatables-css')
@include('admin.assets.css')
</head>
<body>
@include('admin.layout.navbar')
@include('admin.layout.sidebar')
@yield('content')
@include('admin.layout.footer')
@include('admin.assets.script')
@include('admin.assets.datatables-script')

</body>
</html>