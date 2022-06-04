@extends('layouts.admin')

@section('title', 'Панель управління')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Panel
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('homeAdmin') }}"><i class="fa fa-dashboard"></i> Control Panel</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4 class="title-for-icon">Departments</h4>
                    </div>
                    <a href="{{ route('departments.index') }}" class="small-box-footer">Find out More<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4 class="title-for-icon">Employees</h4>
                    </div>
                    <a href="{{ route('employees.index') }}" class="small-box-footer">Find out More<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
