<!DOCTYPE html>
<html lang="en" >
@include('adminNew.layout.head')

<body onload="startTime()">
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        @include('adminNew.layout.navbar')
        <div class="page-body-wrapper">
            @include('adminNew.layout.sidebar')
            <div class="page-body">
                @yield('content')
            </div>
            @include('adminNew.layout.footer')
        </div>
    </div>
    @include('adminNew.assets.script')
</body>

</html>
