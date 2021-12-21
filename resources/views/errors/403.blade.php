@extends('layouts.single')

@section('title', __('Forbidden'))
@section('content')
    <div class="error-wrapper">
        <div class="container"><img class="img-100" src="../assets/images/other-images/sad.png" alt="">
            <div class="error-heading">
                <h2 class="headline font-primary">403</h2>
            </div>
            <div class="col-md-8 offset-md-2">
                <p class="sub-content">این صفحه ممکن است وجود نداشته باشد یه شما قادر به دیدن آن نباشید</p>
            </div>
            <div><a class="btn btn-primary-gradien btn-lg" href="{{url()->previous()}}">بازگشت به صفحه قبلی</a></div>
        </div>
    </div>

@endsection
