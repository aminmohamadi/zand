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
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('term.create')}}" class="simple-ajax-modal btn btn-outline-primary pull-left">افزودن
                            <li class="fa fa-plus"></li>
                        </a></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>زمان انتخاب واحد</th>
                                    <th>زمان حذف و اضافه</th>
                                    <th>درس های ترم</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($terms as $item)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->term_start)->format('Y/m/d')}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->term_end)->format('Y/m/d')}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->take_courses_start)->format('Y/m/d')}}
                                            تا {{\Carbon\Carbon::parse($item->take_courses_end)->format('Y/m/d')}} </td>
                                        <td>{{\Carbon\Carbon::parse($item->drop_take_courses_start)->format('Y/m/d')}}
                                            تا {{\Carbon\Carbon::parse($item->drop_take_courses_end)->format('Y/m/d')}} </td>
                                       <td><a href="{{route('term.courses',$item->id)}}">درس های ترم</a></td>
                                        <td>
                                            <a type="button" href="{{route('term.edit',$item->id)}}"
                                               class="simple-ajax-modal btn btn-warning btn-sm"> <span
                                                    class="fa fa-edit"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                   data-method="delete" data-action="{{route('term.destroy',$item->id)}}" data-toggle="modal"
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

