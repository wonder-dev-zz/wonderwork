@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Fournisseurs <small>Ajouter un fournisseur</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            <div class="row">
                <div class="col-lg-3 col-sm-1"></div>
                <div class="col-lg-6 col-sm-10">
                    <div class="well bs-component">
                        {!! Form::open(['url' => route('providers.store'), 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('ref', 'REF', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('ref', null, ['class' => 'form-control', 'autofocus' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('denomination', 'Dénomination', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('denomination', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tva', 'N° TVA', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('tva', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('group_id', 'Famille', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('group_id', $groups, 0, ['class' => 'form-control']) !!}
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