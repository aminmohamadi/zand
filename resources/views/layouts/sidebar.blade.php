<div class="iconsidebar-menu">
   <div class="sidebar">
       @php
           $user = \App\Helpers\Helper::user(session('guard'));
       @endphp
       @if($user instanceof \Modules\AAA\Entities\Expert)
      <ul class="iconMenu-bar custom-scrollbar">
         <li class="open">
            <a class="bar-icons" href="#">
             <i class="pe-7s-home"></i><span>عمومی</span>
            </a>
             <ul class="iconbar-mainmenu custom-scrollbar ">
                 <li class="iconbar-header ">داشبورد</li>
                 <li><a href="/dashboard">پنل کاربری</a></li>

             </ul>
         </li>
         <li>
            <a class="bar-icons" href="#"><i class="pe-7s-users"></i><span> کاربران</span></a>
             <ul class="iconbar-mainmenu custom-scrollbar ">
                 <li class="iconbar-header ">دانشجویان</li>
                 <li><a href="{{route('students')}}">مدیریت دانشجویان</a></li>
             </ul>
         </li>
         <li>
             <a class="bar-icons" href="#"><i class="pe-7s-note2"></i><span> آموزش</span></a>
             <ul class="iconbar-mainmenu custom-scrollbar ">
                 <li class="iconbar-header ">آموزش</li>
                 <li><a href="{{route('courses')}}">مدیریت درس ها</a></li>
                 <li><a href="{{route('terms')}}">مدیریت ترم ها</a></li>
             </ul>
         </li>
      </ul>
       @elseif($user instanceof \Modules\AAA\Entities\Student)
           <ul class="iconMenu-bar custom-scrollbar">
               <li class="open">
                   <a class="bar-icons" href="#">
                       <i class="pe-7s-home"></i><span>عمومی</span>
                   </a>
                   <ul class="iconbar-mainmenu custom-scrollbar ">
                       <li class="iconbar-header ">داشبورد</li>
                       <li><a href="{{route('dashboard')}}">پنل کاربری</a></li>
                   </ul>
               </li>
               <li>
                   <a class="bar-icons" href="#"><i class="pe-7s-note2"></i><span> آموزش</span></a>
                   <ul class="iconbar-mainmenu custom-scrollbar ">
                       <li class="iconbar-header ">آموزش</li>
                       <li><a href="{{route('dashboard')}}">دروس ترم جاری</a></li>
                       <li><a href="{{route('token-courses')}}">ليست دروس اخذ شده</a></li>
                       <li><a href="{{route('take-course')}}">انتخاب واحد</a></li>
                   </ul>
               </li>
           </ul>

       @endif
   </div>
</div>
