@extends('layouts.admin')
@section('title','Amaad | الموظفين')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12">
                    <h3 class="content-header-title"> الموظفين 
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.emp.create') }}" class="btn btn-success">موظف جديد </a>
                            <a target="_blank" href="{{ route('admin.emp.print') }}" class="btn btn-outline-success float-right">طباعة <i class="la la-print"></i> </a>
                        </div>
                    </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الموظفين
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع الموظفين  </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="table-responsive">
                                    <table id="basic-datatables1" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> #</th>
                                                <th> الاسم</th>
                                                <th> الفرع</th>
                                                <th>الهاتف </th>
                                                <th>البريد </th>
                                                <th> تاريخ الاضافة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($data)
                                                <?php 
                                                    $num = 1;
                                                ?>
                                                @foreach($data as $emp)
                                                    <tr>
                                                        <td>{{ $num++ }}</td>
                                                        <td>{{$emp -> full_name}}</td>
                                                        <td>{{$emp -> branch ? $emp -> branch -> name : 'بدون' }}</td>
                                                        <td>{{$emp -> phone}}</td>
                                                        <td>{{$emp -> email}}</td>
                                                        <td>{{$emp -> created_at}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.emp.edit',$emp -> id)}}"
                                                                   class="btn btn-outline-info">تعديل</a>


                                                                <a href="{{route('admin.emp.delete',$emp -> id)}}"
                                                                   class="btn delete btn-outline-danger">حذف</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
