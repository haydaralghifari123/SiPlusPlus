<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORT CONTROLLERS (SATU KALI, TANPA DUPLIKASI)
|--------------------------------------------------------------------------
*/

// Backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Feature\CourseController;
use App\Http\Controllers\Backend\Feature\MitraController;
use App\Http\Controllers\Backend\Feature\TransactionController as FeatureTransactionController;
use App\Http\Controllers\Backend\Feature\WithdrawController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\PenggunaController;
use App\Http\Controllers\Config\WebconfigController;

// Frontend
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\KursusController;

// User
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UsercourseController;

// Mitra
use App\Http\Controllers\Mitra\RegistermitraController;
use App\Http\Controllers\Mitra\CoursemitraController;
use App\Http\Controllers\Mitra\MitraDashboardController;
use App\Http\Controllers\Mitra\TransactionmitraController;
use App\Http\Controllers\Mitra\WalletController;



/*
|--------------------------------------------------------------------------
| BACKEND (ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('backend')
    ->name('backend.')
    ->middleware(['auth','role:admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::prefix('master')->name('master.')->group(function () {

            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            });

            Route::prefix('user')->name('user.')->group(function () {
                Route::get('/', [PenggunaController::class, 'index'])->name('index');
                Route::get('/create', [PenggunaController::class, 'create'])->name('create');
                Route::post('/store', [PenggunaController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [PenggunaController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [PenggunaController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [PenggunaController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('feature')->name('feature.')->group(function () {

            Route::prefix('mitra')->name('mitra.')->group(function () {
                Route::get('/', [MitraController::class, 'index'])->name('index');
                Route::get('/show/{id}', [MitraController::class, 'show'])->name('show');
                Route::post('/accept', [MitraController::class, 'accept'])->name('accept');
            });

            Route::prefix('course')->name('course.')->group(function () {
                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('/show/{id}', [CourseController::class, 'show'])->name('show');
            });

            Route::prefix('transaction')->name('transaction.')->group(function () {
                Route::get('/', [FeatureTransactionController::class, 'index'])->name('index');
                Route::get('/show/{id}', [FeatureTransactionController::class, 'show'])->name('show');
                Route::get('/export-pdf', [FeatureTransactionController::class, 'exportPdf'])->name('export-pdf');
                Route::get('/export-pdf-all', [FeatureTransactionController::class, 'exportPdfAll'])->name('export-pdf-all');
            });

            Route::prefix('withdraw')->name('withdraw.')->group(function () {
                Route::get('/', [WithdrawController::class, 'index'])->name('index');
                Route::get('/sent/{id}', [WithdrawController::class, 'sent'])->name('sent');
            });
        });

        Route::prefix('config')->name('config.')->group(function () {
            Route::get('/', [WebconfigController::class, 'index'])->name('index');
            Route::post('/', [WebconfigController::class, 'store'])->name('store');
            Route::put('/', [WebconfigController::class, 'update'])->name('update');
            Route::delete('/', [WebconfigController::class, 'destroy'])->name('destroy');
        });
    });



/*
|--------------------------------------------------------------------------
| FRONTEND (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::name('frontend.')->group(function () {

    Route::get('/', [WelcomeController::class, 'index'])->name('index');

    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/{mitraSlug}/{courseSlug}', [KursusController::class, 'show'])
            ->name('show');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/{slug}', [FrontendCategoryController::class, 'show'])
            ->name('show');
    });
});



/*
|--------------------------------------------------------------------------
| USER AREA (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::prefix('user')->name('user.')->group(function () {

        Route::get('/dashboard', [UserDashboard::class, 'index'])
            ->name('dashboard');

        Route::prefix('transaction')->name('transaction.')->group(function () {
            Route::get('/', [TransactionController::class, 'index'])->name('index');
            Route::post('/store', [TransactionController::class, 'store'])->name('store');
            Route::get('/invoice/{invoice}', [TransactionController::class, 'invoice'])->name('invoice');
            Route::get('/export-pdf', [TransactionController::class, 'exportPdf'])->name('export-pdf');
        });

        Route::prefix('course')->name('course.')->group(function () {
            Route::get('/', [UsercourseController::class, 'index'])->name('index');
            Route::get('/learn/{id}/{progress}', [UsercourseController::class, 'learn'])->name('learn');
        });
    });

    Route::prefix('mitra')->name('mitra.')->group(function () {
        Route::get('/register', [RegistermitraController::class, 'register'])->name('register');
        Route::post('/register', [RegistermitraController::class, 'store'])->name('register.store');
    });
});



/*
|--------------------------------------------------------------------------
| MITRA AREA (ROLE: MITRA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:mitra'])
    ->prefix('mitra')
    ->name('mitra.')
    ->group(function () {

        Route::get('/dashboard', [CoursemitraController::class, 'index'])
            ->name('dashboard');

        Route::prefix('course')->name('course.')->group(function () {
            Route::get('/', [CoursemitraController::class, 'index'])->name('index');
            Route::get('/create', [CoursemitraController::class, 'create'])->name('create');
            Route::get('/show/{id}', [CoursemitraController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [CoursemitraController::class, 'edit'])->name('edit');
            Route::post('/store', [CoursemitraController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CoursemitraController::class, 'update'])->name('update');
        });

        Route::prefix('transaction')->name('transaction.')->group(function () {
            Route::get('/', [TransactionmitraController::class, 'index'])->name('index');
            Route::get('/export-pdf', [TransactionmitraController::class, 'exportPdf'])->name('export-pdf');
        });

        Route::prefix('wallet')->name('wallet.')->group(function () {
            Route::get('/', [WalletController::class, 'index'])->name('index');
            Route::post('/withdraw', [WalletController::class, 'withdraw'])->name('withdraw');
        });
    });



/*
|--------------------------------------------------------------------------
| FRONTEND ROUTE ALIASES (UNTUK BLADE LAMA)
|--------------------------------------------------------------------------
*/

// dashboard user
Route::get('/user/dashboard', [UserDashboard::class, 'index'])
    ->name('frontend.user.dashboard');

// user course
Route::get('/user/course', [UsercourseController::class, 'index'])
    ->name('frontend.user.course.index');

// user transaction (index)
Route::get('/user/transaction', [TransactionController::class, 'index'])
    ->name('frontend.user.transaction.index');

// user transaction invoice
Route::get('/user/transaction/invoice/{invoice}', [TransactionController::class, 'invoice'])
    ->name('frontend.user.transaction.invoice');

// mitra register
Route::get('/mitra/register', [RegistermitraController::class, 'register'])
    ->name('frontend.mitra.register.index');

// mitra register (POST / store)
Route::post('/mitra/register', [RegistermitraController::class, 'store'])
    ->name('frontend.mitra.register.store');

/*
|--------------------------------------------------------------------------
| FRONTEND MITRA ALIAS (UNTUK TEMPLATE LAMA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:mitra'])->prefix('mitra')->group(function () {
    // dashboard mitra
    Route::get('/dashboard', [MitraDashboardController::class, 'index'])
        ->name('frontend.mitra.dashboard');

// mitra course
Route::get('/mitra/course', [CoursemitraController::class, 'index'])
    ->name('frontend.mitra.course.index');

Route::get('/mitra/course/create', [CoursemitraController::class, 'create'])
    ->name('frontend.mitra.course.create');

Route::get('/mitra/course/show/{id}', [CoursemitraController::class, 'show'])
    ->name('frontend.mitra.course.show');

Route::get('/mitra/course/edit/{id}', [CoursemitraController::class, 'edit'])
    ->name('frontend.mitra.course.edit');

Route::post('/mitra/course/store', [CoursemitraController::class, 'store'])
    ->name('frontend.mitra.course.store');

Route::post('/mitra/course/update/{id}', [CoursemitraController::class, 'update'])
    ->name('frontend.mitra.course.update');

// mitra transaction
Route::get('/mitra/transaction', [TransactionmitraController::class, 'index'])
    ->name('frontend.mitra.transaction.index');

Route::get('/mitra/transaction/export-pdf', [TransactionmitraController::class, 'exportPdf'])
    ->name('frontend.mitra.transaction.export-pdf');

// mitra wallet
Route::get('/mitra/wallet', [WalletController::class, 'index'])
    ->name('frontend.mitra.wallet.index');

Route::post('/mitra/wallet/withdraw', [WalletController::class, 'withdraw'])
    ->name('frontend.mitra.wallet.withdraw');

    });

Route::get('/info', function () {
    return view('frontend.info');
})->name('frontend.info');

/*
|--------------------------------------------------------------------------
| MIDTRANS CALLBACK (PAYMENT NOTIFICATION)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\MidtransCallbackController;

Route::post('/midtrans/callback', [MidtransCallbackController::class, 'handle'])
    ->name('midtrans.callback');


require __DIR__.'/auth.php';
