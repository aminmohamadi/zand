<div id="modalRole"
     class="modal-block modal-block-lg zoom-anim-dialog modal-header-color modal-block-primary modal-with-footer">
    <div class="card col-md-12">
        <form class="form theme-form" action="{{$action}}" method="post">
            <div class="card-header">
                <h5>{{$panelTitle}}</h5>
            </div>
            @csrf
            @isset($method)
                @method($method)
            @endisset
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course_title">عنوان درس</label>
                            <input class="form-control" value="{{$course->course_title}}" type="text" name="course_title" id="course_title" placeholder="عنوان درس">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course_code">کد درس</label>
                            <input class="form-control" value="{{$course->course_code}}" type="text" name="course_code" id="course_code" placeholder="کد درس">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject_code"> رشته</label>
                            <select class="form-control" name="subject_code" id="subject_code">
                                <option>انتخاب کنید</option>
                                @foreach(\App\Helpers\Constants::SUBJECTS as $key=>$item)
                                    <option value="{{$key}}" {{intval($course->subject_code) === $key ? 'selected' : ''}}>{{$item}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="professor">نام استاد</label>
                            <input class="form-control" value="{{$course->professor}}" type="text" name="professor" id="professor" placeholder="نام استاد">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="day_of_week">روز برگزاری کلاس</label>
                            <select class="form-control" name="day_of_week" id="day_of_week">
                                <option>انتخاب کنید</option>
                                @foreach(\App\Helpers\Constants::DAYS_OF_WEEK as $value)
                                    <option value="{{$value}}" {{$course->day_of_week === $value ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hour">ساعت کلاس</label>
                            <input class="form-control" value="{{$course->hour}}" type="text" name="hour" id="hour" placeholder="ساعت کلاس">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="credit">تعداد واحد ها</label>
                            <input class="form-control" value="{{$course->credit}}" type="text" name="credit" id="credit" placeholder="تعداد واحد ها">
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
