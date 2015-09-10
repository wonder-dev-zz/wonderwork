@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Sous-catégories d'articles <small>Gérer vos sous-categories d'articles</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            {!! Form::open(['url' => route('subcategories.store'), 'class' => 'form-inline']) !!}

            <div class="form-group">
                {!! Form::label('subcategory', 'Nouvelle sous-categorie d\'article : ') !!}
                {!! Form::text('subcategory', null, ['class' => 'form-control']) !!}
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

                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i }}</td>
                            <td style="vertical-align: middle;">{{ $subcategory->subcategory }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-danger" href="{{ route('subcategories.destroy', $subcategory) }}" data-method="delete" data-confirm="Voulez-vous supprimer sous-categories d'article ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
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