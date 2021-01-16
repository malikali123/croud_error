@extends('layouts.admin')
@section('title','تعديل بيانات المستخدم')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.users')}}"> المستخدمين </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة مستخدم
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة مستخدم </h4>
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
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.users.update')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="form-section"></div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم الكامل  </label>
                                                            <input type="text"
                                                                   value="{{$user->name}}" id="name"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم المستخدم  "
                                                                   name="name">
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="projectinput1"> البريد الالكتروني </label>
                                                            <input type="text"
                                                                   value="{{$user->email}}"
                                                                   id="name"
                                                                   readonly
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم المستخدم  "
                                                                   name="user_email">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="projectinput1"> كلمة المرور الجديدة </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="يترك فارغ في حالة عدم تغير كلمة المرور  "
                                                                   name="new_pass">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img
                                                                class="user-photo"

                                                                src="{{asset('assets/admin/images/logo/logo.png')}}">
                                                        <div class="row mr-2 ml-2" >
                                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger m-2"
                                                                    id="type-error">
                                                                عفواً ... إمتداد الصورة غير مدعوم jpg, jpeg, png
                                                            </button>
                                                        </div>
                                                        <input class="hidden" type="file" onchange="readUrl(this);" id="photo" name="photo">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions text-center">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
