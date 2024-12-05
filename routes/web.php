<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\QuestionBulkImportController;
use App\Http\Controllers\PhonePeController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\studentuserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\studentdashboardController;
use App\Http\Controllers\QutionandAnsController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExamReviewController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\addQutionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\uplodeControllerName;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExamAttemptsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestSeriesPackageController;
use App\Http\Controllers\SolutionFileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ExampackageController;
use App\Http\Controllers\SubscriptionController;

use App\Http\Controllers\StudentDetailsMail;




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

/*--------------------------ADMIN API---------------------------------
---------------------------------------------------------------------------------ADMIN API-------------*/


// Route::get('/', function () {
//     return view('index');
// });



// Route::get('/', [StudentController::class, 'frontendindex'])->name('index');


Route::resource('solution_files', SolutionFileController::class);

Route::get('Admin/solution_files/index', [SolutionFileController::class, 'index'])->name('Admin.solution_files.index');
// Route::get('/solution_files/pdf/{id}', [SolutionFileController::class, 'showPdf'])->name('soluPdf');

// In web.php
// Route::get('/solution-files/{id}', [SolutionFileController::class, 'showPdf'])->name('soluPdf');
Route::get('solution_files/view/{id}', [SolutionFileController::class, 'viewPdf'])->name('soluPdf');
Route::post('solution_files', [SolutionFileController::class, 'store'])->name('solution_files.store');



Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', [StudentController::class, 'frontendindex'])->name('frontend.index');
/**
 * Admin routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('admins', AdminsController::class);

    // Login Routes.
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');

    // Logout Routes.
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Forget Password Routes.
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('password.update');
})->middleware('auth:admin');

// Quiz ADMIN PANAL  ROUTES
// Protect admin dashboard with 'auth:admin' middleware
Route::middleware(['auth:admin'])->group(function () {
  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/admins/roles', [RolesController::class, 'index'])->name('admin.roles.index');
  Route::get('/roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
  Route::post('/roles', [RolesController::class, 'store'])->name('admin.roles.store');
  Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('admin.roles.edit');
  Route::put('/roles/{id}', [RolesController::class, 'update'])->name('admin.roles.update');
  Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('admin.roles.destroy');
 

  
  Route::get('/admins', [AdminsController::class, 'index'])->name('admin.admins.index');
  Route::get('/admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
  Route::post('/admins', [AdminsController::class, 'store'])->name('admin.admins.store');
  Route::get('/admins/{id}/edit', [AdminsController::class, 'edit'])->name('admin.admins.edit');
  Route::put('/admins/{id}', [AdminsController::class, 'update'])->name('admin.admins.update');
  Route::delete('/admins/{id}', [AdminsController::class, 'destroy'])->name('admin.admins.destroy');
});

Route::get('/Admin/Quiz/create', [QuestionController::class, 'create'])->name('Admin.Quiz.create');

Route::get('/Admin/Quiz/question-details', [QuestionController::class, 'question_details'])->name('Admin.Quiz.question-details');

Route::post('/Admin/Quiz/create', [QuestionController::class, 'store'])->name('Admin.Quiz.create.store');
//Route::get('/Admin/Quiz/index', [QuestionController::class, 'index'])->name('Admin.Quiz.index');

Route::post('upload-question-paper', [QuestionController::class, 'upload'])->name('uploadQuestionPaper');

// Feedback

Route::get('/Admin/Feedback/index', [FeedbackController::class, 'index'])->name('Admin.Feedback.index');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


//  Ranking
Route::get('/Admin/Ranking/index', [RankingController::class, 'index'])->name('Admin.Ranking.index');

//user record
Route::get('/Admin/User/index', [studentuserController::class, 'index'])->name('Admin.User.index');

Route::delete('/admin/user/{id}', [studentuserController::class, 'destroy'])->name('Admin.user.destroy');

/*--------------------------Quiz routes---------------------------------
---------------------------------------------------------------------------------QUIZ ROUTES-------------*/



Route::post('/Admin/subjects/index', [SubjectController::class, 'store'])->name('Admin.subjects.store');
Route::get('/Admin/Exam/index', [SubjectController::class, 'markindex'])->name('Admin.Exam.index');
Route::get('/Admin/Exam/create', [SubjectController::class, 'markcreate'])->name('Admin.Exam.create');
Route::post('/Admin/Exam/index', [SubjectController::class, 'markstore'])->name('Admin.Exam.store');
// Route::get('/{id}/edit', [SubjectController::class, 'markedit'])->name('Admin.Exam.edit');
// Route::put('/{id}', [SubjectController::class, 'markupdate'])->name('Admin.Exam.update');
// Route::delete('/{id}', [SubjectController::class, 'markdestroy'])->name('Admin.Exam.destroy');

// Route::get('admin/exams/{id}/edit', [SubjectController::class, 'markedit'])->name('Admin.Exam.edit');
// Route::put('admin/exams/{id}', [SubjectController::class, 'markupdate'])->name('Admin.Exam.update');
// Route::delete('admin/exams/{id}', [SubjectController::class, 'markdestroy'])->name('Admin.Exam.destroy');
Route::get('admin/exam/{id}/edit', [SubjectController::class, 'markedit'])->name('Admin.Exam.edit');
// Route::post('admin/exam/{id}/update', [SubjectController::class, 'markupdate'])->name('Admin.Exam.update');
Route::delete('admin/exam/{id}/delete', [SubjectController::class, 'markdestroy'])->name('Admin.Exam.destroy');
Route::get('admin/exam/{id}/view', [SubjectController::class, 'markview'])->name('Admin.Exam.view');
Route::put('/admin/exam/{id}', [SubjectController::class, 'markupdate'])->name('Admin.Exam.update');

// In routes/web.php
Route::get('admin/subjects/index', [SubjectController::class, 'index'])->name('Admin.subjects.index');
Route::resource('admin/subjects', SubjectController::class);

Route::get('admin/subjects/{id}', [SubjectController::class, 'view'])->name('Admin.subjects.view');
Route::get('admin/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('Admin.subjects.edit');
Route::delete('admin/subjects/{id}/delete', [SubjectController::class, 'destroy'])->name('Admin.subjects.destroy');
Route::post('admin/subjects/{id}/update', [SubjectController::class, 'update'])->name('Admin.subjects.update');

Route::get('admin/subjects/create', [SubjectController::class, 'create'])->name('Admin.subjects.create');

//Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
Route::resource('quizzes', QuizController::class);
//Route::post('/questions/add', [QuizController::class, 'addQuestions'])->name('questions.add');
//Route::post('/quizzes', [QuizController::class, 'store'])->name('quiz.store');
Route::post('/admin/quiz/store', [QuizController::class, 'store'])->name('Admin.Quiz.store');


Route::get('/Admin/Quiz/index', [QuizController::class, 'index'])->name('Admin.Quiz.index');

//Route::post('/Admin/Quiz/store', [QuizController::class, 'store'])->name('Admin.Quiz.store');
Route::post('/quiz/calculate', [QuizController::class, 'calculateMarks'])->name('quiz.calculate');
Route::get('/questions/form', [QuestionController::class, 'showForm'])->name('questions.form');

Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
Route::post('/add-questions', [QuizController::class, 'addQuestions'])->name('questions.add');
Route::get('/question-details/{quizId}/{totalQuestions}', [QuizController::class, 'showQuestionForm'])->name('Admin.Quiz.question-details');
//Route::get('/admin/quiz/{quizId}/question-details/{totalQuestions}', [QuizController::class, 'questionDetails'])->name('Admin.Quiz.question-details');

/*-------------USER /  Route::get('/question-details/{quizId}/{totalQuestions}', [QuizController::class, 'showQuestionForm'])->name('question.details');
MANAGMENT---------------------------------- PAYMENT--------------------------
----------------------------------------------------------------------USER MANAGMENT /    STUDENT---------------*/


Route::get('/Admin/User/create', [studentdashboardController::class, 'create'])->name('Admin.User.create');
Route::get('/Admin/User/index', [studentdashboardController::class, 'index'])->name('Admin.User.index');

// routes/web.php
Route::get('/register', [studentdashboardController::class, 'showRegistrationForm']);
Route::post('/register', [studentdashboardController::class, 'register']);
Route::get('/admin/User/index', [studentdashboardController::class, 'index'])->middleware('auth');

Route::get('/admin/student/{id}', [studentdashboardController::class, 'showStudentDetails'])->middleware('auth');

Route::get('/Admin/User/create', [studentdashboardController::class, 'showRegistrationForm'])->name('Admin.User.create');
Route::post('/Admin/User/create', [studentdashboardController::class, 'register'])->name('Admin.User.create.submit');
Route::post('/Admin/User/registration_student', [studentdashboardController::class, 'registration_student'])->name('Admin.User.registration_student');
Route::get('/Admin/User/registration_student', [studentdashboardController::class, 'registration_student'])->name('Admin.User.registration_student');

//Route::post('/Admin/User/registration_student', [studentuserController::class, 'register'])->name('Admin.User.registration_student');
Route::post('/Admin/User/registration_student', [studentuserController::class, 'register'])->name('Admin.User.registration_student');

//Route::prefix('admin')->middleware('admin')->group(function () {
  //  Route::get('/Admin/User/create', [studentdashboardController::class, 'showRegistrationForm'])->name('Admin.User.create');
  //  Route::post('/Admin/User/create', [studentdashboardController::class, 'register'])->name('Admin.User.create.submit');
//});
Route::get('/exam/{examId}/questions', [ExamController::class, 'fetchQuestions']);
// Example route definition
// Route::get('/exam/{examId}/questions', [ExamController::class, 'getQuestions'])->name('exam.test');

Route::get('/exam/questions', [ExamController::class, 'getQuestions']);

// Route::get('/exam/{subject}', [ExamController::class, 'showQuestions'])->name('exam.show');
Route::post('/exam/submit', [ExamController::class, 'submitAnswer'])->name('exam.submit');
Route::get('/exam/finish', [ExamController::class, 'finish'])->name('exam.finish');
// Route::get('/quiz/{examId}', 'ExamController')->name('quiz.show');

/*--------------------------Q & A routes---------------------------------
---------------------------------------------------------------------------------Q & A routes-------------*/
Route::resource('quizzes', QutionandAnsController::class);

//Route::get('/Admin/Q&A/index', [QutionandAnsController::class, 'index'])->name('Admin.Q&A.index');
//Route::get('/Admin/Q&A/create', [QutionandAnsController::class, 'create'])->name('Admin.Q&A.create');

// Display a list of quizzes

// Show the form to create a new quiz
// routes/web.php



// Store a new quiz
Route::post('/admin/q-and-a', [QutionandAnsController::class, 'store'])->name('Admin.Q&A.store');

// Show the form to edit an existing quiz
Route::get('/Admin/Q&A/{id}/edit', [QutionandAnsController::class, 'edit'])->name('Admin.Q&A.edit');

// Update an existing quiz
Route::put('/Admin/Q&A/{id}', [QutionandAnsController::class, 'update'])->name('Admin.Q&A.update');
 // Route to show the form for editing an existing question
 Route::get('/Admin/Q&A/{id}/edit', [StudentDetailsMail::class, 'edit'])->name('Admin.Q&A.edit');

 Route::get('/Admin/Q&A/ansedit/{id}', [uplodeControllerName::class, 'ansEdit'])->name('Admin.Q&A.ansedit');

 Route::put('/Admin/Q&A/{id}', [StudentDetailsMail::class, 'update'])->name('Admin.Q&A.update');

 
 Route::put('/Admin/Q&A/{id}', [uplodeControllerName::class, 'update'])->name('questions.update');

 // Route to update the question in the database
 Route::put('/Admin/Q&A/{id}', [StudentDetailsMail::class, 'update'])->name('Admin.Q&A.update');

 // Route to delete a question from the database
 Route::delete('/Admin/Q&A/{id}', [StudentDetailsMail::class, 'destroy'])->name('Admin.Q&A.destroy');
// Delete a quiz
Route::delete('/Admin/Q&A/{id}', [QutionandAnsController::class, 'destroy'])->name('Admin.Q&A.destroy');
Route::post('/Admin/Q&A/index', [QuizController::class, 'store'])->name('Admin.Q&A.index');
Route::get('/quizzes/qnsview/{id}', [StudentDetailsMail::class, 'Qnsview'])->name('Admin.Q&A.Qnsview');
Route::get('/quizzes/ansview/{id}', [StudentDetailsMail::class, 'Ansview'])->name('Admin.Q&A.Ansview');
Route::get('/Admin/Q&A/add_qution', [StudentDetailsMail::class, 'index'])->name('Admin.Q&A.add_qution');

Route::get('/quizzes/partview/{answer}', [QutionandAnsController::class, 'partview'])->name('Admin.Q&A.partview');
Route::get('/quizzes/subjectview/{answer}', [QutionandAnsController::class, 'subjectview'])->name('Admin.Q&A.subjectview');
Route::get('/quizzes/{id}', [QutionandAnsController::class, 'show'])->name('quizzes.show');


Route::post('/quizzes/toggle-publish/{id}', [QutionandAnsController::class, 'togglePublish'])->name('quizzes.toggle-publish');

// routes/web.php
Route::get('/admin/questions/create', [addQutionController::class, 'create'])->name('Admin.Q&A.create');



Route::post('/Admin/Q&A/index', [addQutionController::class, 'store'])->name('questionsnew.add');





// Route to download the PDF

// Route to show quiz details as a view
// Route::get('admin/qna/show-pdf/{id}', [QutionandAnsController::class, 'showQnsviewPdf'])->name('Admin.Q&A.showQnsviewPdf');
Route::get('admin/q-and-a/download/{id}', [StudentDetailsMail::class, 'downloadQnsviewPdf'])->name('Admin.Q&A.downloadQnsviewPdf');

Route::patch('/admin/exams/{id}/publish', [QutionandAnsController::class, 'togglePublish'])->name('exams.togglePublish');


Route::get('admin/qna/show-answers/{id}', [QutionandAnsController::class, 'showAnsviewPdf'])->name('Admin.Q&A.showAnsviewPdf');

// Route to download answers view PDF
Route::get('admin/qna/download-answers/{id}', [StudentDetailsMail::class, 'downloadAnsviewPdf'])->name('Admin.Q&A.downloadAnsviewPdf');



/*-------------------------- Mark  routes---------------------------------
---------------------------------------------------------------------------------Mark -------------*/

Route::resource('marks', MarksController::class);
Route::delete('/quiz_results/{id}', [MarksController::class, 'destroy'])->name('quiz_results.destroy');

Route::get('/Admin/Mark/index', [MarksController::class, 'index'])->name('Admin.Mark.index');
Route::get('/Admin/User/exam-attend', [ExamAttemptsController::class, 'index'])->name('Admin.User.exam-attend');
Route::get('/Admin/User/Not-attend', [ExamAttemptsController::class, 'Attend'])->name('Admin.User.Not-attend');
Route::get('/Admin/User/result', [ExamAttemptsController::class, 'result'])->name('Admin.User.result');


/*-------------------------- pyment  routes---------------------------------
---------------------------------------------------------------------------------pyment  -------------*/
Route::resource('payments', PaymentController::class);

Route::get('/Admin/Payment/index', [PaymentController::class, 'index'])->name('Admin.Payment.index');

/*-------------------------- EXAM REVIEW  routes---------------------------------
--------------------------------------------------------------------------------- EXAM REVIEW  -------------*/
Route::resource('/Admin/Examreview/', ExamReviewController::class);

Route::get('/Admin/Examreview/index', [ExamReviewController::class, 'index'])->name('Admin.Examreview.index');


/*-------------USER / student panal ----------------------------------  front --------------------------
----------------------------------------------------------------------USER / student panal---------------*/


// Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
//     // Login routes (available to unauthenticated users)
//     Route::get('/login', [StudentController::class, 'index'])->name('login')->middleware('guest:student');
//     Route::post('/login', [StudentController::class, 'login'])->name('login');

//     // Registration routes (available to unauthenticated users)
//     Route::get('/register', [StudentController::class, 'showregisterForm'])->name('register')->middleware('guest:student');
//     Route::post('/register', [StudentController::class, 'register'])->name('register');

//     // Forgot password routes (available to unauthenticated users)
//     Route::get('/forgot-password', [StudentController::class, 'showForgotPasswordForm'])->name('forgot-password')->middleware('guest:student');
//     Route::post('/forgot-password', [StudentController::class, 'forgotPassword'])->name('forgot-password');
// });

// // Authenticated routes (only accessible to logged-in students)
// Route::middleware('auth:student')->group(function () {
//     // Routes here will only be accessible to authenticated students
//     Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');  // Example: exam page
// });


// Route::get('/student/login', [StudentController::class, 'index'])->name('student.login');
// Route::post('/student/login', [StudentController::class, 'login'])->name('student.login')->middleware('student');
// Route::get('/student/register', [StudentController::class, 'showregisterForm'])->name('student.register');
// Route::post('/student/register', [StudentController::class, 'register'])->name('student.register');

// Route::get('/student/forgot-password', [StudentController::class, 'showForgotPasswordForm'])->name('student.forgot-password');


// Route::post('/student/forgot-password', [StudentController::class, 'forgotPassword'])->name('student.forgot-password');
// Route::post('forgot-password', [StudentController::class, 'sendResetLink'])->name('student.forgot-password');


// // Routes that are accessible to unauthenticated students
// Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
//     Route::get('/login', [StudentController::class, 'index'])->name('login');
//     Route::post('/login', [StudentController::class, 'login'])->name('login')->middleware('guest:student'); // Ensure only guests can access this

//     Route::get('/register', [StudentController::class, 'showRegisterForm'])->name('register');
//     Route::post('/register', [StudentController::class, 'register'])->name('register');

//     // Forgot password routes
//     Route::get('/forgot-password', [StudentController::class, 'showForgotPasswordForm'])->name('forgot-password');
//     Route::post('/forgot-password', [StudentController::class, 'forgotPassword'])->name('forgot-password');
//     Route::post('/reset-password', [StudentController::class, 'sendResetLink'])->name('sendResetLink'); // To send reset link email
    
//     // Reset password using token
//     Route::get('/reset-password/{token}', [StudentController::class, 'showResetForm'])->name('password.reset'); // Show form to reset password
//     Route::post('/reset-password', [StudentController::class, 'resetPassword'])->name('password.update'); // Update password
// });

// // Routes that are accessible only to authenticated students
// Route::middleware('auth:student')->group(function () {
//     Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');  // Example: exam dashboard
//     Route::post('/logout', [StudentController::class, 'logout'])->name('logout'); // Logout route
// });


/*-------------Email ---------------------------------- Email --------------------------
-------------------------------------------------------------------------------------*/
Route::resource('notifications', NotificationController::class);

Route::get('/Admin/Notification/index', [NotificationController::class, 'index'])->name('Admin.Notification.index');
Route::get('/Admin/Notification/create', [NotificationController::class, 'create'])->name('Admin.Notification.create');
Route::post('/Admin/Notification/store', [NotificationController::class, 'store'])->name('Admin.Notification.store');
Route::post('/notifications/activate/{id}', [NotificationController::class, 'activate'])->name('notifications.activate');
//Route::patch('admin/exams/{id}/publish', [ExamController::class, 'togglePublish'])->name('exams.togglePublish');



/*------------- Notification---------------------------------- Notification --------------------------
---------------------------------------------------------------------- ---------------*/
Route::resource('Emails', EmailController::class);
Route::get('/Admin/Email/index', [EmailController::class, 'index'])->name('Admin.Email.index');
Route::get('/Admin/Email/create', [EmailController::class, 'create'])->name('Admin.Email.create');
Route::post('/Admin/Email/store', [EmailController::class, 'store'])->name('Admin.Email.store');
Route::post('/emails/activate/{id}', [EmailController::class, 'activate'])->name('Emails.activate');





// Route for exam index page
// Example route definition

Route::get('/exam/index', [ExamController::class, 'index'])->name('exam.index');




// Route::get('/student/profile/edit', [StudentController::class, 'editProfile'])->name('student.profile.edit');
Route::post('/exam.profile', [ProfileController::class, 'updateProfile'])->name('student.profile.update');
Route::get('/exam/results', [ExamController::class, 'results'])->name('exam.results');
// Route::get('/exam/test', [ExamController::class, 'test'])->name('exam.test');
Route::get('/exam/Qution_paper', [ExamController::class, 'Qution'])->name('exam.Qution_paper');
Route::get('/exam/solution_paper', [ExamController::class, 'solution'])->name('exam.solution_paper');

Route::get('/exam/profile', [ProfileController::class, 'show'])->name('exam.profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/exam/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
// /Route::post('/exam/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
// Route::get('/questions/{subject?}', [ExamController::class, 'showQuestions'])->name('questions');
Route::post('/submit-answer', [ExamController::class, 'submitAnswer'])->name('submit.answer');
// Route::get('/exam/{quizId}', [ExamController::class, 'showQuestion'])->name('exam.test');

Route::get('/admin/mark/studentPdf', [ExamController::class, 'downloadStudentPdf'])->name('Admin.Mark.studentPdf');
Route::get('/quizzes/{id}/pdf', [ExamController::class, 'studentPdf'])->name('quizzes.showPdf');

Route::post('/exam/attempt', [ExamController::class, 'storeAttempt'])->name('exam.attempt');
Route::get('exam/{quizId}/{questionId}/{examId}', [ExamController::class, 'test'])->name('exam.test');

Route::get('/logout', [ExamController::class, 'logout'])->name('logout');

// Route::get('/exam/starttest/', [ExamController::class, 'start'])->name('exam.starttest');
Route::get('/exam/starttest/', [ExamController::class, 'start'])->name('exam.starttest');
Route::post('/exam/attempt', [ExamController::class, 'storeAttempt'])->name('exam.attempt');
Route::post('exams/{exam}/attempt', [ExamController::class, 'attempt'])->name('student.exam.attempt');
Route::get('/exam/start/{examId}', [ExamController::class, 'startExam'])->name('exam.start');

// Route::get('/exam/starttest/', [ExamController::class, 'start'])->name('exam.starttest');
// Route::post('/exam/change-subject', [ExamController::class, 'changeSubject'])->name('exam.test');
// Route::get('/exam/{examId}', [ExamController::class, 'showExam'])->name('exam.show');
// Route::get('/Admin/Q&A/index', [QutionandAnsController::class, 'downloadPdf'])->name('Admin.Q&A.index');
// Route::resource('quizzes', QutionandAnsController::class)->except(['show']);
// Route::resource('questions-and-answers', QutionandAnsController::class);
Route::get('/quizzes/{id}/pdf', [QutionandAnsController::class, 'showQuestionPdf'])->name('quizzes.showPdf');
Route::get('/Admin/Q&A/index', [QutionandAnsController::class, 'index'])->name('Admin.Q&A.index');

// // Route to download the PDF
// Route::get('quizzes/qnsview/id', [QutionandAnsController::class, 'downloadQnsviewPdf'])->name('Admin.Q&A.qnsview');

// // Route to view the quiz PDF for a specific quiz ID
// Route::get('/quiz/{id}/pdf', [QutionandAnsController::class, 'showQnsviewPdf'])->name('quiz.show.pdf');
Route::get('/download-pdf', [QutionandAnsController::class, 'downloadPdf'])->name('Admin.Q&A.downloadPdf');
// Route::get('Admin/Q&A/Qnsview/{exam_id}', [QutionandAnsController::class, 'Qnsview'])->name('Admin.Q&A.Qnsview');
// Route::get('Admin/Q&A/Qnsview/{exam_id}', [QutionandAnsController::class, 'Qnsview'])->name('Admin.Q&A.Qnsview');

Route::resource('questions', QutionandAnsController::class);

Route::post('/upload', [NotificationController::class, 'upload']);
Route::get('/Admin/Notification/upload', [NotificationController::class, 'flieuplode'])->name('Admin.Notification.upload');

Route::get('/download/{filename}', [NotificationController::class, 'download'])->name('file.download');
Route::delete('/delete/{filename}', [NotificationController::class, 'delete'])->name('file.delete');

// routes/web.php
Route::get('/test-upload', [NotificationController::class, 'showUploadForm']);
Route::post('/test-upload', [NotificationController::class, 'handleUpload']);


// Route::get('/admin/qa/download-ansview-pdf', [StudentDetailsMail::class, 'downloadAnsviewPdf'])->name('Admin.Q&A.downloadAnsviewPdf');

// Route for showing a specific quiz in PDF view (if needed)
Route::get('/quizzes/{id}/pdf', [QutionandAnsController::class, 'showAnsviewPdf'])->name('quizzes.showPdf');

Route::get('/quizzes/pdf/{id}', [QutionandAnsController::class, 'downloadQnsviewPdf'])->name('quizzes.download');

// Route to download the PDF of all quizzes
// Route::get('/pdfview', [QutionandAnsController::class, 'pdfview'])->name('Admin.Q&A.Qnsview');
// Route::get('/QnsviewPdf/{exam_id}', [QutionandAnsController::class, 'pdfview'])->name('QnsviewPdf');

// Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));


// Route::get('/quizzes/download/{exam_id}', [QutionandAnsController::class, 'downloadQnsviewPdf'])->name('quizzes.download');

// Route::get('/downloadQnsviewPdf', [StudentDetailsMail ::class, 'downloadQnsviewPdf'])->name('Admin.Q&A.downloadQnsviewPdf');



// Route::get('quiz/{id}', [YourController::class, 'showQnsviewPdf'])->name('Admin.Q&A.showQnsviewPdf');
// Route::get('quiz/download/{id}', [YourController::class, 'downloadQnsviewPdf'])->name('Admin.Q&A.downloadQnsviewPdf');


// Route to view the PDF
// Route::get('admin/qnsview/{id}', [YourController::class, 'showQnsviewPdf'])->name('Admin.Q&A.qnsview');

// // Route to download the PDF
// Route::get('admin/download-qnsview-pdf', [YourController::class, 'downloadQnsviewPdf'])->name('Admin.Q&A.downloadPdf');


// Route::get('/quiz/download-pdf', [QutionandAnsController::class, 'showQnsviewPdf'])->name('quiz.download.pdf');
// Route::get('/exam/test/{quizId}/{questionId}', [ExamController::class, 'test'])->name('exam.test');

// Route::get('/exam/questions/{subject}/{part}/{index}', [ExamController::class, 'getQuestion']);

// Route::get('/quiz/{id}/view-pdf', [YourControllerName::class, 'showQnsviewPdf'])
//     ->name('quiz.view.pdf');

// Route::get('/quiz/download-pdf', [YourControllerName::class, 'downloadQnsviewPdf'])
//     ->name('quiz.download.pdf');


// Example route definition

Route::get('/pdf/view/{filePath}', [ExamController::class, 'finalresult'])->name('exam.resuts');
Route::get('/view-pdf/{id}', [ExamController::class, 'viewPdf'])->name('viewPdf');

// Route::get('/pdf/view/{filePath}', 'ExamController')->name('viewPdf');

//Route::get('/exam/test/{q}', [ExamController::class, 'test'])->name('exam.test');

// Route for handling logout
// Route::get('exam/{quizId}', [ExamController::class, 'test'])->name('exam.test');

// In routes/web.php
// Route::get('exam/{quizId}/{questionId}/{examId}', [ExamController::class, 'Question'])->name('exam.test');
Route::get('exam/{quizId}/{questionId}/{examId}', [ExamController::class, 'test'])->name('exam.test');
// Route::get('/quiz/result', [ExamController::class, 'showResult'])->name('quiz.result');
Route::get('/quizzes/{id}', [ExamController::class, 'show'])->name('quizzes.show');

Route::post('/quiz/submit', [ExamController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/quiz/result', [ExamController::class, 'result'])->name('exam.result');

// In your web.php routes file
Route::post('/exam/change-subject', [ExamController::class, 'changeSubject'])->name('exam.changeSubject');
// Route::post('/quiz/{id}', [ExamController::class, 'update'])->name('quiz.update');
Route::post('/quiz/update/{id}', [ExamController::class, 'update'])->name('quiz.update');
Route::get('/quiz/{exam_id}', [ExamController::class, 'quiz'])->name('quiz.show');

// Route::get('/exam/questions/{subject}/{part}/{index}', [ExamController::class, 'getQuestion']);

Route::get('/questions/{quizId}', [ExamController::class, 'getQuestions']);
Route::get('/exam/questions/{subject}', [ExamController::class, 'getQuestions'])->name('exam.questions');


Route::get('/frontend/Checkout', [StudentController::class, 'Checkout'])->name('frontend.Checkout');

Route::get('/checkout/{package_id}', [ExamController::class, 'checkout'])->name('checkout');
Route::post('/pay', [ExamController::class, 'processPayment'])->name('pay');
Route::post('/confirm-payment', [ExamController::class, 'confirmPayment'])->name('confirm.payment');

Route::resource('packages', ExampackageController::class);
Route::get('/packages', [ExampackageController::class, 'index'])->name('Admin.packages.index');
Route::get('/packages/create', [ExampackageController::class, 'create'])->name('Admin.packages.create');
// Route to initiate the payment
Route::post('payment/initiate/{$packageId}', [ExampackageController::class, 'initiate'])->name('payment.initiate');
Route::patch('/packages/{package}/toggle-active', [ExampackageController::class, 'toggleActive'])->name('packages.toggleActive');

// Route to handle the payment response (success or failure)
Route::post('payment/response', [ExampackageController::class, 'response'])->name('payment.response');


// Route to initiate the payment

// Route to handle the response from PhonePe

// Route for showing package details
Route::get('package/{id}', [ExamPackageController::class, 'show'])->name('Admin.packages.details');

// web.php

/*-------------student dashboard profile---------------------------------- student dashboard profile --------------------------
----------------------------------------------------------------------student dashboard profile ---------------*/

Route::get('/exam/{examId}/attempt', [StudentController::class, 'attemptExam'])->name('exam.attempt');

Route::get('/frontend/index', [StudentController::class, 'frontendindex'])->name('frontend.index');
Route::get('/frontend/terms_and_condition', [StudentController::class, 'frontendterms'])->name('frontend.terms_and_condition');

Route::get('/frontend/confirm_payment', [PaymentController::class, 'confirm_payment'])->name('frontend.confirm_payment');



Route::get('/frontend/Privacy_Policy', [StudentController::class, 'Privacy_Policy'])->name('frontend.Privacy_Policy');

Route::get('/frontend/Refund', [StudentController::class, 'Refund'])->name('frontend.Refund');

Route::get('/frontend/contact', [StudentController::class, 'frontendcontact'])->name('frontend.contact');
Route::get('/frontend/class12thpassed', [StudentController::class, 'frontendclass12'])->name('frontend.class12thpassed');
Route::get('/frontend/freemocktest', [StudentController::class, 'frontendfreemock'])->name('frontend.freemocktest');
Route::get('/frontend/classxifreemocktest', [StudentController::class, 'frontendclassxifreemock'])->name('frontend.classxifreemocktest');
Route::get('/frontend/classfullsylabuspaper', [StudentController::class, 'frontendclassfullsylabuspaper'])->name('frontend.classfullsylabuspaper');
Route::get('/frontend/XIISolution', [StudentController::class, 'frontendsolution'])->name('frontend.XIISolution');

Route::post('/contact/send', [StudentController::class, 'send'])->name('contact.store');
Route::get('/admin/user/student-pdf', [StudentDetailsMail::class, 'studentPdf'])->name('Admin.user.studentPdf');

Route::get('admin/qna/student-pdf', [StudentDetailsMail::class, 'studentPdf'])->name('Admin.user.studentPdf');
Route::get('/frontend/class12th', [StudentController::class, 'frontendclass1'])->name('frontend.class12th');
Route::get('/frontend/XISolution', [StudentController::class, 'frontendsolutionXI'])->name('frontend.XISolution');

Route::get('/Admin/frontend/class11', [FrontendController::class, 'class11index'])->name('Admin.frontend.class11');
Route::get('/Admin/frontend/class12', [FrontendController::class, 'class12'])->name('Admin.frontend.class12');
// web.php
Route::post('/class11/store', [FrontendController::class, 'store'])->name('class11.store');
Route::get('uploads/{id}/view', [FrontendController::class, 'view'])->name('view');
Route::delete('uploads/{id}', [FrontendController::class, 'destroy'])->name('uplode.destroy');
// Route for viewing a specific PDF file
Route::post('/class12/store', [FrontendController::class, 'storee'])->name('class12.store');

Route::get('/class12/view/{id}', [FrontendController::class, 'viewPdf'])->name('viewpdf');

// Route for deleting a file
Route::delete('/class12/destroy/{id}', [FrontendController::class, 'destroye'])->name('class12.destroy');
/*-------------student dashboard profile---------------------------------- student dashboard profile --------------------------
----------------------------------------------------------------------student dashboard profile ---------------*/
Route::get('/Admin/Payment/create', [TestSeriesPackageController::class, 'index'])->name('Admin.Payment.create');
Route::post('test_series_packages', [TestSeriesPackageController::class, 'store'])->name('test_series_packages.store');

Route::resource('test_series_packages', TestSeriesPackageController::class);
Route::post('/bulkimport/question_bulkimport', [QuestionBulkImportController::class, 'import'])->name('question.bulkimport');




Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
   

Route::delete('admin/questions/{id}', [QuestionController::class, 'destroy'])->name('Admin.Q&A.delete');
Route::delete('admin/q-a/delete/{id}', [QuestionController::class, 'destr'])->name('Admin.Q&A.ansdelete');


/*-------------Student dashboard profile---------------------------------- Student dashboard profile --------------------------
----------------------------------------------------------------------Student dashboard profile ---------------*/


Route::get('payment', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment');

//SUBMIT PAYMENT FORM ROUTE

//CALLBACK ROUTE
Route::get('/frontend/confirm_payment', [\App\Http\Controllers\PaymentController::class, 'confirmPayment'])->name('frontend.confirm_payment');


  Route::post('/pay-with-phonepe', [PaymentController::class, 'submitPaymentForm'])->name('pay-with-phonepe');



Route::put('admin/exam/{id}/update', [ExamController::class, 'update']);

// Route::get('/frontend/payment_success', [PaymentController::class, 'successPayment']);
Route::get('/frontend/payment-failed', [PaymentController::class, 'paymentFailed']);


// Route::get('phonepe',[PhonePeController::class,'phonePe']);

// Route::any('phonepe-response',[PhonePeController::class,'response'])->name('response');


// Route::get('refund/{id}',[PhonePecontroller::class,'refundProcess']);
// Route::post('/pay', [PhonePeController::class, 'payment_init'])->name('pay');

// Route::get('pay-refund-view', [PhonePeController::class, 'refund']);
// Route::get('pay-refund', [PhonePeController::class, 'payment_refund']);
// Route::any('pay-return-url', [PhonePeController::class, 'payment_return'])->name('pay-return-url');
// Route::post('pay-callback-url', [PhonePeController::class, 'payment_callback'])->name('pay-callback-url');
// Route::any('pay-refund-callback', [PhonePeController::class, 'payment_refund_callback'])->name('pay-refund-callback');

Route::post('/pay', [PhonePeController::class, 'initiatePayment'])->name('pay');
Route::post('payment/callback', [PhonePeController::class, 'paymentCallback'])->name('phonepe.callback');







Route::post('/frontend/payment_success', [PaymentController::class, 'submitPayment'])->name('payment.submit');

Route::get('/frontend/payment-failed', [PaymentController::class, 'failedPayment'])->name('frontend.payment-failed');
Route::get('/frontend/payment_success', [PaymentController::class, 'successPayment'])->name('frontend.payment_success');


// Route::post('/frontend/payment_success', [PaymentController::class, 'paymentSuccess']);
Route::get('/package/{id}', [PackageController::class, 'show'])->name('frontend.show');
Route::post('/package/{id}/purchase', [PackageController::class, 'purchase'])->name('package.purchase');

Route::get('/frontend/success/{package_id}', [PackageController::class, 'paymentSuccess'])->name('frontend.success');
Route::get('/frontend/failure', [PackageController::class, 'paymentFailure'])->name('frontend.failure');
Route::post('/payment/initiate', [PackageController::class, 'initiatePayment'])->name('payment.phonepe');

Route::get('checkout/{package_id}', [PackageController::class, 'checkout'])->name('checkout');
Route::post('payment-success', [PackageController::class, 'paymentSucces'])->name('paymentSuccess');
Route::get('register/{package_id}', [PackageController::class, 'registerForPackage'])->name('registerForPackage');

// Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
// Route::post('/subscription/callback', [SubscriptionController::class, 'callback'])->name('subscription.callback');

// Route::get('/subscription/success', [SubscriptionController::class, 'successPage'])->name('subscription.success');


Route::get('Admin/packages/payment_status', [PhonePeController::class, 'index'])->name('Admin.packages.payment_status');
Route::post('/subscription/checkout', [PhonePeController::class, 'phonePe'])->name('subscription.checkout');


Route::any('phonepe-response',[PhonePeController::class,'response'])->name('response');
