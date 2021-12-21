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
            <div class="row">
                {{dd($courses)}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

