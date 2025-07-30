<?php

use App\Http\Controllers\User\InvestmentController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('User/')->name('User.')->middleware('auth', 'user')->group(function () {

    Route::get('Dashboard',[UserDashboardController::class,'index'])->name('Dashboard');
    Route::get('Widthraw/Amount',[UserDashboardController::class,'widthraw'])->name('Widthraw.Amount');
    Route::post('Store/Widthraw',[UserDashboardController::class,'storeWidthraw'])->name('Store.Widthraw');
    Route::get('Widthraw/History',[UserDashboardController::class,'history'])->name('Widthraw.History');
    Route::get('Team/Members',[UserDashboardController::class,'team'])->name('Team.Members');
    Route::get('Task',[UserDashboardController::class,'task'])->name('Task');
    Route::get('Invest',[InvestmentController::class,'index'])->name('Investment.Plans');
    // buy plan
    Route::get('Buy/Plan/{id}',[InvestmentController::class,'buyPlan'])->name('Buy.Plan');
    Route::post('Store/Plan/{id}',[InvestmentController::class,'storePlan'])->name('Store.Plan');
    Route::get('Active/Plans',[InvestmentController::class,'activePlan'])->name('Active.Plan');
    Route::get('Daily/Profit',[InvestmentController::class,'dailyProfit'])->name('Daily.Profit');
    Route::get('Convert',[InvestmentController::class,'convert'])->name('Convert.Balance');


});
