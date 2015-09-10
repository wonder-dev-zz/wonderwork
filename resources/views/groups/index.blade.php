@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Familles de fournisseurs <small>Gérer vos familles de fournisseurs</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            {!! Form::open(['url' => route('groups.store'), 'class' => 'form-inline']) !!}

            <div class="form-group">
                {!! Form::label('group', 'Nouvelle famille de fournisseur : ') !!}
                {!! Form::text('group', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-plus"></i> Ajouter</button>
            </div>

            {!! Form::close() !!}

            <br/><br/>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <th>#</th>
                    <th>Nom</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach($groups as $group)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i }}</td>
                            <td style="vertical-align: middle;">{{ $group->group }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-danger" href="{{ route('groups.destroy', $group) }}" data-method="delete" data-confirm="Voulez-vous supprimer cette famille de fournisseur ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


@endsection