
@extends('layouts.email')


@section('title')
    {{ __('front_layout.home_name') }}
@stop


@section('content')
    <h2 class="mb-3">إشعار دفع</h2>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td >{{ $visa->client->name }} {{ $visa->client->family_name }}</td>
                            <td >مقدم الطلب</td>
                        </tr>
                        <tr>
                            <td >{{ $visa->payment->transaction_id }}</td>
                            <td >رقم المعاملة</td>
                        </tr>
                        <tr>
                            <td >{{ $visa->payment->price }}</td>
                            <td >المبلغ</td>
                        </tr>
                        <tr>
                            <td >{{ $visa->payment->created_at }}</td>
                            <td >تاريخ الدفع</td>
                        </tr>
                    </tbody>
                </table>
                <p> <a target="_blank" href="{{ route('order.info',[app()->getLocale(),$visa->oder_number]) }}" dir="ltr" style="margin:5px">{{ $visa->oder_number }}</a href="#">لمتابعة الطلب المقدم إضغط علي </p>
            </div>
        </div>
    </div>
    
    
@stop
