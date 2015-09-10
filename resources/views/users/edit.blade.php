@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Utilisateurs <small>Modifier un utilisateur</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            <div class="row">
                <div class="col-lg-3 col-sm-1"></div>
                <div class="col-lg-6 col-sm-10">

                    @include('flash')

                        {!! Form::open(['method' => 'put', 'url' => route('users.update', $user), 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('login', 'Login', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('login', $user->login, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('pswd', 'Mot de passe', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('pswd', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('pswd_conf', 'Confirmation', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('pswd_conf', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('auth', 'Authorisation', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('auth', ['admin' => 'Admin', 'user' => 'User'], $user->auth, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <br/><br/>

                        <div class="form-group">
                            {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('nom', $user->nom, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('prenom', 'Prénom', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('prenom', $user->prenom, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('adresse', $user->adresse, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('code', 'Code postal', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('code', $user->code, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('local', 'Localité', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('local', $user->local, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mail', 'Mail', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::email('mail', $user->mail, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-floppy-o"></i> Enregistrer</button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                </div>
                <div class="col-lg-3 col-sm-1"></div>
            </div>

        </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


@endsection