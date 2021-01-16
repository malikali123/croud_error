

@extends('layouts.email')


@section('title')
    {{ __('front_layout.home_name') }}
@stop


@section('content')
    <h2 class="mb-3"> <a target="_blank" href="{{ route('order.info',[app()->getLocale(),$visa->oder_number]) }}" dir="ltr" style="margin:5px">{{ $visa->oder_number }}</a href="#">لمتابعة الطلب المقدم إضغط علي </h2>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td style="text-align: right">{{ $visa->client->name }} {{ $visa->client->family_name }}</td>
                            <td style="text-align: left">مقدم الطلب</td>
                        </tr>
                        <tr>
                            <td style="text-align: right">{{ $visa->oder_number }}</td>
                            <td style="text-align: left">رقم طلب الفيزا</td>
                        </tr>
                        <tr>
                            <td style="text-align: right">{{ $visa->created_at }}</td>
                            <td style="text-align: left">تاريخ التقديم</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
@stop
