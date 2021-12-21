@extends('layouts.master')
@section('title', 'صفحه اصلی')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2><span>داشبورد </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">داشبورد</li>
    <li class="breadcrumb-item active">صفحه اصلی</li>
@endsection

@section('content')
    @if(isset($current_term))
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 xl-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                لیست دروس گرفته شده در {{$current_term->first()->title}}
                            </div>
                        </div>
                        <div class="card-body">
                            @if($token_courses->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ردیف</th>
                                        <th scope="col">نام درس</th>
                                        <th scope="col">نام استاد</th>
                                        <th scope="col">روز برگزاری کلاس</th>
                                        <th scope="col">ساعت برگزاری کلاس</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($token_courses as $item)
                                        <tr>
                                            <th>{{$loop->index + 1}}</th>
                                            <td>{{$item->course_title}}</td>
                                            <td>{{$item->professor}}</td>
                                            <td>{{$item->day_of_week}}</td>
                                            <td>{{$item->hour}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning">موردی برای نمایش وجود ندارد</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 xl-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">

                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
@endsection

