@extends('layouts.app')
@section('title',' Alandalos | إضافة حوالة')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> التحويلات </a>
                                </li>
                                <li class="breadcrumb-item active">إضافة حوالة
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <form action="{{route('branch.transfer.store')}}"
                          method="POST"
                          enctype="multipart/form-data">


                        @csrf
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class=" text-center" id="basic-layout-form"> معلومات الحوالة الاساسية </h4>
                                        <hr>
                                    </div>
                                    @include('branch.includes.alerts.success')
                                    @include('branch.includes.alerts.errors')
                                    <div class="card-content collapse show">
                                        <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="sender_name"> اسم المرسل الكامل </label>
                                                            <input type="text" value="{{ old('sender_name') }}"
                                                                   id="sender_name"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم المرسل  "
                                                                   name="sender_name">
                                                            @error('sender_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient_name"> اسم المستلم الكامل </label>
                                                            <input type="text" value="{{ old('recipient_name') }}"
                                                                   id="recipient_name"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل اسم المستلم  "
                                                                   name="recipient_name">
                                                            @error('recipient_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="phone"> رقم الهاتف </label>
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
                                                            <label for="amount"> المبلغ </label>
                                                            <input type="text" value="{{ old('amount') }}" id="amount"
                                                                   class="form-control"
                                                                   required
                                                                   placeholder="ادخل  المبلغ "
                                                                   name="amount">
                                                            @error('amount')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="branch_id"> الفرع
                                                            </label>
                                                            <select name="branch_id" id="branch_id"
                                                                    class="select2 form-control">
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
