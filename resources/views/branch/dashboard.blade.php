@extends('layouts.app')
@section('title','لوحة التحكم')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">

              <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-info rounded-left">
                          <i class="la la-building-o font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="info">الاصول</h5>
                          <h5 class="text-bold-400">28</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-danger rounded-left">
                          <i class="icon-user font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="danger">الموظفين</h5>
                          <h5 class="text-bold-400">{{ \App\Models\Admin::count() }}</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-success rounded-left">
                          <i class="icon-wallet font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="success">السلفيات</h5>
                          <h5 class="text-bold-400">{{ \App\Models\Admin::count() }}</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                    <div class="card-content">
                      <div class="media align-items-stretch">
                        <div class="p-2 text-center bg-warning rounded-left">
                          <i class="icon-wallet font-large-2 text-white"></i>
                        </div>
                        <div class="py-1 px-2 media-body">
                          <h5 class="warning">المرتبات</h5>
                          <?php
                              $salary = 100;
                          ?>
                          
                          <h5 class="text-bold-400">{{ $salary }}</h5>
                          <div class="progress mt-1 mb-0" style="height: 7px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                              <h4 class=" text-center">الحولات اليومية</h4>
                          </div>
                      </div>
                  </div>
                </div>
                @if (\App\Models\Admin::count() == 0 )
                <div class="row">
                  <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class=""> الاجازات القريبة </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @include('admin.includes.alerts.success')
                        @include('admin.includes.alerts.errors')

                        <div class="card-content collapse">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                  <?php 
                                      // current month vacation erned by employee .

                                      // $current = \Carbon\Carbon::now();
                                      // $data = \App\Models\Employee::
                                      // whereRaw('MONTH(assign_date) <= ?', $current->month)->
                                      // whereRaw('DAY(assign_date) > ?', $current->day)
                                      // ->whereRaw('YEAR(assign_date) < ?', $current->year)->get();

                                      // the vacation in the 30 days letter .
                                      $current = \Carbon\Carbon::now()->addDays(30);
                                      $now = \Carbon\Carbon::now();
                                      $data = \App\Models\Employee::
                                      whereBetween('vacation_date', [$now->toDateString(), $current->toDateString()])->get();
                                      // whereRaw('MONTH(vacation_date) >= ?', $current->month)->
                                      // whereDate('vacation_date', '<=',$current)->get();
                                      // where(\DB::raw('datediff(assign_date), $vecation->toDateString()') <= 30)->
                                      // whereRaw('DAY(assign_date) > ?', $current->day)
                                      // ->whereRaw('YEAR(assign_date) < ?', $current->year)->get();
                                      $num = 1;
                                      
                                      ?>
                                    <thead>
                                        <tr>
                                          <td colspan="6">
                                            <div class="block alert btn alert-success m-0">{{ $now->toDateString() }}</div> <strong>/</strong>  <div class="alert btn alert-danger m-0 block">{{ $current->toDateString() }}</div> 
                                          </td>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th> الاسم</th>
                                            <th> تاريخ التعين</th>
                                            <th>تاريخ الاجازة</th>
                                            <th> المدة المتبقية</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($data as $emp)
                                                @if ( $emp->vacations->where('end','>', $now->toDateString())->count() < 1)    
                                                <tr dir="rtl" title="{{$emp -> phone}},{{ $emp->name }} - {{$emp -> job -> name}}">
                                                    <td>{{ $num++ }}</td>
                                                    <td dir="rtl" title="{{$emp -> phone}},{{ $emp->name }} - {{$emp -> job -> name}}" >{{$emp -> name}}</td>
                                                    <td>{{$emp -> assign_date}}</td>
                                                    <td>{{ $emp -> vacation_date  }}</td>
                                                    <td>{{ $now->diffInDays( $emp -> vacation_date ) + 1 }}</td>
                                                    <td>
                                                      <?php $vacation_notics = $emp->vacation_notics->whereBetween('notic_date', [$now->toDateString(), $current->toDateString()]); ?>
                                                      @if ( $vacation_notics->count() > 0 )
                                                        @if ($vacation_notics->last() -> reply_date)
                                                            <a href="{{route('vacations.create',$vacation_notics->last() ->  emp -> id)}}"
                                                              class="btn btn-outline-warning">إضافة إجازة</a>
                                                        @else
                                                            <a href="{{route('notics.reply',$vacation_notics->last() -> id)}}"
                                                          class="btn btn-outline-success">إضافة رد</a>
                                                        @endif
                                                      @else
                                                        <a href="{{ route('notics.create',$emp -> id) }}" class="alert btn alert-info color-white">إخطار</a>                                                          
                                                      @endif
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="">  الموظفين بالاجازة السنوية </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @include('admin.includes.alerts.success')
                        @include('admin.includes.alerts.errors')

                        <div class="card-content collapse">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th> الاسم</th>
                                            <th> الوظيفة</th>
                                            <th> تاريخ التعين</th>
                                            <th>تاريخ الاجازة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach(\App\Models\Employee::all() as $emp)
                                            {{-- <tr>
                                              <td colspan="4">{{ $emp->vacations->where('end','>', $now->toDateString())  }}</td>
                                            </tr> --}}
                                            @if ( $emp->vacations->where('end','>', $now->toDateString())->count() > 0)
                                                <tr>
                                                    <td>{{$emp -> name}}</td>
                                                    <td>{{$emp -> job -> name}}</td>
                                                    <td>{{$emp -> assign_date}}</td>
                                                    <td>{{$emp -> getVecation()}}</td>
                                                </tr>
                                            @endif
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>    
                @endif 
                


                {{-- <section id="grouped-stats">
                    <div class="row">
                      <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Grouped Card Statistics</h4>
                        <p>Statistics with grouped cards, knobs and icons.</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-content">
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="card-body text-center">
                                  <div class="card-header mb-2">
                                    <span class="success">New Feedbacks</span>
                                    <h3 class="display-4 blue-grey darken-1">24,879</h3>
                                  </div>
                                  <div class="card-content">
                                    <div style="display:inline;width:150px;height:150px;"><canvas width="150" height="150"></canvas><input type="text" value="35" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#28D094" data-knob-icon="icon-note" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px; display: none;"><i class="knob-center-icon icon-note" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px;font-size: 50px;"></i></div>
                                    <ul class="list-inline clearfix mt-2">
                                      <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                                        <h1 class="blue-grey darken-1 text-bold-400">95%</h1>
                                        <span class="success"><i class="la la-caret-up"></i> Positive</span>
                                      </li>
                                      <li class="pl-2">
                                        <h1 class="blue-grey darken-1 text-bold-400">5%</h1>
                                        <span class="danger darken-2"><i class="la la-caret-down"></i> Negative</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="card-body text-center">
                                  <div class="card-header mb-2">
                                    <span class="warning darken-2">New Subscribers</span>
                                    <h3 class="display-4 blue-grey darken-1">14,962</h3>
                                  </div>
                                  <div class="card-content">
                                    <div style="display:inline;width:150px;height:150px;"><canvas width="150" height="150"></canvas><input type="text" value="56" class="knob hide-value responsive angle-offset" data-angleoffset="0" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF9149" data-knob-icon="icon-user" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px; display: none;"><i class="knob-center-icon icon-user" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px;font-size: 50px;"></i></div>
                                    <ul class="list-inline clearfix mt-2">
                                      <li>
                                        <h1 class="blue-grey darken-1 text-bold-400">1465</h1>
                                        <span class="warning darken-2"><i class="la la-user"></i> Average Monthly Subscribers</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="card-body text-center">
                                  <div class="card-header mb-2">
                                    <span class="danger">Total Users</span>
                                    <h3 class="display-4 blue-grey darken-1">76,894</h3>
                                  </div>
                                  <div class="card-content">
                                    <div style="display:inline;width:150px;height:150px;"><canvas width="150" height="150"></canvas><input type="text" value="75" class="knob hide-value responsive angle-offset" data-angleoffset="20" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF4961" data-knob-icon="icon-users" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px; display: none;"><i class="knob-center-icon icon-users" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; appearance: none; margin-right: -114px;font-size: 50px;"></i></div>
                                    <ul class="list-inline clearfix mt-2">
                                      <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                                        <h1 class="blue-grey darken-1 text-bold-400">24%</h1>
                                        <span class="success"><i class="icon-male"></i> Male</span>
                                      </li>
                                      <li class="pl-2">
                                        <h1 class="blue-grey darken-1 text-bold-400">76%</h1>
                                        <span class="danger darken-2"><i class="icon-female"></i> Female</span>
                                      </li>
                                    </ul>
                                  </div>
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
                          <div class="card-content">
                            <div class="row">
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="p-1 text-center">
                                  <div>
                                    <h3 class="display-4 blue-grey darken-1">34,879</h3>
                                    <span class="blue-grey darken-1">Total Likes</span>
                                  </div>
                                  <div class="card-content">
                                    <div id="morris-likes" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="294" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.140625px; top: -0.546875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#54d5a7" stroke="none" d="M25,32.5C29.35681718169372,33.125,38.07045154508116,33.4375,42.427268726774884,35C46.784085908468604,36.5625,55.49772027185605,44.53125,59.854537453549774,45C64.2113546352435,45.46875,72.92498899863094,38.593963748290015,77.28180618032466,38.75C81.65055984744768,38.906463748290015,90.38806718169373,45.78060875512996,94.75682084881674,46.25C99.11363803051046,46.71810875512996,107.82727239389791,43.75,112.18408957559163,42.5C116.54090675728534,41.25,125.2545411206728,36.875,129.6113583023665,36.25C133.96817548406023,35.625,142.6818098474477,37.81207250341998,147.03862702914142,37.5C151.40738069626445,37.18707250341997,160.14488803051046,33.593536251709985,164.5136416976335,33.75C168.8704588793272,33.906036251709985,177.58409324271466,38.90625,181.94091042440837,38.75C186.2977276061021,38.59375,195.01136196948954,32.8125,199.36817915118326,32.5C203.72499633287697,32.1875,212.43863069626445,36.56207250341998,216.79544787795817,36.25C221.1642015450812,35.93707250341997,229.9017088793272,31.408173734610124,234.27046254645023,30C238.62727972814395,28.595673734610124,247.3409140915314,24.84375,251.69773127322512,25C256.05454845491886,25.15625,264.7681828183063,29.6875,269.125,31.25L269.125,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#28d094" d="M25,32.5C29.35681718169372,33.125,38.07045154508116,33.4375,42.427268726774884,35C46.784085908468604,36.5625,55.49772027185605,44.53125,59.854537453549774,45C64.2113546352435,45.46875,72.92498899863094,38.593963748290015,77.28180618032466,38.75C81.65055984744768,38.906463748290015,90.38806718169373,45.78060875512996,94.75682084881674,46.25C99.11363803051046,46.71810875512996,107.82727239389791,43.75,112.18408957559163,42.5C116.54090675728534,41.25,125.2545411206728,36.875,129.6113583023665,36.25C133.96817548406023,35.625,142.6818098474477,37.81207250341998,147.03862702914142,37.5C151.40738069626445,37.18707250341997,160.14488803051046,33.593536251709985,164.5136416976335,33.75C168.8704588793272,33.906036251709985,177.58409324271466,38.90625,181.94091042440837,38.75C186.2977276061021,38.59375,195.01136196948954,32.8125,199.36817915118326,32.5C203.72499633287697,32.1875,212.43863069626445,36.56207250341998,216.79544787795817,36.25C221.1642015450812,35.93707250341997,229.9017088793272,31.408173734610124,234.27046254645023,30C238.62727972814395,28.595673734610124,247.3409140915314,24.84375,251.69773127322512,25C256.05454845491886,25.15625,264.7681828183063,29.6875,269.125,31.25" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="32.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="42.427268726774884" cy="35" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="59.854537453549774" cy="45" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="77.28180618032466" cy="38.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="94.75682084881674" cy="46.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="112.18408957559163" cy="42.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="129.6113583023665" cy="36.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.03862702914142" cy="37.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="164.5136416976335" cy="33.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="181.94091042440837" cy="38.75" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="199.36817915118326" cy="32.5" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="216.79544787795817" cy="36.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="234.27046254645023" cy="30" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="251.69773127322512" cy="25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="269.125" cy="31.25" r="0" fill="#28d094" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                                    <ul class="list-inline clearfix">
                                      <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                                        <h1 class="success text-bold-400">4789</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Per Post</span>
                                      </li>
                                      <li class="pl-2">
                                        <h1 class="success text-bold-400">389</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Today</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="p-1 text-center">
                                  <div>
                                    <h3 class="display-4 blue-grey darken-1">14,962</h3>
                                    <span class="blue-grey darken-1">Total Comments</span>
                                  </div>
                                  <div class="card-content">
                                    <div id="morris-comments" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="294" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.015625px; top: -0.546875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#f9b094" stroke="none" d="M25,31.25C29.35681718169372,29.6875,38.07045154508116,25.15625,42.427268726774884,25C46.784085908468604,24.84375,55.49772027185605,28.59375,59.854537453549774,30C64.2113546352435,31.40625,72.92498899863094,35.93792749658003,77.28180618032466,36.25C81.65055984744768,36.56292749658003,90.38806718169373,32.18707250341997,94.75682084881674,32.5C99.11363803051046,32.81207250341997,107.82727239389791,38.59375,112.18408957559163,38.75C116.54090675728534,38.90625,125.2545411206728,33.90625,129.6113583023665,33.75C133.96817548406023,33.59375,142.6818098474477,37.18792749658002,147.03862702914142,37.5C151.40738069626445,37.81292749658003,160.14488803051046,35.624145006839946,164.5136416976335,36.25C168.8704588793272,36.874145006839946,177.58409324271466,41.25,181.94091042440837,42.5C186.2977276061021,43.75,195.01136196948954,46.71875,199.36817915118326,46.25C203.72499633287697,45.78125,212.43863069626445,38.906036251709985,216.79544787795817,38.75C221.1642015450812,38.593536251709985,229.9017088793272,45.46939124487004,234.27046254645023,45C238.62727972814395,44.53189124487004,247.3409140915314,36.5625,251.69773127322512,35C256.05454845491886,33.4375,264.7681828183063,33.125,269.125,32.5L269.125,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#ff7d4d" d="M25,31.25C29.35681718169372,29.6875,38.07045154508116,25.15625,42.427268726774884,25C46.784085908468604,24.84375,55.49772027185605,28.59375,59.854537453549774,30C64.2113546352435,31.40625,72.92498899863094,35.93792749658003,77.28180618032466,36.25C81.65055984744768,36.56292749658003,90.38806718169373,32.18707250341997,94.75682084881674,32.5C99.11363803051046,32.81207250341997,107.82727239389791,38.59375,112.18408957559163,38.75C116.54090675728534,38.90625,125.2545411206728,33.90625,129.6113583023665,33.75C133.96817548406023,33.59375,142.6818098474477,37.18792749658002,147.03862702914142,37.5C151.40738069626445,37.81292749658003,160.14488803051046,35.624145006839946,164.5136416976335,36.25C168.8704588793272,36.874145006839946,177.58409324271466,41.25,181.94091042440837,42.5C186.2977276061021,43.75,195.01136196948954,46.71875,199.36817915118326,46.25C203.72499633287697,45.78125,212.43863069626445,38.906036251709985,216.79544787795817,38.75C221.1642015450812,38.593536251709985,229.9017088793272,45.46939124487004,234.27046254645023,45C238.62727972814395,44.53189124487004,247.3409140915314,36.5625,251.69773127322512,35C256.05454845491886,33.4375,264.7681828183063,33.125,269.125,32.5" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="31.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="42.427268726774884" cy="25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="59.854537453549774" cy="30" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="77.28180618032466" cy="36.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="94.75682084881674" cy="32.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="112.18408957559163" cy="38.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="129.6113583023665" cy="33.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.03862702914142" cy="37.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="164.5136416976335" cy="36.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="181.94091042440837" cy="42.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="199.36817915118326" cy="46.25" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="216.79544787795817" cy="38.75" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="234.27046254645023" cy="45" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="251.69773127322512" cy="35" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="269.125" cy="32.5" r="0" fill="#ff7d4d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                                    <ul class="list-inline clearfix">
                                      <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                                        <h1 class="warning text-bold-400">147</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Per Post</span>
                                      </li>
                                      <li class="pl-2">
                                        <h1 class="warning text-bold-400">54</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Today</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                <div class="p-1 text-center">
                                  <div>
                                    <h3 class="display-4 blue-grey darken-1">76,894</h3>
                                    <span class="blue-grey darken-1">Total Views</span>
                                  </div>
                                  <div class="card-content">
                                    <div id="morris-views" style="height: 75px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="75" version="1.1" width="294" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.890625px; top: -0.546875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="#f88b97" stroke="none" d="M25,32.5C29.35681718169372,33.125,38.07045154508116,33.4375,42.427268726774884,35C46.784085908468604,36.5625,55.49772027185605,44.53125,59.854537453549774,45C64.2113546352435,45.46875,72.92498899863094,38.593963748290015,77.28180618032466,38.75C81.65055984744768,38.906463748290015,90.38806718169373,45.78060875512996,94.75682084881674,46.25C99.11363803051046,46.71810875512996,107.82727239389791,43.75,112.18408957559163,42.5C116.54090675728534,41.25,125.2545411206728,36.875,129.6113583023665,36.25C133.96817548406023,35.625,142.6818098474477,37.81207250341998,147.03862702914142,37.5C151.40738069626445,37.18707250341997,160.14488803051046,33.593536251709985,164.5136416976335,33.75C168.8704588793272,33.906036251709985,177.58409324271466,38.90625,181.94091042440837,38.75C186.2977276061021,38.59375,195.01136196948954,32.8125,199.36817915118326,32.5C203.72499633287697,32.1875,212.43863069626445,36.56207250341998,216.79544787795817,36.25C221.1642015450812,35.93707250341997,229.9017088793272,31.408173734610124,234.27046254645023,30C238.62727972814395,28.595673734610124,247.3409140915314,24.84375,251.69773127322512,25C256.05454845491886,25.15625,264.7681828183063,29.6875,269.125,31.25L269.125,50L25,50Z" fill-opacity="0.1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.1;"></path><path fill="none" stroke="#ff4558" d="M25,32.5C29.35681718169372,33.125,38.07045154508116,33.4375,42.427268726774884,35C46.784085908468604,36.5625,55.49772027185605,44.53125,59.854537453549774,45C64.2113546352435,45.46875,72.92498899863094,38.593963748290015,77.28180618032466,38.75C81.65055984744768,38.906463748290015,90.38806718169373,45.78060875512996,94.75682084881674,46.25C99.11363803051046,46.71810875512996,107.82727239389791,43.75,112.18408957559163,42.5C116.54090675728534,41.25,125.2545411206728,36.875,129.6113583023665,36.25C133.96817548406023,35.625,142.6818098474477,37.81207250341998,147.03862702914142,37.5C151.40738069626445,37.18707250341997,160.14488803051046,33.593536251709985,164.5136416976335,33.75C168.8704588793272,33.906036251709985,177.58409324271466,38.90625,181.94091042440837,38.75C186.2977276061021,38.59375,195.01136196948954,32.8125,199.36817915118326,32.5C203.72499633287697,32.1875,212.43863069626445,36.56207250341998,216.79544787795817,36.25C221.1642015450812,35.93707250341997,229.9017088793272,31.408173734610124,234.27046254645023,30C238.62727972814395,28.595673734610124,247.3409140915314,24.84375,251.69773127322512,25C256.05454845491886,25.15625,264.7681828183063,29.6875,269.125,31.25" stroke-width="2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="25" cy="32.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="42.427268726774884" cy="35" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="59.854537453549774" cy="45" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="77.28180618032466" cy="38.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="94.75682084881674" cy="46.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="112.18408957559163" cy="42.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="129.6113583023665" cy="36.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="147.03862702914142" cy="37.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="164.5136416976335" cy="33.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="181.94091042440837" cy="38.75" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="199.36817915118326" cy="32.5" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="216.79544787795817" cy="36.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="234.27046254645023" cy="30" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="251.69773127322512" cy="25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="269.125" cy="31.25" r="0" fill="#ff4558" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
                                    <ul class="list-inline clearfix">
                                      <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                                        <h1 class="danger text-bold-400">6897</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-up"></i> Per Post</span>
                                      </li>
                                      <li class="pl-2">
                                        <h1 class="danger text-bold-400">498</h1>
                                        <span class="blue-grey darken-1"><i class="la la-caret-down"></i> Today</span>
                                      </li>
                                    </ul>
                                  </div>
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
                          <div class="card-content">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="media d-flex p-2">
                                    <div class="align-self-center">
                                      <i class="icon-camera font-large-1 blue-grey d-block mb-1"></i>
                                      <span class="text-muted text-right">Products</span>
                                    </div>
                                    <div class="media-body text-right">
                                      <span class="font-large-2 text-bold-300 info">579</span>
                                    </div>
                                  </div>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="media d-flex p-2">
                                    <div class="align-self-center">
                                      <i class="icon-user font-large-1 blue-grey d-block mb-1"></i>
                                      <span class="text-muted text-right">New Clients</span>
                                    </div>
                                    <div class="media-body text-right">
                                      <span class="font-large-2 text-bold-300 danger">423</span>
                                    </div>
                                  </div>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="media d-flex p-2">
                                    <div class="align-self-center">
                                      <i class="icon-bulb font-large-1 blue-grey d-block mb-1"></i>
                                      <span class="text-muted text-right">Conversion Rate</span>
                                    </div>
                                    <div class="media-body text-right">
                                      <span class="font-large-2 text-bold-300 success">61%</span>
                                    </div>
                                  </div>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                  <div class="media d-flex p-2">
                                    <div class="align-self-center">
                                      <i class="icon-wallet font-large-1 blue-grey d-block mb-1"></i>
                                      <span class="text-muted text-right">Sales</span>
                                    </div>
                                    <div class="media-body text-right">
                                      <span class="font-large-2 text-bold-300 warning">$687</span>
                                    </div>
                                  </div>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
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
                          <div class="card-content">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300">589</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Products</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300">765</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Clients</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300">693</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Orders</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300">946</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Visitors</span>
                                  </div>
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
                          <div class="card-content">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300 info">589</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Products</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300 danger">765</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Clients</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 border-right-blue-grey border-right-lighten-5">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300 success">693</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Orders</span>
                                  </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                  <div class="float-left pl-2">
                                    <span class="font-large-3 text-bold-300 warning">946</span>
                                  </div>
                                  <div class="float-left mt-2 ml-1">
                                    <span class="blue-grey darken-1 block">New</span>
                                    <span class="blue-grey darken-1 block">Visitors</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="card bg-gradient-x-info">
                          <div class="card-content">
                            <div class="row">
                              <div class="col-lg-3 col-sm-12 border-right-info border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-camera font-large-2"></i> 1579</h1>
                                  <span class="text-white">Products</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-info border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-user font-large-2"></i> 1423</h1>
                                  <span class="text-white">New Clients</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-info border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-bulb font-large-2"></i> 61%</h1>
                                  <span class="text-white">Conversion Rate</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-wallet font-large-2"></i> $687</h1>
                                  <span class="text-white">Sales</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="card bg-gradient-x-danger">
                          <div class="card-content">
                            <div class="row">
                              <div class="col-lg-3 col-sm-12 border-right-danger border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-camera font-large-2"></i> 1579</h1>
                                  <span class="text-white">Products</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-danger border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-user font-large-2"></i> 1423</h1>
                                  <span class="text-white">New Clients</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-danger border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-bulb font-large-2"></i> 61%</h1>
                                  <span class="text-white">Conversion Rate</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-wallet font-large-2"></i> $687</h1>
                                  <span class="text-white">Sales</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="card bg-gradient-x-success">
                          <div class="card-content">
                            <div class="row">
                              <div class="col-lg-3 col-sm-12 border-right-success border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-camera font-large-2"></i> 1579</h1>
                                  <span class="text-white">Products</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-success border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-user font-large-2"></i> 1423</h1>
                                  <span class="text-white">New Clients</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12 border-right-success border-right-lighten-3">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-bulb font-large-2"></i> 61%</h1>
                                  <span class="text-white">Conversion Rate</span>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-12">
                                <div class="card-body text-center">
                                  <h1 class="display-4 text-white"><i class="icon-wallet font-large-2"></i> $687</h1>
                                  <span class="text-white">Sales</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </section> --}}
                
            </div>
        </div>
    </div>
@endsection
