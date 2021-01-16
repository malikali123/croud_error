@extends('layouts.admin')
@section('title',' Amaad | إضافة موظف')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.emp')}}"> الموظفين </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة موظف
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <form  action="{{route('admin.emp.store')}}"
                            method="POST"
                            enctype="multipart/form-data">
                        @csrf
                    <div class="row match-height">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=" text-center" id="basic-layout-form"> معلومات الموظف الاساسية </h4>
                                    <hr>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="full_name"> الاسم الكامل  </label>
                                                            <input type="text" value="{{ old('full_name') }}" id="full_name"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم الموظف  "
                                                                   name="full_name">
                                                            @error('full_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="branch_id"> الفرع
                                                            </label>
                                                            <select name="branch_id" id="branch_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر الفرع ">
                                                                    @if($data && $data -> count() > 0)
                                                                        @foreach($data as $job)
                                                                            <option
                                                                                {{ old('branch_id') == $job->id ? 'selected' : '' }}
                                                                                value="{{$job -> id }}">{{$job -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('branch_id')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="phone"> رقم الهاتف  </label>
                                                            <input type="text" value="{{ old('phone') }}" id="phone"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل  رقم الهاتف  "
                                                                   name="phone">
                                                            @error('phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email"> البريد الالكتروني </label>
                                                            <input type="email" value="{{ old('email') }}" id="email"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم الموظف  "
                                                                   name="email">
                                                            @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password"> كلمة المرور  </label>
                                                            <input type="text" value="{{ old('password') }}" id="password"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل  كلمة المرور  "
                                                                   name="password">
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=" text-center" id="basic-layout-form">  صورة الموظف </h4>
                                    <hr>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">


                                            <div class="form-body">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <img
                                                                class="user-photo"
                                                                style="width: 100%"

                                                                src="{{asset('assets/admin/images/logo/logo.png')}}">
                                                        <div class="row mr-2 ml-2" >
                                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger m-2"
                                                                    id="type-error">
                                                                عفواً ... إمتداد الصورة غير مدعوم jpg, jpeg, png
                                                            </button>
                                                        </div>
                                                        <input class="hidden" type="file" onchange="readUrl(this);" id="photo" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="text-center" dir="rtl">
                                             <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
