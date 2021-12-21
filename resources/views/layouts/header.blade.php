<div class="page-main-header">
  <div class="main-header-right">
    <div class="main-header-left text-center">
      <div class="logo-wrapper"><a href="{{route('/')}}"><img width="100" src="{{route('/')}}/assets/images/logo/logo.png" alt=""></a></div>
    </div>
    <div class="mobile-sidebar">
      <div class="media-body text-right switch-sm">
        <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
      </div>
    </div>
    <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar">               </i></div>
    <div class="nav-right col pull-right right-menu">
      <ul class="nav-menus">
        <li><a class="d-none" href="#"></a></li>
        <li class="onhover-dropdown"> <span class="media user-header"><img class="img-fluid rounded" style="height:54px" src="{{route('/')}}/assets/images/user/9.jpg" alt=""></span>
          <ul class="onhover-show-div profile-dropdown">
              @php
              $user = \App\Helpers\Helper::user(session('guard'));
              @endphp
            <li class="gradient-primary">
              <h5 class="f-w-600 mb-0">{{$user->first_name .' ' . $user->last_name}}</h5><span>{{$user instanceof \Modules\AAA\Entities\Expert ? 'کارشناس' : 'دانشجو'}}</span>
            </li>
            <li><i data-feather="lock"> </i><a class="logout">خروج</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        <form method="post" id="logout" action="{{route('logout')}}">
            @csrf
        </form>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">
      <div class="ProfileCard-avatar"><i class="pe-7s-home"></i></div>
      <div class="ProfileCard-details">
{{--      <div class="ProfileCard-realName">{{ @name }}</div>--}}
      </div>
      </div>
    </script>
    <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
  </div>
</div>

