@extends('layouts.admin')

@section('title', 'Departments')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Departments
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('homeAdmin') }}"><i class="fa fa-dashboard"></i> Control Panel</a></li>
            <li class="active">Departments</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bposted table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($departments) > 0)
                                    @foreach($departments as $department)
                                        <tr>
                                            <td><a href="{{ route('departmentEmployees', $department->id) }}">{{ $department->name }}</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




