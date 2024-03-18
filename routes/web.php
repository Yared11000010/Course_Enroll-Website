<?php

use App\Http\Controllers\Dashboard\Blog\BlogsCategoryController;
use App\Http\Controllers\Dashboard\Blog\BlogsCommmentController;
use App\Http\Controllers\Dashboard\Blog\BlogsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\BookOrderController;
use App\Http\Controllers\Dashboard\ContactUsController as DashboardContactUsController;
use App\Http\Controllers\Dashboard\RoleAndPermission\AdminController as AAdminContoller;
use App\Http\Controllers\Dashboard\Course\CourseCategoryController;
use App\Http\Controllers\Dashboard\Course\CourseController;
use App\Http\Controllers\Dashboard\FAQController;
use App\Http\Controllers\Dashboard\Course\Lesson\LessonController;
use App\Http\Controllers\Dashboard\NewsLettersController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\RoleAndPermission\AdminController as RoleAndPermissionAdminController;
use App\Http\Controllers\Dashboard\RoleAndPermission\AdminRoleController;
use App\Http\Controllers\Dashboard\RoleAndPermission\PermissionCategoryController;
use App\Http\Controllers\Dashboard\RoleAndPermission\PermissionController;
use App\Http\Controllers\Dashboard\RoleAndPermission\RoleController;
use App\Http\Controllers\Dashboard\RoleAndPermission\RolePermissionController;
use App\Http\Controllers\Dashboard\TestMonyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\LoginRegisterContorller;
use App\Http\Controllers\Frontend\MainContorller;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\YoutubeController;
use App\Models\Admin;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Route::get('/',[MainContorller::class,'index'])->name('frontend');

// Auth::routes();
Auth::routes(['login' => false]);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/youtube/{videoId}', [YouTubeController::class, 'displayVideo']);
Route::post('/decrypt-link', [MainContorller::class, 'decryptLink']);

// for frontend pages
Route::get('/contact-us',[MainContorller::class,'contact'])->name('contact-us');
Route::get('/about-us',[MainContorller::class,'about'])->name('about-us');
Route::get('/courses',[MainContorller::class,'courses'])->name('courses');
Route::get('/blogs',[MainContorller::class,'blogs'])->name('blog');
Route::get('blogs/detail/{id}',[MainContorller::class,'blog_details'])->name('blog_details');
Route::post('send-blog-comment',[MainContorller::class,'send_comment'])->name('send_comment');
Route::get('/faq',[MainContorller::class,'faq'])->name('faq');

//for book store
Route::get('/shop',[MainContorller::class,'shop'])->name('shop');
Route::get('shop-details/{id}',[MainContorller::class,'shop_details'])->name('shop_details');
Route::get('course/detail/{id}',[MainContorller::class,'coursedetails'])->name('course-details');

Route::get('/get-courses-by-category/{categoryId}', [MainContorller::class,'getCoursesByCategory']);
Route::get('/get-blog-by-category/{blogID}', [MainContorller::class,'getBlogByCategory']);

Route::get('/get-free-course-lesson/{id}', [MainContorller::class,'getFreeCourseLesson']);
Route::get('/get-paid-course-lesson/{id}', [MainContorller::class,'getPaidCourseLesson']);

Route::post('/search', [MainContorller::class,'search'])->name('search');

Route::get('course-category/{id}',[MainContorller::class,'category'])->name('all-course_category');

Route::get('consltation',[MainContorller::class,'consltation'])->name('consltation');

//for contact us
Route::post('contact-store',[ContactUsController::class,'store'])->name('store-contact');
//for news letter
Route::post('newsletter',[MainContorller::class,'newsletter'])->name('newsletter');
//login and registeration for user
Route::get('user-login',[LoginRegisterContorller::class,'login'])->name('login-user');
Route::get('user-register',[LoginRegisterContorller::class,'register'])->name('register-user');

Route::post('userlogin',[LoginRegisterContorller::class,'userLogin'])->name('userlogin');
Route::post('user_register',[LoginRegisterContorller::class,'userRegister'])->name('user_register');

Route::get('free-course',[MainContorller::class,'freecourse'])->name('free-courses');
Route::get('free-course-detail/{course_code}',[MainContorller::class,'freecoursedetail'])->name('free-course-details');

Route::get('free-pdf',[MainContorller::class,'freepdf'])->name('free-pdf');
Route::get('free-pdf-detail/{order_code}',[MainContorller::class,'freepdfetails'])->name('free-pdf-details');
Route::get('free-pdf-view/{order_code}',[MainContorller::class,'view_free_pdf'])->name('free-pdf-view');
Route::get('paid-pdf-view/{order_code}',[MainContorller::class,'view_my_pdf'])->name('paid-pdf-view');

//forget password


Route::get('user/forget-password', [LoginRegisterContorller::class, 'forgetpassword'])->name('user-forget-password');
Route::post('user/forget-password', [LoginRegisterContorller::class, 'ForgetPasswordStore'])->name('user-forgetpassword');
Route::get('user/reset-password/{token}', [LoginRegisterContorller::class, 'ResetPassword'])->name('user-resetpasswordGet');
Route::match(['get','post'],'user/reset-password', [LoginRegisterContorller::class, 'ResetPasswordStore'])->name('user-resetPasswordPost');



Route::middleware(['auth'])->group(function () {

    Route::get('user-logout',[LoginRegisterContorller::class,'logout'])->name('user-logout');
    Route::get('course/enroll/{id}',[MainContorller::class,'enroll'])->name('course-enroll');
    //for payemnt
    // Route::post('pay', 'App\Http\Controllers\Frontend\ChapaController@initialize')->name('pay');
    Route::post('checkout-order',[PaymentController::class,'payment'])->name('checkout-order');

    // The callback url after a payment
    Route::get('callback/{reference}', 'App\Http\Controllers\Frontend\ChapaController@callback')->name('callback');

    Route::get('my-learn',[MainContorller::class,'mylearn'])->name('my-learn');
    Route::get('my-learn/course/{course_id}',[MainContorller::class,'mylearn_detail'])->name('my-learn-course-detail');


    Route::get('download-file/{file}',[MainContorller::class,'download_file'])->name('download_file');
    Route::post('check-transactions',[MainContorller::class,'check_transactions'])->name('check-transactions');

    Route::get('enroll-book/{id}',[MainContorller::class,'enroll_book'])->name('enroll-book');

    Route::get('my-pdf',[MainContorller::class,'mypdf'])->name('my-pdf');
    Route::get('my-pdf/{pdf_id}',[MainContorller::class,'mypdf_detail'])->name('my-learn-pdf-detail');
    Route::get('download-pdf-file/{file}',[MainContorller::class,'download_pdf_file'])->name('download_pdf_file');
    Route::post('check-book-order-transactions',[MainContorller::class,'check_book_order_transactions'])->name('check-book-order-transactions');

    Route::get('show-paid-lesson-pdf/{id}',[MainContorller::class,'show_paid_lesson_pdf'])->name('show-paid-lesson-pdf');


});
    Route::get('/pdf/{id}', [MainContorller::class,'show'])->name('pdf.show');

    Route::get('show-course-pdf/{id}',[MainContorller::class,'show_course_pdf'])->name('show-course-pdf');
    Route::get('show-lesson-pdf/{id}',[MainContorller::class,'show_lesson_pdf'])->name('show-lesson-pdf');

//!new
Route::get('view-course-pdf-view/{course_code}',[CourseController::class,'view_course_pdf'])->name('view-course-pdf-view');
Route::get('view-lesson-pdf-view/{lesson_code}',[LessonController::class,'view_lesson_pdf'])->name('view-lesson-pdf-view');



Route::get('admin/forget-password', [AdminController::class, 'forgetpassword'])->name('admin-forget-password');
Route::post('admin/forget-password', [AdminController::class, 'ForgetPasswordStore'])->name('admin-forgetpassword');
Route::get('admin/reset-password/{token}', [AdminController::class, 'ResetPassword'])->name('admin-resetpasswordGet');
Route::match(['get','post'],'admin/reset-password', [AdminController::class, 'ResetPasswordStore'])->name('admin-resetPasswordPost');

Route::prefix('admin')->group(function(){

    Route::get('login',[AdminController::class,'login'])->name('admin_login');
    Route::post('login',[AdminController::class,'login_validate'])->name('admin_login_validation');

    Route::group(['middleware'=>['admin']],function(){

    Route::get('update-password',[AdminController::class,'update_password'])->name('update_password');
    Route::put('update-admin-password',[AdminController::class,'update_admin_password'])->name('update_admin_password');
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('admin/register',[AdminController::class,'registeration'])->name('admin_register');
    Route::post('admin/store-admin',[AdminController::class,'register'])->name('store_admin');
    Route::get('logout',[AdminController::class,'logout'])->name('logout_admin');

    Route::get('view-payment-receipt/{id}',[OrderController::class,'view'])->name('view_payment_receipt');

    Route::get('view-pdf-payment-receipt/{id}',[OrderController::class,'view_pdf'])->name('view_pdf_payment_receipt');

    //routing for admins
    //admin routing
    Route::get('all-admins',[AdminController::class,'index'])->name('all-admins');
    Route::get('create-admin',[AdminController::class,'create'])->name('create-admin');
    Route::post('store-admin',[AdminController::class,'store'])->name('store-admin');
    Route::get('edit-admin/{id}',[AdminController::class,'edit'])->name('edit-admin');
    Route::put('update-admin/{id}',[AdminController::class,'update'])->name('update-admin');
    Route::get('delete-admin/{id}',[AdminController::class,'delete'])->name('delete-admin');

    Route::get('inactive/admin/{id}',[AdminController::class,'inactive'])->name('inactive_admin');
    Route::get('active/admin/{id}',[AdminController::class,'active'])->name('active_admin');

    //user routing
    Route::get('all-users',[UserController::class,'index'])->name('all-users');
    Route::get('create-user',[UserController::class,'create'])->name('create-user');
    Route::post('store-user',[UserController::class,'store'])->name('store-user');
    Route::get('edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
    Route::put('update-user/{id}',[UserController::class,'update'])->name('update-user');
    Route::get('delete-user/{id}',[UserController::class,'delete'])->name('delete-user');

    //for contact us
     Route::get('contact-us',[DashboardContactUsController::class,'index'])->name('all-contact-us');
     Route::get('delete-message/{id}', [DashboardContactUsController::class, 'delete'])->name('delete.Message');

      //routing for blog category
      Route::get('blog-categories',[BlogsCategoryController::class,'index'])->name('blog-categories');
      Route::get('blog/category/add',[BlogsCategoryController::class,'create'])->name('add-blog-category');
      Route::post('blog/category/store',[BlogsCategoryController::class,'store'])->name('store-blog-category');
      Route::get('blog/category/edit/{id}',[BlogsCategoryController::class,'edit'])->name('edit-blog-category');
      Route::put('blog/category/update',[BlogsCategoryController::class,'update'])->name('update-blog-category');
      Route::get('blog/category/delete/{id}',[BlogsCategoryController::class,'delete'])->name('delete-blog-category');
      Route::get('blog/category/active/{id}',[BlogsCategoryController::class,'active'])->name('active-blog-category');
      Route::get('blog/category/inactive/{id}',[BlogsCategoryController::class,'inactive'])->name('inactive-blog-category');


      //routing for blogs
       //routing for blog category
       Route::get('blogs',[BlogsController::class,'index'])->name('blogs');
       Route::get('blogs/add',[BlogsController::class,'create'])->name('add-blog');
       Route::post('blogs/store',[BlogsController::class,'store'])->name('store-blog');
       Route::get('blogs/edit/{id}',[BlogsController::class,'edit'])->name('edit-blog');
       Route::put('blogs/update',[BlogsController::class,'update'])->name('update-blog');
       Route::get('blogs/delete/{id}',[BlogsController::class,'delete'])->name('delete-blog');
       Route::get('blogs/active/{id}',[BlogsController::class,'active'])->name('active-blog');
       Route::get('blogs/inactive/{id}',[BlogsController::class,'inactive'])->name('inactive-blog');


       //for blog-comment
       Route::get('blog-comments',[BlogsCommmentController::class,'index'])->name('blog-comments');
       Route::get('blog-comment/delete/{id}',[BlogsCommmentController::class,'delete'])->name('delete-blog-comment');
       Route::get('blog-comment/active/{id}',[BlogsCommmentController::class,'active'])->name('active-blog-comment');
       Route::get('blog-comment/inactive/{id}',[BlogsCommmentController::class,'inactive'])->name('inactive-blog-comment');

        Route::get('newslettersubscribers',[NewsLettersController::class,'index'])->name('newslettersubscribers');
        Route::get('newslettersubscribers/inactive/{id}',[NewsLettersController::class,'inactive'])->name('inactive_newslettersubscribers');
        Route::get('newslettersubscribers/active/{id}',[NewsLettersController::class,'active'])->name('active_newslettersubscribers');
        Route::get('newslettersubscribers/delete/{id}',[NewsLettersController::class,'delete'])->name('delete_newslettersubscribers');
        Route::get('send-email-to-all',[NewsLettersController::class,'create'])->name('send-email-to-all');
        Route::post('send-email-to-all-users',[NewsLettersController::class,'send'])->name('send-email-to-all-users');


        //routeing for course
        Route::get('all-courses',[CourseController::class,'index'])->name('all-courses');
        Route::get('course/add',[CourseController::class,'create'])->name('add-course');
        Route::post('course/store',[CourseController::class,'store'])->name('store-course');
        Route::get('course/edit/{id}',[CourseController::class,'edit'])->name('edit-course');
        Route::put('course/update',[CourseController::class,'update'])->name('update-course');
        Route::get('course/delete/{id}',[CourseController::class,'delete'])->name('delete-course');
        Route::get('course/active/{id}',[CourseController::class,'active'])->name('active-course');
        Route::get('course/inactive/{id}',[CourseController::class,'inactive'])->name('inactive-course');

    //for course lesson
        Route::get('all-lessons',[LessonController::class,'index'])->name('all-lessons');
        Route::get('lesson/add',[LessonController::class,'create'])->name('add-lesson');
        Route::post('lesson/store',[LessonController::class,'store'])->name('store-lesson');
        Route::get('lesson/edit/{id}',[LessonController::class,'edit'])->name('edit-lesson');
        Route::put('lesson/update',[LessonController::class,'update'])->name('update-lesson');
        Route::get('lesson/delete/{id}',[LessonController::class,'delete'])->name('delete-lesson');
        Route::get('lesson/active/{id}',[LessonController::class,'active'])->name('active-lesson');
        Route::get('lesson/inactive/{id}',[LessonController::class,'inactive'])->name('inactive-lesson');

            //routing for blog category
      Route::get('course-categories',[CourseCategoryController::class,'index'])->name('course-categories');
      Route::get('course/category/add',[CourseCategoryController::class,'create'])->name('add-course-category');
      Route::post('course/category/store',[CourseCategoryController::class,'store'])->name('store-course-category');
      Route::get('course/category/edit/{id}',[CourseCategoryController::class,'edit'])->name('edit-course-category');
      Route::put('course/category/update',[CourseCategoryController::class,'update'])->name('update-course-category');
      Route::get('course/category/delete/{id}',[CourseCategoryController::class,'delete'])->name('delete-course-category');
      Route::get('course/category/active/{id}',[CourseCategoryController::class,'active'])->name('active-course-category');
      Route::get('course/category/inactive/{id}',[CourseCategoryController::class,'inactive'])->name('inactive-course-category');

      Route::get('all-orders',[OrderController::class,'index'])->name('all-orders');
      Route::get('orders/delete/{id}',[OrderController::class,'delete'])->name('delete-orders');
      Route::put('update-payment-status',[OrderController::class,'update_payment'])->name('update_payment');

      Route::get('all-pdf-orders',[BookOrderController::class,'index'])->name('all-pdf-orders');
      Route::get('pdf-orders/delete/{id}',[BookOrderController::class,'delete'])->name('delete-pdf-orders');
      Route::put('pdf-update-payment-status',[BookOrderController::class,'update_payment'])->name('update_pdf_payment');
      Route::get('pdf-orders/view-detais/{id}',[BookOrderController::class,'detail'])->name('detail-pdf-orders');
      Route::get('course-orders/view-detais/{id}',[OrderController::class,'detail'])->name('detail-course-orders');




      //routing for book store
       Route::get('books',[BookController::class,'index'])->name('books');
       Route::get('books/add',[BookController::class,'create'])->name('add-book');
       Route::post('books/store',[BookController::class,'store'])->name('store-book');
       Route::get('books/edit/{id}',[BookController::class,'edit'])->name('edit-book');
       Route::put('books/update',[BookController::class,'update'])->name('update-book');
       Route::get('books/delete/{id}',[BookController::class,'delete'])->name('delete-book');
       Route::get('books/active/{id}',[BookController::class,'active'])->name('active-book');
       Route::get('books/inactive/{id}',[BookController::class,'inactive'])->name('inactive-book');

        Route::match(['get','post'],'banners',[BannerController::class,'banners'])->name('banners');
        //routing for active and inactive product images
        Route::get('banners/active/{id}',[BannerController::class,'active_banner'])->name('active_banner');
        Route::get('banners/inactive/{id}',[BannerController::class,'inactive_banner'])->name('inactive_banner');

        Route::get('banners/delete/{banner_id}',[BannerController::class,'delete'])->name('delete_banners');
        Route::get('banners/create',[BannerController::class,'create'])->name('create_banners');
    //    Route::post('banners/store',[BannerController::class,'store'])->name('store_banners');

        Route::get('banners/edit/{id}',[BannerController::class,'edit'])->name('edit_banner');
        Route::put('banner/update',[BannerController::class,'update'])->name('update_banner');

        //routing for testmonys
        Route::get('student-says',[TestMonyController::class,'index'])->name('student-says');
        Route::get('student-says/add',[TestMonyController::class,'create'])->name('add-student-say');
        Route::post('student-says/store',[TestMonyController::class,'store'])->name('store-student-say');
        Route::get('student-says/edit/{id}',[TestMonyController::class,'edit'])->name('edit-student-say');
        Route::put('student-says/update',[TestMonyController::class,'update'])->name('update-student-say');
        Route::get('student-says/delete/{id}',[TestMonyController::class,'delete'])->name('delete-student-say');
        Route::get('student-says/active/{id}',[TestMonyController::class,'active'])->name('active-student-say');
        Route::get('student-says/inactive/{id}',[TestMonyController::class,'inactive'])->name('inactive-student-say');


              //routing for blog category
      Route::get('faqs',[FAQController::class,'index'])->name('faqs');
      Route::get('faq/add',[FAQController::class,'create'])->name('add-faq');
      Route::post('faq/store',[FAQController::class,'store'])->name('store-faq');
      Route::get('faq/edit/{id}',[FAQController::class,'edit'])->name('edit-faq');
      Route::put('faq/update',[FAQController::class,'update'])->name('update-faq');
      Route::get('faq/delete/{id}',[FAQController::class,'delete'])->name('delete-faq');
      Route::get('faq/active/{id}',[FAQController::class,'active'])->name('active-faq');
      Route::get('faq/inactive/{id}',[FAQController::class,'inactive'])->name('inactive-faq');


      Route::get('all-about-us/',[AboutController::class,'index'])->name('all-about-us');
      Route::get('about/edit/{id}',[AboutController::class,'edit'])->name('edit-about');
      Route::put('about/update',[AboutController::class,'update'])->name('update-about');


      Route::get('permission-categories/',[PermissionCategoryController::class,'index'])->name('permission.category.index');
      Route::get('permission-category/create/',[PermissionCategoryController::class,'create'])->name('permission.category.create');
      Route::post('permission-category/store/',[PermissionCategoryController::class,'store'])->name('permission.category.store');
      Route::get('permission-category/edit/{id}',[PermissionCategoryController::class,'edit'])->name('permission.category.edit');
      Route::put('permission-category/update/',[PermissionCategoryController::class,'update'])->name('permission.category.update');
      Route::get('permission-category/destroy/{id}',[PermissionCategoryController::class,'destroy'])->name('permission.category.destroy');
      Route::get('permission-category/active/{id}',[PermissionCategoryController::class,'active'])->name('permission.category.active');
      Route::get('permission-category/inactive/{id}',[PermissionCategoryController::class,'inactive'])->name('permission.category.inactive');


      Route::get('permissions/',[PermissionController::class,'index'])->name('permission.index');
      Route::get('permission/create/',[PermissionController::class,'create'])->name('permission.create');
      Route::post('permission/store/',[PermissionController::class,'store'])->name('permission.store');
      Route::get('permission/edit/{id}',[PermissionController::class,'edit'])->name('permission.edit');
      Route::put('permission/update/',[PermissionController::class,'update'])->name('permission.update');
      Route::get('permission/destroy/{id}',[PermissionController::class,'destroy'])->name('permission.destroy');


      Route::get('roles/',[RoleController::class,'index'])->name('role.index');
      Route::get('role/create/',[RoleController::class,'create'])->name('role.create');
      Route::post('role/store/',[RoleController::class,'store'])->name('role.store');
      Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
      Route::put('role/update/',[RoleController::class,'update'])->name('role.update');
      Route::get('role/destroy/{id}',[RoleController::class,'destroy'])->name('role.destroy');



      Route::get('role/{id}/permission',[RolePermissionController::class,'edit'])->name('role_permissions_edit');
      Route::put('roles/{role}/permissions', [RolePermissionController::class, 'update'])->name('role_permissions.update');

      Route::get('all-admin-user',[AAdminContoller::class,'index'])->name('all-admin-user');
      Route::get('assign-role-to-admin/{id}',[AAdminContoller::class,'assignRole'])->name('assign-role-to-admin');
      Route::post('update-admin-role', [AAdminContoller::class, 'updateRole'])->name('update-admin-role');


    });
});



