@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Clients <small>Gérer vos clients</small> <a class="btn btn-success" href="{{ route('clients.create') }}"><i class="fa fa-fw fa-plus"></i> Ajouter</a>
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

                    @forelse($clients as $client)
                        <tr>
                            <td style="vertical-align: middle;">{!! $client->ref !!}</td>
                            <td style="vertical-align: middle;">{{ $client->denomination }}</td>
                            @if($client->family_id === 0)
                                <td style="vertical-align: middle;"> - </td>
                            @else
                                <td style="vertical-align: middle;">{{ $client->family->family }}</td>
                            @endif
                            <td style="vertical-align: middle;">{{ $client->credit }}</td>
                            <td style="vertical-align: middle;">{{ $client->credit - $client->encours }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-primary" href="{{ route('clients.edit', $client) }}"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier</a>
                                <a class="btn btn-danger" href="{{ route('clients.destroy', $client) }}" data-method="delete" data-confirm="Voulez-vous supprimer ce client ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" align="center"> <p><h3>Pas de clients enregistrés</h3></p> </td>
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