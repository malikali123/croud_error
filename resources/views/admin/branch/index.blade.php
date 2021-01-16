@extends('layouts.admin')
@section('title','وكالة مأثر |  الفروع')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <h3 class="content-header-title">  الفروع </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.emp')}}">الفروع</a>
                                </li>
                                <li class="breadcrumb-item active">  فروع الوكالة
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع  الفروع  </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
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
                                                <th> إسم الوظيفة</th>
                                                <th>تاريخ الانشاء</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($data)
                                                <?php $i = 1; ?>
                                                @foreach($data as $job)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{$job -> name}}</td>
                                                        <td>{{$job -> created_at}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.branch.edit',$job -> id)}}"
                                                                   class="btn btn-outline-info">تعديل</a>


                                                                <a 
                                                                href="{{route('admin.branch.delete',$job -> id)}}"
                                                                   class="btn delete btn-outline-danger">حذف</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset

                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert alert-block" style="direction: ltr">
                                    {{-- {{ $data->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        @if (isset($editJob))
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  تعديل الوظيفة - {{ $editJob->name }} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.branch.update')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="form-section"></div>
                                                <input name="id" value="{{ $editJob->id }}" type="hidden" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> إسم الوظيفة   </label>
                                                            <input type="text" 
                                                                value="{{ $editJob->name }}" id="name"
                                                                class="form-control"
                                                                dir="auto"
                                                                required
                                                                placeholder="ادخل اسم الوظيفة  "
                                                                name="name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    تحديث
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  إضافة وظيفة جديدة </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.branch.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="form-section"></div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> إسم الوظيفة   </label>
                                                            <input type="text" value="" id="name"
                                                                class="form-control"
                                                                dir="auto"
                                                                required
                                                                placeholder="ادخل اسم الوظيفة  "
                                                                name="name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
