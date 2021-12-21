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
    <li class="breadcrumb-item active">لیست دروس اخذ شده</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 xl-100">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">لیست دروس اخذ شده</div>
                    </div>
                    <div class="card-body">
                        @if(!$userTerms)
                            <div class="alert alert-danger">شما مجوز انتخاب واحد در این مقطع زمانی را ندارید</div>
                        @else
                           @foreach($userTerms as $term)
                               <div class="alert alert-info">{{$term->title}}</div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>عنوان درس</th>
                                        <th>کد درس</th>
                                        <th>تعداد واحد</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($term->termCourse as $course)
                                        <tr>
                                            <td>{{$course->course_title}}</td>
                                            <td>{{$course->course_code}}</td>
                                            <td>{{$course->credit}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

