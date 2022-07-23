<!DOCTYPE html>
<html>
<head>

   @include('admin.patial._header_link')

    @stack('custom-css')


</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
   @include('admin.patial._top_bar')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        @include('admin.patial._left_side')
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @yield('main-content')
            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.patial._footer')

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->


@include('admin.patial._footer_link')

<!-- Datatables-->
@stack('datatable-scripts')


<script src="{{asset('/')}}assets/admin/pages/dashborad.js"></script>
<script src="{{asset('/')}}assets/admin/js/app.js"></script>

<script src="{{asset('assets/admin/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweetalert2@10.js')}}"></script>

{!! Toastr::message() !!}

<script type="text/javascript">
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{$error}}','Error', {closeButton:true, progressBar:true})
    @endforeach
    @endif
</script>

@stack('scripts')

</body>
</html>
