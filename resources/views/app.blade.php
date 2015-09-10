<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/pro.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('css/plugins/morris.css') }}" rel="stylesheet">

    <!-- JQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <!-- Custom Fonts -->
    <link href="{{ url('css/awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- CKEDITOR -->
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <!-- Calendar -->
    <link href="{{ url('css/responsive-calendar.css') }}" rel="stylesheet">
    <script src="{{ url('js/responsive-calendar.js') }}"></script>
    <!-- DIRTY Core Javascript -->
    <script src="{{ url('js/jquery.dirrty.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(function () {
            $(".responsive-calendar").responsiveCalendar({
                events: {
                    "<?= Carbon\Carbon::now()->toDateString(); ?>": {}}
            });
        });
    </script>
    <script>
        $(function () {

            $("#<?= $active ?>").addClass('active');

        });
    </script>


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><span class="wonder-class">Wonderwork</span></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp; {{auth()->user()->nom}} {{auth()->user()->prenom}} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('users.edit', auth()->user()->id) }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li id="dash">
                    <a href="{{ route('home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li id="list">
                    <a href="#" data-toggle="collapse" data-target="#listes"><i class="fa fa-fw fa-book"></i> Listes <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="listes" class="collapse">
                        <li>
                            <a href="{{ route('clients.index') }}">Clients</a>
                        </li>
                        <li>
                            <a href="{{ route('providers.index') }}">Fournisseurs</a>
                        </li>
                        <li>
                            <a href="#">Articles</a>
                        </li>
                    </ul>
                </li>
                <li id="sell">
                    <a href="#" data-toggle="collapse" data-target="#ventes"><i class="fa fa-fw fa-eur"></i> Ventes <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="ventes" class="collapse">
                        <li>
                            <a href="#">Devis</a>
                        </li>
                        <li>
                            <a href="#">Bons de commande</a>
                        </li>
                        <li>
                            <a href="#">Bons de livraison</a>
                        </li>
                        <li>
                            <a href="#">Factures</a>
                        </li>
                        <li>
                            <a href="#">Notes de crédit</a>
                        </li>
                    </ul>
                </li>
                <li id="users">
                    <a href="#"><i class="fa fa-fw fa-line-chart"></i> Statistiques</a>
                </li>
                <li id="setting">
                    <a href="#" data-toggle="collapse" data-target="#settings"><i class="fa fa-fw fa-gear"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="settings" class="collapse">
                        <li>
                            <a href="{{ route('users.index') }}">Utilisateurs</a>
                        </li>
                        <li>
                            <a href="{{ route('families.index') }}">Familles de clients</a>
                        </li>
                        <li>
                            <a href="{{ route('groups.index') }}">Familles de fournisseurs</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}">Catégories d'articles</a>
                        </li>
                        <li>
                            <a href="{{ route('subcategories.index') }}">Sous-catégories d'articles</a>
                        </li>
                        <li>
                            <a href="{{ route('modes.index') }}">Modes de payement</a>
                        </li>
                        <li>
                            <a href="{{ route('discounts.index') }}">Réductions client</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    @yield('content')

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ url('js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ url('js/plugins/morris/morris-data.js') }}"></script>

    <script src="{{ url('js/laravel.js') }}"></script>


</body>

</html>
