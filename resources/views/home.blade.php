@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Tarjeta de Saldo Actual -->
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-header"><i class="material-icons">account_balance</i></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Saldo Actual</h5>
                        <p class="card-text text-center display-4">{{ $saldo }}</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Total Ingresos -->
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-header"><i class="material-icons">wallet</i></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Ingresos</h5>
                        <p class="card-text text-center display-4">{{ $total_ingresos }}</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Total Gastos -->
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-header"><i class="material-icons">store</i></div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Gastos</h5>
                        <p class="card-text text-center display-4">{{ $total_gastos }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection