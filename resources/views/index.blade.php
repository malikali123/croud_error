@extends('layouts.site')
@section('title')
    وكالة الاندلس لتحويل الاموال
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class=" text-center">وكالة الاندلس لحوالات المالية</h4>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-info rounded-left">
                            <i class="la la-building-o font-large-2 text-white"></i>
                            </div>
                            <div class="py-1 px-2 media-body">
                            <h5 class="info">عدد الفروع</h5>
                            <h5 class="text-bold-400">{{ \App\Models\Branch::count() }}</h5>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-danger rounded-left">
                            <i class="icon-user font-large-2 text-white"></i>
                            </div>
                            <div class="py-1 px-2 media-body">
                            <h5 class="danger">عدد الموظفين</h5>
                            <h5 class="text-bold-400">{{ \App\Models\Employee::count() }}</h5>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class=" text-center">سجل دخولك الان</h4>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                    <a href="{{ route('get.admin.login') }}" class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-warning rounded-left">
                            <i class="la la-user-secret font-large-2 text-white"></i>
                            </div>
                            <div class="py-1 px-2 media-body">
                            <h2 class="warning">جانب الادارة</h2>
                            <h5 class="text-bold-400">خاص بالادارة فقط</h5>
                            
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12">
                    <a href="{{ route('login') }}" class="card">
                        <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-success rounded-left">
                            <i class="icon-user font-large-2 text-white"></i>
                            </div>
                            <div class="py-1 px-2 media-body">
                            <h5 class="success">جانب الموظفين</h5>
                            <h5 class="text-bold-400">سجل دخول لإدارة الفرع الخاص بك من هنا .</h5>
                            
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>
                </div>
    
                
                
            </div>
        </div>
    </div>
@endsection
