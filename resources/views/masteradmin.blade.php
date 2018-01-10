<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title></title>

    <meta name="robots" content="noindex, nofollow" />
    <base href="{{asset('')}}">
    <link rel="shortcut icon" href="source/backend/admin/images/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="source/backend/admin/crown/css/main.css" />
    <link rel="stylesheet" type="text/css" href="source/backend/admin/css/css.css" media="screen" />
    {{--<link rel="stylesheet" href="source/frontend/assets/dest/css/bootstrap.css">--}}
    <link rel="stylesheet" href="source/frontend/assets/dest/css/font-awesome.min.css">
    <script type="text/javascript">

    </script>
    <script type="text/javascript" src="source/backend/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/spinner/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/forms/uniform.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/forms/autogrowtextarea.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/tables/datatable.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/tables/tablesort.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/tables/resizable.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.tipsy.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.progress.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.colorpicker.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
    <script type="text/javascript" src="source/backend/admin/crown/js/plugins/ui/jquery.sourcerer.js"></script>

    <script type="text/javascript" src="source/backend/admin/crown/js/custom.js"></script>


    <script type="text/javascript" src="source/backend/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/scrollTo/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/number/jquery.number.min.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
    <script type="text/javascript" src="source/backend/js/jquery/zclip/jquery.zclip.js"></script>

    <script type="text/javascript" src="source/backend/js/jquery/colorbox/jquery.colorbox.js"></script>
    <link rel="stylesheet" type="text/css" href="source/backend/js/jquery/colorbox/colorbox.css" media="screen" />

    <script type="text/javascript" src="source/backend/js/custom_admin.js" type="text/javascript"></script>
</head>

<body>
@include('backend.header')
@include('backend.left')
@include('backend.footer')
@yield('contentadmin')
</body>