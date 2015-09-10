@extends('app')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">

                                {!! Form::model($provider, ['method' => 'put', 'url' => route('providers.update', $provider), 'class' => 'form-horizontal', 'id' => 'providerform']) !!}

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Fournisseurs <small>Modifier un Fournisseur </small> <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-floppy-o"></i> Enregistrer</button>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>

            @include('flash')

            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="well bs-component">

                        <div class="form-group">
                            {!! Form::label('ref', 'REF', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('ref', null, ['class' => 'form-control', 'disabled' => true]) !!}
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
                                {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="well bs-component">

                        <div class="form-group">
                            {!! Form::label('credit', 'Crédit', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('credit', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('encours', 'Encours', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('encours', null, ['class' => 'form-control', 'disabled' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mode_id', 'Mode de payement', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('mode_id', $modes, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('risque', 'Risque', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('risque', ['0' => 'Aucun', '1' => 'Faible', '2' => 'Moyen', '3' => 'Elevé'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#adresse" data-toggle="tab">Adresses</a></li>
                        <li><a href="#historique" data-toggle="tab">Articles</a></li>
                        <li><a href="#complement" data-toggle="tab">Complément</a></li>
                        <li><a href="#contacts" data-toggle="tab">Contacts</a></li>
                        <li><a href="#banque" data-toggle="tab">Banque</a></li>
                        <li><a href="#observations" data-toggle="tab">Observations</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="adresse">
                            <br/><br/>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#delivery"><i class="fa fa-fw fa-plus"></i> Ajouter une adresse</button>
                            <br/><br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @forelse($addresses as $address)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading{{ $address->titre }}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $address->titre }}" aria-controls="collapse{{ $address->titre }}">
                                                            {{ $address->titre }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $address->titre }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $address->titre }}">
                                                    <div class="panel-body">
                                                        <table>
                                                            <tr>
                                                                <td align="right"><h6>Société : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->societe }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Adresse : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->adresse }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>C.P. : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->cp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Ville : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->ville }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Pays : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->pays }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">&nbsp;&nbsp;</td>
                                                                <td>&nbsp;&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Forme juridique : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $forme[$address->forme] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Téléphone : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->tel }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Portable : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->gsm }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Fax : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $address->fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">&nbsp;&nbsp;</td>
                                                                <td>&nbsp;&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Site : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://{{ $address->site }}" target="_blank">{{ $address->site }}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Email : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:{{ $address->mail }}">{{ $address->mail }}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><a class="btn btn-danger" href="{{ route('addresses.destroy', $address) }}" data-method="delete" data-confirm="Voulez-vous supprimer cette adresse ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h4>Pas d'adresse encodée</h4>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="historique"></div>
                        <div class="tab-pane fade" id="complement">
                            <br/>
                            <fieldset>
                                <legend>Divers</legend>
                                <br/>
                                Date de création de la fiche : {{ $provider->created }} <br/><br/>
                                Date de la dernière modification de la fiche : {{ $provider->updated }} <br/><br/>
                                <div class="form-group">
                                    {!! Form::label('mode-tva', 'Mode TVA', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-3">
                                        {!! Form::select('mode-tva', ['0' => 'Local', '1' => 'CEE', '2' => 'Hors CEE', '3' => 'Suspension de taxe'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('remise', 'Remise fournisseur', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-3">
                                        {!! Form::text('remise', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane fade" id="contacts">
                            <br/><br/>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcontact"><i class="fa fa-fw fa-plus"></i> Ajouter un contact</button>
                            <br/><br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @forelse($fcontacts as $fcontact)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading{{ $fcontact->nom }}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $fcontact->nom }}" aria-controls="collapse{{ $fcontact->nom }}">
                                                            {{ $fcontact->nom }}&nbsp;&nbsp;{{ $fcontact->prenom }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $fcontact->nom }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $fcontact->nom }}">
                                                    <div class="panel-body">
                                                        <table>
                                                            <tr>
                                                                <td align="right"><h6>Fonction : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $fcontact->fonction }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Téléphone : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $fcontact->tel }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Portable : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $fcontact->gsm }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><h6>Email : </h6></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:{{ $fcontact->mail }}">{{ $fcontact->mail }}</a></td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2"><a class="btn btn-danger" href="{{ route('fcontacts.destroy', $fcontact) }}" data-method="delete" data-confirm="Voulez-vous supprimer ce contact ?"><i class="fa fa-fw fa-trash"></i> Supprimer</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h4>Pas de contacts encodée</h4>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="banque">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <br/>
                                    <fieldset>
                                        <legend>Coordonnée</legend>
                                        <div class="form-group">
                                            {!! Form::label('banque', 'Nom', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('banque', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('badresse', 'Adresse', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('badresse', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('bcp', 'C.P.', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('bcp', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('bville', 'Ville', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('bville', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('bpays', 'Pays', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('bpays', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <br/>
                                    <fieldset>
                                        <legend>Domiciliation</legend>
                                        <div class="form-group">
                                            {!! Form::label('compte', 'Compte', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('compte', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('iban', 'IBAN', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('iban', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('bic', 'BIC', ['class' => 'col-lg-2 control-label']) !!}
                                            <div class="col-lg-10">
                                                {!! Form::text('bic', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="observations">
                            <br/>
                            <fieldset>
                                <legend>Remarque</legend>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {!! Form::textarea('remarque', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}



            <!-- Modal LIVRAISON -->
            <div class="modal fade" id="delivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ajouter une adresse</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(['url' => route('addresses.store'), 'class' => 'form-horizontal']) !!}

                                    <div class="form-group">
                                        {!! Form::label('titre', 'Titre', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('titre', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('societe', 'Société', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('societe', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('adresse', 'Adresse', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('cp', 'C.P.', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('cp', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('ville', 'Ville', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('ville', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('pays', 'Pays', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('pays', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <br/><br/>
                                    <div class="form-group">
                                        {!! Form::label('forme', 'Forme juridique', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::select('forme', $forme, null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('tel', 'Téléphone', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('gsm', 'Portable', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('gsm', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fax', 'Fax', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <br/><br/>
                                    <div class="form-group">
                                        {!! Form::label('site', 'Site', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('site', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mail', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::email('mail', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    {!! Form::hidden('provider_id', $provider->id, ['class' => 'form-control']) !!}


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Enregistrer</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal CONTACT -->
            <div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ajouter un contact</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(['url' => route('fcontacts.store'), 'class' => 'form-horizontal']) !!}

                                    <div class="form-group">
                                        {!! Form::label('nom', 'Nom', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('nom', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('prenom', 'Prenom', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fonction', 'Fonction', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('fonction', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('tel', 'Téléphone', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('gsm', 'Portable', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('gsm', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mail', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('mail', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    {!! Form::hidden('provider_id', $provider->id, ['class' => 'form-control']) !!}

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Enregistrer</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>


            <script>
                $('#providerform').dirrty();
            </script>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


@endsection