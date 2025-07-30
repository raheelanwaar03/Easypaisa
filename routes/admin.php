<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WidthrawRequestsController;
use Illuminate\Support\Facades\Route;



Route::prefix('Admin/')->name('Admin.')->middleware('auth', 'admin')->group(function () {

    Route::get('Dashboard', [AdminDashboardController::class, 'index'])->name('Dashboard');
    // Edit user
    Route::get('User/Details/{id}', [AdminDashboardController::class, 'editUser'])->name('Edit.User');
    Route::post('Update/User/Details/{id}', [AdminDashboardController::class, 'updateUser'])->name('Update.User.Details');

    Route::get('Pending/Users', [AdminDashboardController::class, 'pending'])->name('Pending.Users');
    Route::get('Approved/Users', [AdminDashboardController::class, 'approved'])->name('Approved.Users');
    Route::get('Rejected/Users', [AdminDashboardController::class, 'rejected'])->name('Rejected.Users');
    Route::get('Make/User/Approve/{id}', [AdminDashboardController::class, 'makeApprove'])->name('Make.User.Approve');
    Route::get('Make/User/Reject/{id}', [AdminDashboardController::class, 'makeReject'])->name('Make.User.Reject');
    Route::get('Make/User/Pending/{id}', [AdminDashboardController::class, 'makePending'])->name('Make.User.Pending');
    Route::get('Add/Plans', [PlansController::class, 'add'])->name('Add.Plans');
    Route::get('All/Plans', [PlansController::class, 'all'])->name('All.Plans');
    Route::get('Edit/Plan/{id}', [PlansController::class, 'edit'])->name('Edit.Plan');
    Route::post('Update/Plan/{id}', [PlansController::class, 'update'])->name('Update.Plan');
    Route::post('Store/Plans', [PlansController::class, 'store'])->name('Store.Plans');
    Route::get('Users/Pending/Buy/Plan/Requests', [PlansController::class, 'pendingRequests'])->name('Requests.Pending.Plans.Users');
    Route::get('Users/Approved/Buy/Plan/Requests', [PlansController::class, 'approvedRequests'])->name('Requests.Approved.Plans.Users');
    Route::get('Users/Rejected/Buy/Plan/Requests', [PlansController::class, 'rejectedRequests'])->name('Requests.Rejected.Plans.Users');
    Route::get('Make/Plan/Requests/Pending/{id}', [PlansController::class, 'pendingRequest'])->name('Make.Buy.Request.Pending');
    Route::get('Make/Plan/Requests/Approved/{id}', [PlansController::class, 'approveRequest'])->name('Make.Buy.Request.Approved');
    Route::get('Make/Plan/Requests/Rejeted/{id}', [PlansController::class, 'rejectedRequest'])->name('Make.Buy.Request.Rejected');
    // Widthraw Requests
    Route::get('Pending/Widthraw/Requests', [WidthrawRequestsController::class, 'pending'])->name('Pending.Widthraw');
    Route::get('Approved/Widthraw/Requests', [WidthrawRequestsController::class, 'approved'])->name('Approved.Widthraw');
    Route::get('Rejected/Widthraw/Requests', [WidthrawRequestsController::class, 'rejected'])->name('Rejected.Widthraw');
    Route::get('Make/Widthraw/Pending/{id}', [WidthrawRequestsController::class, 'makePending'])->name('Make.Pending.Widthraw');
    Route::get('Make/Widthraw/Approved/{id}', [WidthrawRequestsController::class, 'makeApproved'])->name('Make.Approved.Widthraw');
    Route::get('Make/Widthraw/Rejected/{id}', [WidthrawRequestsController::class, 'makeRejected'])->name('Make.Rejected.Widthraw');

    // Setting routes

    // Level setting routes
    Route::get('Level/Setting', [SettingController::class, 'allLevels'])->name('All.Levels');
    Route::get('Edit/Level/Setting/{id}', [SettingController::class, 'editLevel'])->name('Edit.Level');
    Route::post('Update/Level/Setting/{id}', [SettingController::class, 'updateLevel'])->name('Update.Level');
    // Widthraw Limites
    Route::get('Widthraw/Limits', [SettingController::class, 'widthrawLimites'])->name('Widthraw.Limits');
    Route::get('Edit/Widthraw/Limit/{id}', [SettingController::class, 'editWidthrawLimites'])->name('Edit.Widthraw.Limit');
    Route::post('Update/Widthraw/Limit/{id}', [SettingController::class, 'updateWidthrawLimites'])->name('Update.Widthraw.Limit');
    // text
    Route::get('Verfication/Page/Text', [SettingController::class, 'text'])->name('Verification.Text');
    Route::get('Edit/Verfication/Page/Text/{id}', [SettingController::class, 'editText'])->name('Edit.Verification.Text');
    Route::post('Update/Verfication/Page/Text/{id}', [SettingController::class, 'updateText'])->name('Update.Verification.Text');
    // easypaisa
    Route::get('Easypaisa/Number', [SettingController::class, 'easypaisa'])->name('Easypaisa.Num');
    Route::get('Edit/Easypaisa/Number', [SettingController::class, 'editEasypaisa'])->name('Edit.Easypaisa.Num');
    Route::post('Update/Easypaisa/Number', [SettingController::class, 'updateEasypaisa'])->name('Update.Easypaisa.Num');
    // plans
    Route::get('All/Plans/Details', [SettingController::class, 'homePlans'])->name('All.Home.Plans');
    Route::get('Edit/Plan/Details/{id}', [SettingController::class, 'editPlan'])->name('Edit.Home.Plan');
    Route::get('Update/Plan/Details/{id}', [SettingController::class, 'updatePlan'])->name('Update.Home.Plan');
    // Add task
    Route::get('Add/Task', [AdminTaskController::class, 'add'])->name('Add.Task');
    Route::get('All/Task', [AdminTaskController::class, 'all'])->name('All.Task');
    Route::post('Store/Task', [AdminTaskController::class, 'store'])->name('Store.Task');
    Route::get('Delete/Task/{id}', [AdminTaskController::class, 'delete'])->name('Delete.Task');
});
