@component('layouts.single')
@section('title', 'ناحیه ورود کاربران')

@section('style')
@endsection


@section('content')
    <div class="authentication-main">
        <div class="row">
            <div class="col-md-12">
                <div class="auth-innerright">
                    <div class="authentication-box">
                        <div class="card-body p-0">
                            <div class="cont text-center">
                                <div>
                                    <form class="theme-form" method="post" action="{{route('login')}}">
                                        @csrf
                                        <h4>وارد شدن</h4>
                                        <h6>نام کاربری و رمز عبور خود را وارد کنید</h6>
                                        <div class="form-group">
                                            <label for="username" class="col-form-label pt-0">نام کاربری</label>
                                            <input name="username" id="username" class="form-control" type="text" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">رمزعبور</label>
                                            <input name="password" id="password" class="form-control" type="password" required="">
                                        </div>
                                        <div class="checkbox p-0">
                                            <input id="remember" type="checkbox" name="remember">
                                            <label for="remember">مرا به خاطر بسپار</label>
                                        </div>
                                        <div class="form-group form-row mt-3 mb-0">
                                            <button class="btn btn-primary btn-block" type="submit">وارد شدن</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="social mt-3">
                                            <div class="">
                                               <div class="alert alert-warning">
                                                   دانشجویان به ابتدای نام کاربری خود حرف <span dir="rtl">s</span> را اضافه نمایند
                                               </div>
                                                <div class="alert alert-danger">
                                                    کارشناسان به ابتدای نام کاربری خود حرف<span dir="rtl"> e </span>را اضافه نمایند
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="sub-cont">
                                    <div class="img">
                                        <div class="img__text m--up">
                                        </div>
                                        <div class="img__text m--in">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection


@endcomponent
