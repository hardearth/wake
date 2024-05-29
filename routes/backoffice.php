<?php

use App\Http\Controllers\Admin\ActivitiesController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseLiveController;
use App\Http\Controllers\Admin\CrudUserController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\User\CourseLiveRegisterController;
use App\Http\Controllers\User\TeacherController;
use App\Http\Controllers\User\UserActivityController;
use App\Http\Controllers\User\UserCourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::impersonate();
Route::get('/home', [UserController::class, 'home'])->name('user.home');
Route::middleware([
    'roles:user|teacher',
])->group(function () {

    Route::get('/act/register/{activity}', [UserController::class, 'registerActivity'])->name('user.register-activity');
    Route::prefix('/u')->name('user.')->group(function () {
//            Route::get('/course/show/{slug}', 'course')->name('show.course');
        Route::controller(UserController::class)->group(function () {
            Route::prefix('profile')->group(function () {
                Route::get('/', 'profile')->name('profile');
                Route::post('/update', 'profileUpdate')->name('profile.update');
                Route::post('/update/teacher', 'profileUpdateTeacher')->name('profile.update.teacher');
                Route::post('/update/socials', 'profileUpdateSocials')->name('profile.update.socials');
                Route::post('/update/pass', 'passwordUpdate')->name('profile.update.password')->middleware('password.confirm');
                Route::post('/update/img', 'profileUpdateImage')->name('profile.update.image');
                Route::get('/remove/img', 'profileRemoveImage')->name('profile.remove.image');
            });

            Route::get('affiliates', 'affiliates')->name('affiliates');
            Route::get('sales', 'sales')->name('sales');
            Route::get('markets', 'markets')->name('markets');
            Route::get('addWallet', 'addWallet')->name('addWallet');
            Route::get('shopping', 'shopping')->name('shopping');
        });


        Route::prefix('/courses')->name('course.')->controller(UserCourseController::class)->group(function () {
            Route::get('/c/{course}/{lesson?}', 'index')->name('lesson');
            Route::get('/list', 'myCourses')->name('my-courses');
            Route::get('/my-notes', 'myNotes')->name('my-notes');
            Route::get('/download/{document}', 'downloadDocument')->name('document-download');
            Route::post('/courses/{course}/comments', 'storeComment')->name('comments.store');
            Route::get('/courses/{course}/feedback', 'feedback')->name('feedback');
            Route::post('/courses/{course}/feedback/store', 'storeFeedback')->name('feedback.store');
            Route::post('/courses/lesson/new-note', 'ajaxLessonRegisterNewNote')->name('new-note.store');
            Route::post('/courses/lesson/note/update', 'ajaxLessonUpdateNote')->name('note.update');
            Route::get('/courses/lesson/note/delete/{note}', 'ajaxLessonDeleteNote')->name('note.delete');
        });
        Route::prefix('/activity/')->name('activities.')->controller(UserActivityController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
        Route::prefix('course/live')->controller(CourseLiveRegisterController::class)->name('live.')->group(function () {
            Route::get('/register/{slug}', 'register')->name('register');
            Route::get('/user/index', 'index')->name('index');
        });
    });
});

Route::middleware(['roles:teacher'])->prefix('teacher')->name('admin.')->group(function () {
    Route::prefix('payments')->controller(TeacherController::class)->group(function () {
        Route::get('payments', 'payments')->name('teacher.payments');
        Route::get('students', 'students')->name('teacher.students');
    });
});
Route::middleware(['roles:superadmin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('cruds')->name('cruds.')->group(function () {

        Route::prefix('users')->controller(CrudUserController::class)->group(function () {
            Route::get('/', 'index')->name('user');
            Route::get('/create', 'create')->name('user.create');
            Route::post('/store/', 'store')->name('user.store');
            Route::get('/edit/{user}', 'edit')->name('user.edit');
            Route::put('/update/{user}', 'update')->name('user.update');
        });

    });
    Route::prefix('activities')->name('activities.')->controller(ActivitiesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store/{activity?}', 'store')->name('store');
        Route::get('/edit/{activity}', 'edit')->name('edit');
        Route::put('/update/{activity}', 'update')->name('update');
        Route::delete('/destroy/{activity}', 'destroy')->name('destroy');
    });
    Route::prefix('course')->name('course.')->controller(CourseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::post('/edit/{course}', 'editCourse')->name('edit');
        Route::get('/show/{course}', 'show')->name('show');
        Route::get('/delete/{course}', 'delete')->name('delete');
        Route::post('add/user/{course}', 'addUserToCourse')->name('add.user');
        Route::prefix('module')->name('module.')->group(function () {
            Route::post('store/{module?}', 'storeModule')->name('store');
            Route::get('delete/{module}', 'deleteModule')->name('delete');
        });
        Route::prefix('lesson')->name('lesson.')->group(function () {
            Route::post('store/{lesson?}', 'storeLesson')->name('store');
            Route::get('delete/{lesson}', 'deleteLesson')->name('delete');
        });
        Route::prefix('document')->name('document.')->group(function () {
            Route::post('store/{document?}', 'storeDocument')->name('store');
            Route::get('delete/{document}', 'deleteDocument')->name('delete');
            Route::get('download/{document}', 'downloadDocument')->name('download');
        });

        Route::prefix('live')->controller(CourseLiveController::class)->name('live.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{liveLesson}', 'edit')->name('edit');
            Route::post('/update/{liveLesson}', 'update')->name('update');
            Route::get('/delete/{liveLesson}', 'delete')->name('delete');
        });
    });
//        Route::get('/course', CourseIndex::class)->name('course.index');
//        Route::get('/show/{course}', CourseShow::class)->name('course.show');

    Route::prefix('membership')->controller(MembershipController::class)->name('membership.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
        Route::get('/edit/{membership}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/course/add', 'courseAdd')->name('course.add');
        Route::post('/course/delete', 'courseDelete')->name('course.delete');
    });

});

