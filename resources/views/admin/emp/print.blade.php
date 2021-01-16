@extends('layouts.print')
@section('title','_')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            @include('admin.includes.print')
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">جميع الموظفين بالشركة </h4>
                            </div>

                            <div class="card-content collapse show">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th> الوظيفة</th>
                                                <th>الهاتف </th>
                                                <th>البريد </th>
                                                <th> تاريخ التعين</th>
                                                <th>تاريخ الاجازة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($data)
                                                @foreach($data as $emp)
                                                    <tr>
                                                        <td>{{$emp -> name}}</td>
                                                        <td>{{$emp -> job -> name}}</td>
                                                        <td>{{$emp -> phone}}</td>
                                                        <td>{{$emp -> email}}</td>
                                                        <td>{{$emp -> assign_date}}</td>
                                                        <td>{{$emp -> vacation_date }}</td>
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
