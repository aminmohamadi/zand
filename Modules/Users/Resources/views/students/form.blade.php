<div id="modalRole" class="modal-block modal-block-lg zoom-anim-dialog modal-header-color modal-block-primary modal-with-footer">
    <div class="card col-md-12">
        <div class="card-header">
            <h5>کنترل فرم اصلی</h5>
        </div>
        <form class="form theme-form" action="{{$action}}" method="post">
            @csrf
            @isset($method)
                @method($method)
            @endisset
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input class="form-control" id="first_name" name="first_name"
                                   value="{{$student->first_name}}" type="text" placeholder="نام">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input class="form-control" id="last_name" name="last_name" value="{{$student->last_name}}"
                                   type="text" placeholder="نام خانوادگی">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="national_code">کدملی</label>
                            <input class="form-control" id="national_code" name="national_code"
                                   value="{{$student->national_code}}" type="text" placeholder="کدملی">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="student_id">شماره دانشجویی</label>
                            <input class="form-control" id="student_id" name="student_id"
                                   value="{{$student->student_id}}" type="text" placeholder="شماره دانشجویی">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">شماره موبایل</label>
                            <input class="form-control" id="phone" name="phone" value="{{$student->phone}}" type="text"
                                   placeholder="شماره موبایل">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject">رشته</label>
                            <select class="form-control" name="subject" id="subject">
                                <option>انتخاب کنید ...</option>
                                @foreach(\App\Helpers\Constants::SUBJECTS as $key=>$item)
                                    <option value="{{$key}}" {{$student->subject === $key ? 'selected' : ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">جنسیت</label>
                            <select class="form-control" name="gender" id="gender">
                                <option>انتخاب کنید ...</option>
                                @foreach(\App\Helpers\Constants::GENDERS as $key=>$item)
                                    <option value="{{$key}}" {{$student->gender === $key ? 'selected' : ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                <option>انتخاب کنید ...</option>
                                @foreach(\App\Helpers\Constants::STATUS as $key=>$item)
                                    <option value="{{$key}}" {{$student->status === $key ? 'selected' : ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea class="form-control" id="address" name="address" placeholder="آدرس">
                                {{$student->address}}
                            </textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer" style="padding: 10px!important;">
                <button class="btn btn-pill btn-primary" type="submit"> ارسال</button>
                <button class="btn btn-pill btn-light modal-dismiss" type="reset">کنسل</button>
            </div>
        </form>
    </div>

</div>

<script>
    $(document).ready(function () {
        if (typeof ajaxComponents !== 'undefined' && $.isFunction(ajaxComponents))
            ajaxComponents('#modalRole');
    });
</script>

