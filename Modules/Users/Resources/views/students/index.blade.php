@extends('layouts.master')
@section('title', 'مدیریت دانشجویان')

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
                        <a href="{{route('student.create')}}" class="simple-ajax-modal btn btn-outline-primary pull-left">افزودن
                            <li class="fa fa-plus"></li>
                        </a></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>رشته</th>
                                    <th>کدملی</th>
                                    <th>شماره دانشجویی</th>
                                    <th>جنسیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{\App\Helpers\Constants::SUBJECTS[$item->subject]}}</td>
                                        <td>{{$item->national_code}}</td>
                                        <td>{{$item->student_id}}</td>
                                        <td>{{\App\Helpers\Constants::GENDERS[$item->gender]}}</td>
                                        <td>
                                            <a href="{{route('student.edit',$item->id)}}" class="simple-ajax-modal btn btn-warning btn-sm"> <span class="fa fa-edit"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    data-method="delete" data-action="{{route('student.destroy',$item->id)}}" data-toggle="modal"
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

