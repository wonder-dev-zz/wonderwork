@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Fournisseurs <small>Gérer vos fournisseur</small> <a class="btn btn-success" href="{{ route('providers.create') }}"><i class="fa fa-fw fa-plus"></i> Ajouter</a>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <th>REF</th>
                    <th>Dénomination</th>
                    <th>Famille</th>
                    <th>Crédit accordé</th>
                    <th>Crédit dispo.</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @forelse($providers as $provider)
                        <tr>
                            <td style="vertical-align: middle;">{!! $provider->ref !!}</td>
                            <td style="vertical-align: middle;">{{ $provider->denomination }}</td>
                            @if($provider->group_id === 0)
                                <td style="vertical-align: middle;"> - </td>
                            @else
                                <td style="vertical-align: middle;">{{ $provider->group->group }}</td>
                            @endif
                            <td style="vertical-align: middle;">{{ $provider->credit }}</td>
                            <td style="vertical-align: middle;">{{ $provider->credit - $provider->encours }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-primary" href="{{ route('providers.edit', $provider) }}"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier</a>
                                <a class="btn btn-danger" href="{{ route('providers.destroy', $provider) }}" data-method="delete" data-confirm="Voulez-vous supprimer ce fournisseur ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" align="center"> <p><h3>Pas de fournisseurs enregistrés</h3></p> </td>
                        </tr>

                    @endforelse
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