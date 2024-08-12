<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Staff Register</title>
    <link rel="icon" type="image/x-icon" href="{{asset('cork-src/assets/img/favicon.ico')}}"/>
    <link href="{{asset('cork-layouts/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork-layouts/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('cork-layouts/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('cork-src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork-layouts/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork-layouts/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('cork-src/plugins/src/autocomplete/css/autoComplete.02.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('cork-src/assets/css/light/components/media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('cork-src/assets/css/dark/components/media_object.css')}}s" rel="stylesheet" type="text/css">

    <link href="{{asset('cork-src/plugins/css/light/autocomplete/css/custom-autoComplete.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork-src/plugins/css/dark/autocomplete/css/custom-autoComplete.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('cork-src/assets/css/light/pages/knowledge_base.css')}}" rel="stylesheet" type="text/css" /> 
    <link href="{{asset('cork-src/assets/css/dark/pages/knowledge_base.css')}}" rel="stylesheet" type="text/css" /> 
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->     
</head>
<body class=" layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="fq-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center order-md-0 order-1">
                                <div class="faq-header-content">
                                    <h1 class="mb-4">Staff Directory</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="faq container">

                    <div class="faq-layouting layout-spacing">

                        <div class="kb-widget-section">

                            <div class="row justify-content-center">
                                
                                @yield('content')

                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2024</span> <a target="_blank" href="">Agronat IT</a>, All rights reserved.</p>
                </div>
            </div>
            <!--  END FOOTER  -->
            
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="{{asset('cork-src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('cork-src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('cork-src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('cork-src/plugins/src/waves/waves.min.js')}}"></script>
    <script src="{{asset('cork-layouts/app.js')}}"></script>

    <script src="{{asset('cork-src/plugins/src/global/vendors.min.js')}}"></script>
    
    <script src="{{asset('cork-src/plugins/src/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('cork-src/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('cork-src/plugins/src/autocomplete/autoComplete.min.js')}}"></script>
    <script src="{{asset('cork-src/assets/js/pages/knowledge-base.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>