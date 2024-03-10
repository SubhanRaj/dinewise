<!doctype html>
<html lang="en" class="html dark-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv='Expires' content='0'>
    <meta http-equiv='Pragma' content='no-cache'>
    <meta http-equiv='Cache-Control' content='no-cache'>
    <!--favicon-->

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('admin-assets/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin-assets/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/dataTable-checkboxCss.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/css/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/dselect/dselect.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/simple-lightbox/simple-lightbox.min.css') }}"> --}}
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/blitzer/jquery-ui.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/yearpicker/yearpicker.css') }}">
    @stack('title')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">


     

        @include('admin.modal')
