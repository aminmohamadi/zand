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
            <div class="col-lg-12 xl-100">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"> انتخاب واحد {{$current_term->first()->title}}</div>
                    </div>
                    <div class="card-body">
                        @if(!$term_in_take_course_time)
                            <div class="alert alert-danger">شما مجوز انتخاب واحد در این مقطع زمانی را ندارید</div>
                        @else
                            <form method="post" action="{{route('take-course.sync',$current_term->first()->id)}}">
                                @csrf
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>نام درس</th>
                                        <th>استاد</th>
                                        <th>تعداد واحد ها</th>
                                        <th>روز برگزاری کلاس</th>
                                        <th>ساعت برگزاری کلاس</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i= 0;
                                        @endphp
                                    @foreach($courses as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="course_id[]" value="{{$item->id}}" {{\App\Helpers\Helper::user(session('guard'))->hasThisCourse($item->id) ? 'checked' : ''}}>
                                            </td>
                                            <td>{{$item->course_title}}</td>
                                            <td>{{$item->professor}}</td>
                                            <td>{{$item->credit}}</td>
                                            <td>{{$item->day_of_week}}</td>
                                            <td>{{$item->hour}}</td>
                                        <tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary btn-block">ثبت</button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

