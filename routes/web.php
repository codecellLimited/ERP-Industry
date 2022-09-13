<?php

use App\Http\Middleware\SetLocal;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/** Default auth routing */
Auth::routes();

/** 
 * 
 * ==============   Route for Frontend Pages ===================
 * 
*/
Route::middleware('SetLocal')
->controller(App\Http\Controllers\HomeController::class)
->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('search', 'searchItem')->name('search');
    Route::view('/about', 'about')->name('about');
    Route::view('/emi-calculator', 'calculator')->name('calculator');
    Route::get('/news', 'showNewsPage')->name('news');
    Route::view('/contact', 'contact')->name('contact');
    Route::get('account-opening', 'showAccountItems')->name('account.opening');
    Route::get('details/{key}', 'showDetails')->name('details');
    Route::get('service/{key}', 'showService')->name('service');
    Route::get('success-stories', 'showStory')->name('story');
    Route::get('ac-details/{key}', 'showAcDetails')->name('ac.details');
    Route::get('/blog/{key}', 'showPost')->name('post');
    Route::get('/blog/by/{category}', 'showPostByCategory')->name('category');
    Route::post('/comment', 'storeComment')->name('comment.store');
    Route::post('/contact', [App\Http\Controllers\SendMessageController::class, 'sendMessageToAdmin'])->name('send.message.to.admin');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/** set Language */
Route::get('change-language/{langCode}', function($langCode){
    return changeLang($langCode);
});



/** 
 * 
 * ==============   Route for Admin Panel ===================
 * 
*/

/** Admin Auth Routes */
Route::controller(App\Http\Controllers\Admin\AuthController::class)
->group(function(){

    Route::view('admin', 'auth.login')->name('admin.login');
    Route::post('admin/login', 'adminLogin')->name('admin.login');
    Route::post('admin/send-password-reset-link', 'sendPasswordResetLink')->name('admin.password.email');
    Route::post('admin/reset-password', 'updateAdminPassword')->name('admin.password.update');

});


Route::prefix('admin')->middleware('auth:admin')
->group(function(){

    /** dashboard */
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    // Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    /** Admin profile */
    Route::view('profile', 'admin.profile')->name('admin.profile');
    Route::post('profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'updateProfile'])->name('admin.profile.update');

    /** App settings */
    Route::view('settings', 'admin.settings')->name('admin.settings');
    Route::post('settings/update', [App\Http\Controllers\Admin\AppSettingController::class, 'update'])->name('admin.app.update');




    /** 
     * 
     * ==============   Route for Customer message ===================
     * 
    */
    
    Route::controller(App\Http\Controllers\Admin\MessageController::class)
    ->prefix('message')
    ->name('admin.message.')
    ->group(function(){

        /** Record Show */
        Route::get('list', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('create');

        /** Image upload */
        Route::any('uploadImage', 'uploadImage')->name('file.upload');
        /** Delete Image */
        Route::get('remove/image/{key}', 'destroyImage')->name('file.remove');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');
        /** update Stock */
        Route::get('stock/{key}', 'updateStock')->name('stock');





        /** subject create */
        Route::post('subject/create', 'storeSubject')->name('subject.create');
        /** Record remove */
        Route::get('subject/remove/{key}', 'destroy')->name('subject.delete');
        /** update status */
        Route::get('subject/status/{key}', 'updateStatus')->name('subject.status');

    });


    /** 
     * 
     * ==============   Route for Category ===================
     * 
    */
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)
    ->prefix('category')
    ->name('admin.category.')
    ->group(function(){

        /** Record Show */
        Route::get('', 'showCategoryList')->name('list');

        /** Record create */
        Route::get('create/', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');

    });



    /** 
     * 
     * ==============   Route for Blogs ===================
     * 
    */
    
    Route::controller(App\Http\Controllers\Admin\BlogController::class)
    ->prefix('blog')
    ->name('admin.blog.')
    ->group(function(){

        /** Record Show */
        Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');

        /** Image upload */
        Route::any('uploadImage', 'uploadImage')->name('file.upload');
        /** Delete Image */
        Route::get('remove/image/{key}', 'destroyImage')->name('file.remove');
        
        /** Record update */
        Route::get('update/{slug}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');
        /** update Stock */
        Route::get('stock/{key}', 'updateStock')->name('stock');

    });



    
    /** 
     * 
     * ==============   Route for Service ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\ServiceController::class)
    ->prefix('service')
    ->name('admin.service.')
    ->group(function(){

        /** Record Show */
        Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');

        /** Image upload */
        Route::any('uploadImage', 'uploadImage')->name('file.upload');
        /** Delete Image */
        Route::get('remove/image/{key}', 'destroyImage')->name('file.remove');
        
        /** Record update */
        Route::get('update/{slug}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');
        /** update Stock */
        Route::get('stock/{key}', 'updateStock')->name('stock');

    });





    /** 
     * 
     * ==============   Route for web content ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\WebContentController::class)
    ->prefix('web-content')
    ->name('admin.content.')
    ->group(function(){

        /** Record Show */
        Route::get('{tab?}', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');

        /** Image upload */
        Route::any('uploadImage', 'uploadImage')->name('file.upload');
        /** Delete Image */
        Route::get('remove/image/{key}', 'destroyImage')->name('file.remove');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');
        /** update Stock */
        Route::get('stock/{key}', 'updateStock')->name('stock');

    });



    /** 
     * 
     * ==============   Route for Testimonial ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\TestimonialController::class)
    ->prefix('testimonial')
    ->name('admin.testimonial.')
    ->group(function(){

        /** Record Show */
        Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');

    });




    /** 
     * 
     * ==============   Route for Team ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\TeamController::class)
    ->prefix('team')
    ->name('admin.team.')
    ->group(function(){

        /** Record Show */
        Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');

    });




    /** 
     * 
     * ==============   Route for Account Type ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\AcTypeController::class)
    ->prefix('ac-type')
    ->name('admin.actype.')
    ->group(function(){

        /** Record Show */
        // Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');

    });



    /** 
     * 
     * ==============   Route for Account Type ===================
     * 
    */    
    Route::controller(App\Http\Controllers\Admin\AcTitleController::class)
    ->prefix('ac-title')
    ->name('admin.actitle.')
    ->group(function(){

        /** Record Show */
        // Route::get('', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('create');
        Route::post('create', 'create')->name('store');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');

    });






    /** 
     * 
     * ==============   Route for slider ===================
     * 
    */
    
    Route::controller(App\Http\Controllers\Admin\SliderController::class)
    ->prefix('slider')
    ->name('admin.slider.')
    ->group(function(){

        /** Record Show */
        Route::get('list', 'showList')->name('list');

        /** Record create */
        Route::get('create', 'showCreatePage')->name('add');
        Route::post('create', 'create')->name('create');

        /** Image upload */
        Route::any('uploadImage', 'uploadImage')->name('file.upload');
        /** Delete Image */
        Route::get('remove/image/{key}', 'destroyImage')->name('file.remove');
        
        /** Record update */
        Route::get('update/{key}', 'showUpdatePage')->name('edit');
        Route::post('update', 'update')->name('update');

        /** Record remove */
        Route::get('remove/{key}', 'destroy')->name('delete');

        /** update status */
        Route::get('status/{key}', 'updateStatus')->name('status');
        /** update Stock */
        Route::get('stock/{key}', 'updateStock')->name('stock');

    });
});