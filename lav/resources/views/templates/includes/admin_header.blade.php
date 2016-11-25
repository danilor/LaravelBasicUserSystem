<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  @include("templates.includes.headercss")
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/font-awesome/{{ config("html.fontawesome_version") }}/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/ionicons/{{ config("html.ionicons_version") }}/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/admin-lte/{{config("html.adminlte_version")}}/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/admin-lte/{{config("html.adminlte_version")}}/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/js/html5shiv-{{ config("html.html5shiv_version")  }}.min.js"></script>
  <script src="/js/respond-{{config("html.respond_version")}}.min.js"></script>
  <![endif]-->
</head>