@extends('app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Un coup d'oeil rapide !</small>
                    </h1>
                    <hr style="border-color: #cccccc;">
                </div>
            </div>
            <br/><br/>
            <!-- Responsive calendar - START -->
            <div class="responsive-calendar">
                <div class="controls">
                    <a class="pull-left" data-go="prev"><div class="btn btn-primary"><i class="fa fa-chevron-left"></i> Prev</div></a>
                    <h4><span data-head-year></span> <span data-head-month></span></h4>
                    <a class="pull-right" data-go="next"><div class="btn btn-primary">Next <i class="fa fa-chevron-right"></i></div></a>
                </div><br>
                <div class="day-headers">
                    <div class="day header">Lun.</div>
                    <div class="day header">Mar.</div>
                    <div class="day header">Mer.</div>
                    <div class="day header">Jeu.</div>
                    <div class="day header">Ven.</div>
                    <div class="day header">Sam.</div>
                    <div class="day header">Dim.</div>
                </div>
                <div class="days" data-group="days">

                </div>
            </div>
            <!-- Responsive calendar - END -->
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@endsection