@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Codes de réduction client <small>Gérer vos réductions client</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            {!! Form::open(['url' => route('discounts.store'), 'class' => 'form-inline']) !!}

            <div class="form-group">
                {!! Form::label('code', 'Nouveau code de réduction client : ') !!}
                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Code de réduction']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('pourcent', null, ['class' => 'form-control', 'placeholder' => 'pourcentage']) !!}
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
                    <th>Code</th>
                    <th>Poucentage</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach($discounts as $discount)
                        <tr>
                            <td style="vertical-align: middle;">{{ $i }}</td>
                            <td style="vertical-align: middle;">{{ $discount->code }}</td>
                            <td style="vertical-align: middle;">{{ $discount->pourcent }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-danger" href="{{ route('discounts.destroy', $discount) }}" data-method="delete" data-confirm="Voulez-vous supprimer ce code de réduction client ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
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