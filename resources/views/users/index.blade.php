@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Utilisateurs <small>Gérer vos utilisateurs</small> <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-fw fa-plus"></i> Ajouter</a>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>C.P</th>
                <th>Localité</th>
                <th>Tri</th>
                <th></th>
                </thead>

                <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td style="vertical-align: middle;">{!! $user->nom !!}</td>
                            <td style="vertical-align: middle;">{{ $user->prenom }}</td>
                            <td style="vertical-align: middle;">{{ $user->adresse }}</td>
                            <td style="vertical-align: middle;">{{ $user->code }}</td>
                            <td style="vertical-align: middle;">{{ $user->local }}</td>
                            <td style="vertical-align: middle;">{{ $user->tri }}</td>
                            <td style="vertical-align: middle;">
                                <a class="btn btn-primary" href="{{ route('users.edit', $user) }}"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier</a>
                                    @if($user->id === auth()->user()->id)
                                        <a class="btn btn-danger" href="" disabled><i class="fa fa-fw fa-trash"></i> Supprimer</a>
                                    @else
                                        <a class="btn btn-danger" href="{{ route('users.destroy', $user) }}" data-method="delete" data-confirm="Voulez-vous supprimer cet utilisateur ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a>
                                    @endif
                            </td>
                        </tr>
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