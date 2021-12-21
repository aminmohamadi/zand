<?php


namespace App\Helpers;


class Constants
{
    const INVALID_USERNAME_OR_PASSWORD = "نام کاربری یا رمز عبور صحیح نمیباشد";
    const WELCOME_MESSAGE = "کاربر گرامی خوش آمدید";
    const OUT_OF_RANG_CREDITS = "مجموع واحد ها نباید بیش از 16 واحد باشد";
    const CLASS_TIME_CONFLICT = "ساعت کلاس ها با هم تداخل دارند";
    const SUCCESSFUL_OPERATION = "عملیات با موفقیت انجام شد";
    const ERROR_IN_OPERATION = "خطا در انجام عملیات";
    const SUBJECTS = [
        1 => "زبان و ادبیات انگلیسی",
        2 => "نرم افزار",
        3 => "هوش مصنوعی",
        4 => "مدیریت صنعتی",
        5 => "حسابداری",
    ];
    const GENDERS = [
        1 => 'آقا',
        2 => 'خانم'
    ];
    const STATUS = [
      1 => 'فعال',
      2 => 'غیرفعال'
    ];
    const DAYS_OF_WEEK = [
      'شنبه',
      'یکشنبه',
      'دوشنبه',
      'سه شنبه',
      'چهارشنبه',
      'پنجشنبه',
      'جمعه'
    ];

}
