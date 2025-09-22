<?php

use App\Events\MessageSent;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LineDistanceController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PriorityController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\frontend\ChatController;
use App\Http\Controllers\frontend\ClientJobController;
use App\Http\Controllers\frontend\FrontAuthController;
use App\Http\Controllers\frontend\FrontJobController;
use App\Http\Controllers\frontend\JobStepsController;
use App\Http\Controllers\frontend\ProviderController;
use App\Http\Controllers\frontend\SubscriptionController;
use App\Http\Controllers\frontend\TicketController;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

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

Route::get('/', function () {
    return redirect()->route('front.home');
});


Route::post('/pusher/auth', [FrontAuthController::class, 'PusherAuth'])
    ->middleware('auth');

Route::get('/test-pusher', function () {
    $options = [
        'cluster' => config('broadcasting.connections.pusher.options.cluster'),
        'useTLS' => true,
    ];

    $pusher = new Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        $options
    );

    dd($pusher);
});

Route::get('/fire-event', function () {
    $message = Message::create([
        'user_id' => auth()->id() ?? 1,
        'conversation_id' => 1,
        'body' => "Test message from Laravel"
    ]);

    event(new MessageSent($message));

    return "Event fired with real Message model!";
});


Broadcast::routes();


Route::view('/', 'frontend.home')->name('front.home');
Route::view('service-detail', 'frontend.service-detail')->name('front.service.detail');
Route::view('about-us', 'frontend.about')->name('front.about');
Route::view('blogs', 'frontend.blog')->name('front.blog');
Route::view('blog-detail', 'frontend.blog-detail')->name('front.blog.detail');
Route::view('contact-us', 'frontend.contact')->name('front.contact');
Route::view('categories', 'frontend.service-categories')->name('front.categories');
Route::view('privacy-policy', 'frontend.policy')->name('front.policy');
Route::view('terms-conditions', 'frontend.terms')->name('front.terms');
Route::view('provider-list', 'frontend.provider-list')->name('front.providers');
Route::view('post-a-job', 'frontend.post-a-job')->name('front.post.job');


Route::get('service', [FrontJobController::class, 'index'])->name('front.service');



Route::post('/selected-category', [JobStepsController::class, 'postJobCategory'])
    ->name('front.post.job.submit');


Route::get('post-a-job/{slug}', [JobStepsController::class, 'postJob'])->name('front.post.job');
//Route::view('post-a-job', 'frontend.post-a-job')->name('front.post.job');



Route::prefix('job')->group(function () {
    Route::post('/validate-postal-code', [JobStepsController::class, 'validatePostalCode'])->name('front.validate.postal');
    Route::post('/get-subcategories', [JobStepsController::class, 'getSubcategories'])->name('front.get.subcategories');
    Route::get('/get-property-types', [JobStepsController::class, 'getPropertyTypes'])->name('front.get.property.types');
    Route::get('/get-priorities', [JobStepsController::class, 'getPriorities'])->name('front.get.priorities');
    Route::post('/job/upload-temp', [JobStepsController::class, 'uploadTemp'])->name('front.upload.temp');
    Route::post('/submit-job-form', [JobStepsController::class, 'submitJobFormData'])->name('submit.job.form.data');
});














Route::get('verify/{token}', [FrontAuthController::class, 'showVerifyPage'])->name('verify.email');
Route::post('verify', [FrontAuthController::class, 'verifyCode'])->name('verify.email.submit');
Route::get('resend-code/{token}', [FrontAuthController::class, 'resendCode'])->name('resend.code');

Route::post('user-login-process', [FrontAuthController::class, 'userLoginProcess'])->name('user.login.process');
Route::post('user-logout', [FrontAuthController::class, 'userLogout'])->name('user.logout.process');
Route::post('/forgot-password', [FrontAuthController::class, 'sendResetOtp'])->name('forgot.password');



Route::prefix('user')->group(function () {
    Route::post('/register', [FrontAuthController::class, 'registerUser'])->name('user.register');
    Route::get('/profile', [FrontAuthController::class, 'profileShow'])->name('user.profile');
    Route::post('/update-profile', [FrontAuthController::class, 'userUpdateProfile'])->name('user.update.profile');

        Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

        Route::get('/chat/{conversationId}/messages', [ChatController::class, 'messages'])->name('chat.messages');
        Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

        Route::get('/chat-search-users', [ChatController::class, 'searchProvider'])->name('chat.search.users');
        Route::post('/chat/start', [ChatController::class, 'startConversation'])->name('chat.start');




    Route::middleware(['auth.user:client'])->group(function () {
        Route::view('dashboard', 'frontend.user.dashboard')->name('user.dashboard');


        Route::get('post-jobs', [ClientJobController::class, 'createJob'])->name('client.create.job');
        Route::get('/post-jobs/get-subcategories/{id}', [ClientJobController::class, 'getSubcategories'])->name('get.subcategories');
        Route::post('/job/store', [ClientJobController::class, 'storeJob'])->name('user.job.store');


        Route::get('my-jobs', [ClientJobController::class, 'myJobs'])->name('client.jobs');
        Route::get('my-jobs-detail/{id}', [ClientJobController::class, 'myJobShow'])->name('user.job.detail');

    });
});

Route::prefix('provider')->group(function () {
    Route::middleware(['auth.user:provider'])->group(function () {
        Route::view('dashboard', 'frontend.provider.dashboard')->name('provider.dashboard');
        Route::get('subscription', [SubscriptionController::class, 'packageIndex'])->name('provider.packages');

        Route::get('leads', [ProviderController::class, 'leadIndex'])->name('provider.leads');
        Route::get('lead-show/{id}', [ProviderController::class, 'leadShow'])->name('provider.lead.show');

        Route::post('buy-lead', [ProviderController::class, 'buyLead'])->name('provider.buy-lead');
        Route::get('my-leads', [ProviderController::class, 'providerLeadIndex'])->name('provider.my.lead');
        Route::get('my-lead-show/{id}', [ProviderController::class, 'providerLeadShow'])->name('provider.my.lead.show');

        // Stripe Routes Start
        Route::post('/subscriptions/checkout', [SubscriptionController::class, 'checkout'])->name('subscriptions.checkout');
        Route::get('/subscriptions/success', [SubscriptionController::class, 'success'])->name('subscriptions.success');
        Route::get('/subscriptions/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');

        // Pay As You Go Routes
        Route::post('pay-lead', [ProviderController::class, 'checkout'])->name('provider.pay-lead');
        Route::get('pay-lead/success', [ProviderController::class, 'success'])->name('provider.pay-lead.success');
        Route::get('pay-lead/cancel', [ProviderController::class, 'cancel'])->name('provider.pay-lead.cancel');
        // Stripe Routes End

        // Chat Routes Start
        Route::get('/chat', [ChatController::class, 'index'])->name('provider.chat.index');
        Route::get('/chat-search-provider', [ChatController::class, 'searchClient'])->name('chat.search.provider');
        // Chat Routes Start

    });

    Route::post('/register', [FrontAuthController::class, 'registerProvider'])->name('provider.register');






});








foreach (['user', 'provider'] as $role) {
    Route::prefix($role)->middleware(["auth.user"])->group(function () use ($role) {


        // Ticket Routes
        Route::get('tickets', [TicketController::class, 'index'])->name("$role.tickets.index");
        Route::get('create-ticket', [TicketController::class, 'create'])->name("$role.create.ticket");
        Route::post('create-ticket', [TicketController::class, 'store'])->name("$role.store.ticket");
        Route::delete('tickets/{ticket}', [TicketController::class, 'destroy'])->name("$role.tickets.destroy");


    });
}







Route::get('make-hash', function (){
    dd(\Illuminate\Support\Facades\Hash::make('12345678'));
});
Route::get('/admin', function(){
    return redirect()->route('admin.login');
});




Route::prefix('admin')->group(function () {
    Route::middleware(['UnauthenticAdmin'])->group(function (){
        Route::view('auth-login', 'admin.auth.login')->name('admin.login');
        Route::post('login', [AuthController::class, 'loginProcess'])->name('admin.login.process');
    });
    Route::middleware(['AuthenticAdmin'])->group(function (){
        Route::get('logout', [AuthController::class, 'authLogout'])->name('admin.logout');
        Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');

        Route::get('user-management', [UserController::class, 'index'])->name('admin.manage.user');
        Route::get('user-detail/{id}', [UserController::class, 'show'])->name('admin.show.user');
        Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('admin.edit.user');
        Route::patch('update-user/{id}', [UserController::class, 'update'])->name('admin.update.user');
        Route::delete('delete-user/{id}', [UserController::class, 'destroy'])->name('admin.delete.user');
        Route::get('create-user', [UserController::class, 'create'])->name('admin.create.user');
        Route::post('create-user', [UserController::class, 'store'])->name('admin.store.user');


        // Category Management
        Route::get('category-management', [CategoryController::class, 'index'])->name('admin.manage.category');
        Route::get('detail/{type}/{id}', [CategoryController::class, 'show'])->name('admin.show.category');
        Route::get('edit/{type}/{id}', [CategoryController::class, 'edit'])->name('admin.edit.category');
        Route::patch('edit/{type}/{id}', [CategoryController::class, 'update'])->name('admin.update.category');
        Route::delete('delete-category/{type}/{id}', [CategoryController::class, 'destroy'])->name('admin.delete.category');
        Route::get('create-category', [CategoryController::class, 'create'])->name('admin.create.category');
        Route::post('create-category', [CategoryController::class, 'store'])->name('admin.store.category');

        // Property Type Management
        Route::get('property-type-management', [PropertyController::class, 'index'])->name('admin.manage.property');
        Route::get('property-type-data', [PropertyController::class, 'data'])->name('admin.property.data');
        Route::post('property-type-store', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::post('property-type-update/{id}', [PropertyController::class, 'update'])->name('admin.property.update');
        Route::delete('property-type-delete/{id}', [PropertyController::class, 'destroy'])->name('admin.property.delete');


        // Priority Management
        Route::get('job-priority-management', [PriorityController::class, 'index'])->name('admin.manage.priority');
        Route::get('job-priority-data', [PriorityController::class, 'data'])->name('admin.priority.data');
        Route::post('job-priority-store', [PriorityController::class, 'store'])->name('admin.priority.store');
        Route::post('job-priority-update/{id}', [PriorityController::class, 'update'])->name('admin.priority.update');
        Route::delete('job-priority-delete/{id}', [PriorityController::class, 'destroy'])->name('admin.priority.delete');

        // Line Distance Management
        Route::get('line-distance-management', [LineDistanceController::class, 'index'])->name('admin.manage.linedistance');
        Route::get('line-distance-data', [LineDistanceController::class, 'data'])->name('admin.linedistance.data');
        Route::post('line-distance-store', [LineDistanceController::class, 'store'])->name('admin.linedistance.store');
        Route::post('line-distance-update/{id}', [LineDistanceController::class, 'update'])->name('admin.linedistance.update');
        Route::delete('line-distance-delete/{id}', [LineDistanceController::class, 'destroy'])->name('admin.linedistance.delete');

        //Package Management
        Route::get('package-management', [PackageController::class, 'index'])->name('admin.manage.package');
        Route::get('create-package', [PackageController::class, 'create'])->name('admin.create.package');
        Route::post('create-package', [PackageController::class, 'store'])->name('admin.store.package');
        Route::get('package-detail/{id}', [PackageController::class, 'show'])->name('admin.show.package');
        Route::get('edit-package/{id}', [PackageController::class, 'edit'])->name('admin.edit.package');
        Route::patch('update-package/{id}', [PackageController::class, 'update'])->name('admin.update.package');
        Route::get('delete-package/{id}', [PackageController::class, 'destroy'])->name('admin.delete.package');

        //Ticket Management
        Route::get('ticket-management', [App\Http\Controllers\admin\TicketController::class, 'index'])->name('admin.manage.ticket');
        Route::get('ticket-detail/{id}', [App\Http\Controllers\admin\TicketController::class, 'show'])->name('admin.show.ticket');
        Route::get('edit-ticket/{id}', [App\Http\Controllers\admin\TicketController::class, 'edit'])->name('admin.edit.ticket');
        Route::patch('update-ticket/{id}', [App\Http\Controllers\admin\TicketController::class, 'update'])->name('admin.update.ticket');
        Route::delete('delete-ticket/{id}', [App\Http\Controllers\admin\TicketController::class, 'destroy'])->name('admin.delete.ticket');

    });


});

