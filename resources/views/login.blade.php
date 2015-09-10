<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/paper.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/awesome/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 400px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading {
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

    </style>

</head>

<div class="container">

    @include('flash')


    {!! Form::open(['class' => 'form-signin', 'url' => '/login']) !!}

        <h3 class="form-signin-heading">Identifiez-vous !</h3>

        <br/><br/>

        <label class="sr-only">Login</label>
        {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Login', 'autofocus' => true]) !!}

        <br/><br/>

        <label class="sr-only">Mot de Passe</label>
        {!! Form::password('pswd', ['class' => 'form-control', 'placeholder' => 'Mot de Passe']) !!}

        <br/><br/>

        <button class="btn btn-primary" type="submit">Valider</button>

    {!! Form::close() !!}

</div>

</body>

</html>