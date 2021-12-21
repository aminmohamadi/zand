@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('content')
    <div class="error-wrapper">
        <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
            <div class="error-heading">
                <h2 class="headline font-danger">503</h2>
            </div>
            <div class="col-md-8 offset-md-2">
                <p class="sub-content">سرور در دسترس نیست. لطفا چند دیگر امتحان کنید.</p>
            </div>
            <div><a class="btn btn-danger-gradien btn-lg" href="{{url()->previous()}}">بازگشت به صفحه قبلی</a></div>
        </div>
    </div>
@endsection
