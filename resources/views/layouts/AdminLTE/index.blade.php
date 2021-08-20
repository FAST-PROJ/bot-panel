<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.AdminLTE._includes._head')
    </head>
    <body class="hold-transition skin-{{ \App\Models\Config::find(1)->skin }} {{ \App\Models\Config::find(1)->layout }} sidebar-mini">
        <div class="wrapper">

            @include('layouts.AdminLTE._includes._header_menu')

            @if(Auth::check())
                @include('layouts.AdminLTE._includes._sidebar_menu')
            @endif

            <div class="content-wrapper">
                <nav class="navbar navbar-static-top">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand" id="" style="color:#222d32;"><i class="fa fa-@yield('icon_page')"></i> @yield('title')</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar-collapse-2" aria-expanded="false" style="height: 1px;">
                        <ul class="nav navbar-nav">

                            @yield('page_menu')

                        </ul>
                    </div>
                </nav>

                @if(Session::has('flash_message'))

                    <div class="{{ Session::get('flash_message')['class'] }}" style="padding: 10px 20px;" id="flash_message">
                        <div style="color: #fff; display: inline-block; margin-right: 10px;">
                            {!! Session::get('flash_message')['msg'] !!}
                        </div>
                    </div>

                @endif

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">

                            @yield('content')

                        </div>
                    </div>
                </section>

            </div>

            @include('layouts.AdminLTE._includes._footer')

        </div>

        @include('layouts.AdminLTE._includes._script_footer')

    </body>
</html>