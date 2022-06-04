@extends('layouts.admin')

@section('title', 'Employees')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const $tBody = this.querySelector('tbody');

            if (!$tBody.innerText) {
                location.href = '{{ route('employees.index') }}';
            }
        })
    </script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employees
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('homeAdmin') }}"><i class="fa fa-dashboard"></i> Control Panel</a></li>
            <li class="active">Employees</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <style>
                        select {
                            width: 60px;
                            height: 34px;
                        }

                        @media screen and (max-width: 1280px) {
                            .box-body {
                                overflow: hidden;
                            }

                            .box-body > div {
                                overflow: auto;
                            }
                        }
                    </style>
                    <div class="box-body" style="white-space: nowrap; display: flex">
                        <div style="display: flex;">
                            <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div style="display: flex;">
                                    <input type="file" name="file" class="form-control" style="width: 250px">
                                    <button type="submit" class="btn btn-success btnImport" title="Choose file" style="margin-left: 10px;" disabled>Import</button>
                                </div>
                            </form>
                            <a class="btn btn-warning" href="{{ route('employees.truncate') }}" style="margin-left: 10px;">Clear</a>
                        </div>
                        <div style="margin-left: 10px">
                            <select id="per_page">
                                <option value="10" <?= request('per_page') && request('per_page') == 10 ? 'selected' : '' ?>>10</option>
                                <option value="25" <?= request('per_page') && request('per_page') == 25 ? 'selected' : '' ?>>25</option>
                                <option value="50" <?= request('per_page') && request('per_page') == 50 ? 'selected' : '' ?>>50</option>
                                <option value="100" <?= request('per_page') && request('per_page') == 100 ? 'selected' : '' ?>>100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bposted table-hover">
                                <thead>
                                <tr>
                                    <th>FIO</th>
                                    <th>Birthday Date</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Type of Employee</th>
                                    <th>Work Hours</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($employees) > 0)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->fio }}</td>
                                            <td>{!! $employee->birthday_date !!}</td>
                                            <td>{{ @$employee->department->name }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>{{ ucfirst($employee->employee_type === 'rate' ? $employee->employee_type : str_replace('_', ' ', $employee->employee_type)) }}</td>
                                            <td>{{ $employee->work_hours }}</td>
                                            <td>{{ '$' . $employee->salary }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(count($employees) > 0)
                                <div class="pagination">
                                    {{ $employees->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection




