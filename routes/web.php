<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PeriodController, DivisionController, PositionController,
    MemberController, MemberPeriodRoleController,
    ProgramController, ProgramMemberController,
    EventController
};
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Letter\{LetterTypeController, LetterController};
use App\Http\Controllers\EventBrowseController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // ====== USER (anggota) ======
    Route::get('/events', [EventBrowseController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventBrowseController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/checkin', [AttendanceController::class, 'checkin'])->name('events.checkin');

    // ====== ADMIN AREA ======
    Route::prefix('admin')->name('admin.')->middleware('role:superadmin|admin')->group(function () {
        Route::resource('periods', PeriodController::class);
        Route::resource('divisions', DivisionController::class);
        Route::resource('positions', PositionController::class);

        Route::resource('members', MemberController::class);
        Route::resource('member-period-roles', MemberPeriodRoleController::class);

        Route::resource('programs', ProgramController::class);
        Route::resource('program-members', ProgramMemberController::class);

        Route::resource('events', EventController::class);
        Route::get('events/{event}/recap', [EventController::class, 'recap'])->name('events.recap');

        Route::post('events/{event}/open-attendance', [EventController::class, 'openAttendance'])
            ->name('events.openAttendance');

        Route::post('events/{event}/close-attendance', [EventController::class, 'closeAttendance'])
            ->name('events.closeAttendance');
    });

    // ====== SURAT ======
    Route::prefix('letters')->name('letters.')->group(function () {

        Route::middleware('role:superadmin|admin|sekretaris')->group(function () {
            Route::resource('types', LetterTypeController::class)->except(['show']);
            Route::resource('/', LetterController::class)->parameters(['' => 'letter']);
            Route::post('{letter}/submit', [LetterController::class, 'submit'])->name('submit');
        });

        Route::middleware('role:superadmin|admin|ketua')->group(function () {
            Route::post('{letter}/approve', [LetterController::class, 'approve'])->name('approve');
            Route::post('{letter}/reject', [LetterController::class, 'reject'])->name('reject');
        });
    });
});

require __DIR__.'/auth.php';
