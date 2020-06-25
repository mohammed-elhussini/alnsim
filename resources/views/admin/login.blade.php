<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link rel="stylesheet"
          type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/icons/icomoon/styles.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap_limitless.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/layout.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.min.css')}}" >
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/ui/perfect_scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/layout_fixed_sidebar_custom.js')}}"></script>

    <!-- /core JS files -->


    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/icons/icomoon/styles.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap_limitless.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/layout.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.min.css')}}" >
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src=".{{asset('admin/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('admin/js/app.js')}}"></script>
    <!-- /theme JS files -->

    @yield('style')


</head>
<body>

@include('admin.partials.alert')
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <form class="login-form"
                  method="post"
                  action="{{url('dashboard/login')}}">
                @csrf
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Login to your account</h5>
                            <span class="d-block text-muted">Enter your credentials below</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   placeholder="email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password"
                                   class="form-control"
                                   name="password"
                                   placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-primary btn-block">
                                Sign in
                                <i class="icon-circle-left2 ml-2"></i>
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
