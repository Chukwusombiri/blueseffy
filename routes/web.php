<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminBotController, AdminDashBoardController, AdminSubscriptionController, UsersController,ArticlesController,PromoController,
    FaqsController, WithdrawalController,ServicesController,TeamController,CompanyWalletController,
    CategoryController, CommentsController, CompanyController, FakeTransactionController, FundingDepositController, InvestmentDepositController,
    MailController, PlanController, TestimonialsController};
use App\Http\Controllers\Guest\{CronController, GuestPagesController};
use App\Http\Controllers\User\{UserBotController, UserDashBoardController, UserDepositController, UserFiatWithdrawalController, UserInvestmentController, UserWalletController,
    UserWithdrawalController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* GUEST */
Route::get('/cron',[CronController::class,'topup'])->name('topup');

Route::controller(GuestPagesController::class)->group(function () {
Route::get('/','index')->name('guestHome');
Route::get('/contact', 'contact')->name('contact');
Route::get('/pricing', 'pricing')->name('pricing');
Route::get('/about', 'about')->name('about');
Route::get('/faq', 'faqs')->name('faqs');
Route::get('/testimonials', 'testimonials')->name('testimonials');
Route::get('/team', 'team')->name('team');     
Route::get('/articles/{id?}', 'articles')->name('articles'); 
Route::get('readarticle/{id}','readarticle')->name('readarticle');
Route::get('/company_details/pdf','getPdf')->name('pdf');
Route::get('/company_details/certificate','getCertificate')->name('certificate');
Route::get('/markets','markets')->name('markets');
Route::get('/exchange','exchange')->name('exchange');
Route::get('/resources/ROI-projector','projector')->name('projector');
Route::get('/investment-support-for-ukrainians','ukrain')->name('ukrain');
Route::get('/daily-feeds/transactions','transactions')->name('transactions');
Route::get('/Artemis-Algorithm-AI-Trading-tool','artemis')->name('artemis');
});

/* AUTH */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard',function(){
        if(auth()->user()->is_admin){
            return redirect('/admin/dashboard');
        }else{
            return redirect('/user/dashboard');
        }
    });

    Route::get('/banned',function(){
        return view('user.banned');
    })->name('banned');

    /* USER */
    Route::group(
        [
            'middleware'=>['is_user','is_banned'],
            'prefix'=>'user',
            'as'=>'user.',   
        ], function(){            
            Route::get('/dashboard', [UserDashBoardController::class,'dashboard'])->name('dashboard');            
            Route::get('/downline', [UserDashBoardController::class,'downline'])->name('downline');
            Route::get('/refincome', [UserDashBoardController::class,'refincome'])->name('refincome');                
            Route::get('pricing_table',function(){ 
                return redirect()->route('pricing');}
                )->name('pricing_table');            
            /* user bots */   
            Route::get('/bots/view-subscriptions',[UserBotController::class,'index'])->name('mybots');
            Route::get('/bots/purchase-subscription/{id}',[UserBotController::class,'create'])->name('purchase_bot');
            Route::post('/bots/complete-subscription/',[UserBotController::class,'store'])->name('complete_purchase');


            Route::get( '/wallets', [UserWalletController::class,'index'])->name('wallets'); 
            Route::post('/wallet/store',[UserWalletController::class,'store'])->name('wallet.store');   
            Route::get('/wallet/getWalletById/{id}',[UserWalletController::class,'getWalletById'])->name('wallet.getWalletById');  
            Route::patch('/wallet/update/{id}',[UserWalletController::class,'update'])->name('wallet.update');  
            Route::delete('/wallet/destroy/{id}',[UserWalletController::class,'destroy'])->name('wallet.destroy');      
            
            Route::get( '/investments', [UserInvestmentController::class,'index'])->name('investments'); 
            Route::get('/investment/create/{id}',[UserInvestmentController::class,'create'])->name('investment.create'); 
            
            Route::get( '/deposits', [UserDepositController::class,'index'])->name('deposits'); 
            Route::get('/deposit/create',[UserDepositController::class,'create'])->name('deposit.create'); 
                        
                    
            Route::get( '/withdrawal', [UserWithdrawalController::class,'index'])->name('withdrawals'); 
            Route::get('/withdrawal/create',[UserWithdrawalController::class,'create'])->name('withdrawal.create'); 

            Route::get( '/fiat_withdrawal', [UserFiatWithdrawalController::class,'index'])->name('fiat_withdrawals'); 
            Route::get('/fiat_withdrawal/create',[UserFiatWithdrawalController::class,'create'])->name('fiat_withdrawal.create');                                 
        }
    ); 
   
    /* ADMIN */
    Route::group(
        [
            'middleware'=>'is_admin',
            'prefix'=>'admin',
            'as'=>'admin.',
        ], function(){
        Route::get('/dashboard',[AdminDashBoardController::class,'index'])->name('dashboard');
        
        /* notifications */
        Route::get('/notifications',[AdminDashBoardController::class,'notifications'])->name('notifications');
        Route::get('/notification/{id}', [AdminDashBoardController::class,'readNotifications'])->name('notification');       
        Route::get('/resetpwd', [AdminDashBoardController::class,'resetpwd'])->name('resetpwd');
        Route::patch('/reset', [AdminDashBoardController::class,'reset'])->name('reset');        
        Route::get('/referralIncome',[AdminDashBoardController::class,'referralIncome'])->name('referralIncome');
        Route::get('/seereferrals/{id}',[AdminDashBoardController::class,'seereferrals'])->name('seereferrals');       
        Route::get('/getUserWallets/{id}',[WithdrawalController::class,'getUserWallets'])->name('getUserWallets');         
        
        
         /* user management */
        Route::resource( 'users' ,UsersController::class)->names([
            'index' => 'users',            
            'show' => 'user.show',                        
        ]);
        
        /* bots */
        Route::resource('/bots',AdminBotController::class)->names([
            'index' => 'bots',
            'create' => 'bots.create',
            'store' => 'bots.store',
            'edit' => 'bots.edit',
            'update' => 'bots.update',
            'destroy' => 'bots.destroy',
        ]);

        Route::resource('/subscriptions',AdminSubscriptionController::class);

        /* company wallets */
        Route::get('/company_wallets',[CompanyWalletController::class,'index'])->name('company_wallets');
        Route::get('/company_wallet/create/{id?}',[CompanyWalletController::class,'create'])->name('company_wallet.create');
        Route::post('/company_wallet/store',[CompanyWalletController::class,'store'])->name('company_wallet.store');        
        Route::get('/company_wallet/edit/{id}',[CompanyWalletController::class,'edit'])->name('company_wallet.edit');
        Route::patch('/company_wallet/update/{id}',[CompanyWalletController::class,'update'])->name('company_wallet.update');
        Route::delete('/company_wallet/delete/{id}',[CompanyWalletController::class,'destroy'])->name('company_wallet.destroy');        
    
        /* promo */
        Route::get('/promos',[PromoController::class,'index'])->name('promos');
        Route::get('/promo/create',[PromoController::class,'create'])->name('promo.create');
        Route::post('/promo/store',[PromoController::class,'store'])->name('promo.store');               
        

        /* plans */
        Route::get('/plans',[PlanController::class,'index'])->name('plans');
        Route::get('/plan/create/{id?}',[PlanController::class,'create'])->name('plan.create');
        Route::post('/plan/store',[PlanController::class,'store'])->name('plan.store');               
        Route::get('/plan/edit/{id}',[PlanController::class,'edit'])->name('plan.edit');
        Route::patch('/plan/update/{id}',[PlanController::class,'update'])->name('plan.update');
        Route::delete('/plan/destroy/{id}',[PlanController::class,'destroy'])->name('plan.destroy');

        /* company */
        Route::get('/company',[CompanyController::class,'index'])->name('company_details');       
        Route::get('/company/edit/{id}',[CompanyController::class,'edit'])->name('company_details.edit');
        Route::patch('/company/update/{id}',[CompanyController::class,'update'])->name('company_details.update');                
        Route::get('/company/certificate/{id}',[CompanyController::class,'getCertificate'])->name('company_details.certificate');
        Route::get('/company/pdf/{id}',[CompanyController::class,'getPdf'])->name('company_details.pdf');
        
        
        /* funding deposits */
        Route::resource('/deposits',FundingDepositController::class)->names([
            'index' => 'deposits',
            'create' => 'deposit.create',
            'store' => 'deposit.store',                        
        ]);

        /* investment deposits */
        Route::resource('/investment',InvestmentDepositController::class)->names([
            'index' => 'investments',
            'create' => 'investment.create',
            'store' => 'investment.store',                        
        ]);

        Route::get('fiatwithdrawals',function(){
            return view('admin.fiatwithdrawals');
        })->name('fiatwithdrawals');
            
        /* withdrawal */
        Route::resource('/withdrawals',WithdrawalController::class)->names([
            'index' => 'withdrawals',
            'create' => 'withdrawal.create',
            'store' => 'withdrawal.store',                        
        ]);


        /* team */
        Route::resource('/teamMembers',TeamController::class)->names([
            'index' => 'teamMembers',
            'create' => 'teamMembers.create',
            'store' => 'teamMembers.store',                      
            'edit' => 'teamMembers.edit',
            'destroy'=> 'teamMembers.destroy',
        ]);

        /* faqs */
        Route::resource('faqs',FaqsController::class)->names([
            'index' => 'faqs',
            'create' => 'faqs.create',
            'store' => 'faqs.store',                                 
            'edit' => 'faqs.edit',
            'destroy'=> 'faqs.destroy',
        ]);

        /* comments */
        Route::resource('/comments',CommentsController::class)->names([
            'index' => 'comments',
            'create' => 'comments.create',
            'store' => 'comments.store',                                 
            'edit' => 'comments.edit',
            'destroy'=> 'comments.destroy',
        ]);

        /* testimonials */
        Route::resource('/testimonials',TestimonialsController::class)->names([
            'index' => 'testimonials',
            'create' => 'testimonials.create',
            'store' => 'testimonials.store',                                 
            'edit' => 'testimonials.edit',
            'destroy'=> 'testimonials.destroy',
        ]);
       
            
        /* mail */ 
        Route::get('/getmail/{id?}',[MailController::class,'getmail'])->name('getmail');
        Route::post('/sendmail',[MailController::class,'sendmail'])->name('sendmail');
        Route::get('/sendBulkemail',[MailController::class,'sendBulkemail'])->name('sendBulkemail');
        Route::post('/bulkemail',[MailController::class,'bulkemail'])->name('bulkemail');

         /* blog categories */
         Route::resource('categories',CategoryController::class)->names([
            'index' => 'categories',
            'create' => 'categories.create',
            'store' => 'categories.store',                                 
            'edit' => 'categories.edit',
            'destroy'=> 'categories.destroy',
        ]);

         /* blog */
         Route::resource('articles',ArticlesController::class)->names([
            'index' => 'articles',
            'create' => 'articles.create',
            'store' => 'articles.store', 
            'show' => 'articles.show',                     
            'edit' => 'articles.edit',
            'destroy'=> 'articles.destroy',
        ]);

        Route::resource('/faketransaction',FakeTransactionController::class)->names([
            'index' => 'faketransaction.index',
            'create'=>'faketransaction.create',
            'store'=>'faketransaction.store',                                                     
            'edit' => 'faketransaction.edit',
            'update'=> 'faketransaction.update',
            'destroy'=>'faketransaction.destroy',
        ]);

    });
});