@extends('layouts.master')
@section('title', 'مدیریت درس ها')

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
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <form class="new-functionality" action="{{route('term.courses.sync',request('term'))}}" method="post"
                      id="formNewFunctionality">
                    @csrf
                    <div class="card info">
                        <div class="card-header">
                            <h2 class="card-title">درس های ترم</h2>
                        </div>
                        <div class="card-body has-checkbox">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-none" id="newFunctionalityTable">
                                    <thead>
                                    <tr>
                                        <th class="row-counter">
                                        </th>
                                        <th class="row-counter">ردیف</th>
                                        <th class="text-center">نام درس</th>
                                        <th class="text-center">کد درس</th>
                                        <th class="text-center">رشته</th>
                                        <th class="text-center">استاد</th>
                                        <th class="text-center">روز برگزاری</th>
                                        <th class="text-center">ساعت برگزاری</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($items)
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="row-counter">
                                                    <div class="checkbox-custom checkbox-default checkbox-inline">
                                                        <input type="checkbox" name="course[]"
                                                               id="checkAction{{$item->id}}"
                                                               value="{{$item->id}}" {{\Modules\Education\Entities\Term::find(\request('term'))->findCourse($item->id) ? 'checked' : ''}}>
                                                        <label for="checkAction{{$item->id}}"></label>
                                                    </div>
                                                </td>
                                                <td class="row-counter row-number">{{$loop->index + 1}}</td>
                                                <td class="text-center">{{$item->course_title}}</td>
                                                <td class="text-center">{{$item->course_code}}</td>
                                                <td class="text-center">{{\App\Helpers\Constants::SUBJECTS[$item->subject_code]}}</td>
                                                <td class="text-center">{{$item->professor}}</td>
                                                <td class="text-center">{{$item->day_of_week}}</td>
                                                <td class="text-center">{{$item->hour}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <div class="alert alert-info mb-none text-center">
                                                    <i class="material-icons">info_outline</i>
                                                    اطلاعاتی یافت نشد.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                            @if($items)
                                <div class="row ">
                                    <div class="col-md-12">
                                        <button type="submit" class="mt-lg btn btn-primary btn-block">ذخیره</button>

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>



@endsection
@section('script')
    <script src="{{route('/')}}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{route('/')}}/assets/js/datatable/datatables/datatable.custom.js"></script>
@endsection

