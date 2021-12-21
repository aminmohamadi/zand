@extends('layouts.single')

@section('title', __('Not Found'))
@section('content')
    <div class="error-wrapper">
        <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
            <div class="error-heading">
                <h2 class="headline font-danger">404</h2>
            </div>
            <div class="col-md-8 offset-md-2">
                <p class="sub-content">صفحه ای که می خواهید به آن دسترسی پیدا کنید در حال حاضر در دسترس نیست. این ممکن است به دلیل عدم وجود صفحه یا جابجایی آن باشد.</p>
            </div>
            <div><a class="btn btn-danger-gradien btn-lg" href="{{url()->previous()}}">بازگشت به صفحه قبلی</a></div>
        </div>
    </div>
@endsection
