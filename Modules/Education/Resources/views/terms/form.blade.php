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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">عنوان ترم</label>
                            <input class="form-control" value="{{$term->title}}" type="text" name="title" id="title" placeholder="عنوان ترم">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="term_start">تاریخ شروع ترم</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->term_start)->format('m/d/Y')}}" type="text" data-language="en" name="term_start" id="term_start">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="term_end">تاریخ پایان ترم</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->term_end)->format('m/d/Y')}}" type="text" data-language="en" name="term_end" id="term_end">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="take_courses_start">تاریخ شروع انتخاب واحد</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->take_courses_start)->format('m/d/Y')}}" type="text" data-language="en" name="take_courses_start" id="take_courses_start">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="take_courses_end">تاریخ پایان انتخاب واحد</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->take_courses_end)->format('m/d/Y')}}" type="text" data-language="en" name="take_courses_end" id="take_courses_end">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="drop_take_courses_start">تاریخ شروع حذف و اضاقه</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->drop_take_courses_start)->format('m/d/Y')}}" type="text" data-language="en" name="drop_take_courses_start" id="drop_take_courses_start">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="drop_take_courses_end">تاریخ پایان حذف و اضاقه</label>
                            <input class="datepicker-here form-control digits" value="{{\Carbon\Carbon::parse($term->drop_take_courses_end)->format('m/d/Y')}}" type="text" data-language="en" name="drop_take_courses_end" id="drop_take_courses_end">
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
@include('layouts.script')
