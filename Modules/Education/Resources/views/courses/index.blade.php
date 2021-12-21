@extends('layouts.master')
@section('title', 'مدیریت درس ها')

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
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('course.create')}}" class="simple-ajax-modal btn btn-outline-primary pull-left">افزودن
                            <li class="fa fa-plus"></li>
                        </a></div>
                    <div class="card-body">
                        <div class="">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>رشته</th>
                                    <th>استاد</th>
                                    <th>تعداد واحد</th>
                                    <th>روز برگزاری کلاس</th>
                                    <th>ساعت شروع کلاس</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->course_title}}</td>
                                        <td>{{\App\Helpers\Constants::SUBJECTS[$item->subject_code]}}</td>
                                        <td>{{$item->professor}}</td>
                                        <td>{{$item->credit}}</td>
                                        <td>{{$item->day_of_week}}</td>
                                        <td>{{$item->hour}}</td>
                                        <td>
                                            <a type="button" href="{{route('course.edit',$item->id)}}"
                                               class="simple-ajax-modal btn btn-warning btn-sm"> <span
                                                    class="fa fa-edit"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                   data-method="delete" data-action="{{route('course.destroy',$item->id)}}" data-toggle="modal"
                                                    data-target="#deleteItem"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


