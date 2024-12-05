<?php
use Illuminate\Support\Facades\DB; // Add this line at the top
use App\Models\Subject;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\Student;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;


if (!function_exists('getStudentById')) {
    /**
     * Get student by ID.
     *
     * @param int $id
     * @return Student|null
     */
    function getStudentById($id)
    {
        return Student::find($id);
    }
}







if (!function_exists('getQuestionById')) {
    /**
     * Fetch a question by its ID.
     *
     * @param int $id
     * @return \App\Models\Question|null
     */
    function getQuestionById($id)
    {
        return Question::find($id);
    }
}


function getQuestionById($id) {
    $question = Question::find($id);

    if ($question) {
        return [
            'text' => $question->question_text,
            'option1' => $question->option_a,
            'option2' => $question->option_b,
            'option3' => $question->option_c,
            'option4' => $question->option_d
        ];
    }

    return null;
}

function getStudentById($id)
{
    return Student::find($id); // Example function to fetch student by ID
}


if (!function_exists('getQuestionStates')) {
    function getQuestionStates($numberOfQuestions = 35)
    {
        // Example logic to generate question states
        return array_fill(0, $numberOfQuestions, 'not-answered');
    }
}


if (!function_exists('get_start_test_data')) {
    /**
     * Fetch the data needed for the start test page.
     *
     * @return array
     */
    function get_start_test_data()
    {
        // Fetch the logged-in user data
        $user = Auth::user(); // Change this line to fetch the authenticated user

        // Ensure a user is authenticated before proceeding
        if (!$user) {
            return [
                'error' => 'No user is logged in',
            ];
        }
        
         // Check if the user has an active subscription
        if (!$user->is_paid) {
            return redirect()->route('subscription.checkout'); // Redirect to checkout if not subscribed
        }

        // Fetch user ID
        $userId = $user->id;

        // Fetch all available exams with attempts
        $exams = Exam::with('attempts')->get();

        // Fetch quizzes that are linked to the exams the user is enrolled in
        $quizzes = Quiz::whereIn('exam_id', $exams->pluck('id'))
            ->select('exam_id', 'started_date', 'finish_date', 'exam_status')
            ->get();

        // Check if the user has already attempted any of the exams
        $attemptedExams = ExamAttempt::where('user_id', $userId) // Change to user_id
            ->pluck('exam_id')
            ->toArray();  // List of exam IDs the user has attempted

        // Determine if the user has attempted specific quizzes/exams
        $quizzes->each(function ($quiz) use ($attemptedExams) {
            $quiz->hasAttempted = in_array($quiz->exam_id, $attemptedExams);
        });

        return [
            'user' => $user,  // Return the authenticated user
            'quizzes' => $quizzes,
            'exams' => $exams, // Include exams in the returned data
        ];
    }
}







class ExamHelper
{
    public static function isExamStarted($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return  $quiz &&  $quiz->exam_status == 'started';
    }
}


// app/helpers.php
if (!function_exists('getQuestionsByExamId')) {
    function getQuestionsByExamId($examId) {
        // Retrieve questions based on exam ID
        return \App\Models\Question::where('exam_id', $examId)->with('options')->get();
    }
}

if (!function_exists('updateQuestionState')) {
    function updateQuestionState($index, $state)
    {
        $questionStates = session('questionStates', []);
        $questionStates[$index] = $state;
        session(['questionStates' => $questionStates]);
    }
}

if (!function_exists('calculateScore')) {
    function calculateScore(array $answers)
    {
        $score = 0;
        foreach ($answers as $questionId => $selectedOption) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer === $selectedOption) {
                $score += 4; // Correct answer
            } else {
                $score -= 1; // Incorrect answer
            }
        }
        return $score;
    }
}

if (!function_exists('getOptionData')) {
    function getOptionData($question, $option)
    {
        $optionText = 'option_' . $option;
        $optionImage = 'option_' . $option . '_image';
        
        return [
            'text' => $question->$optionText,
            'image' => $question->$optionImage ? asset('storage/' . $question->$optionImage) : null
        ];
    }
}

if (!function_exists('getQuestionStates')) {
    function getQuestionStates($studentId, $quizId)
    {
        $answers = DB::table('answers')
            ->where('student_id', $studentId)
            ->where('quiz_id', $quizId)
            ->get();

        $questionStates = [];
        foreach ($answers as $answer) {
            $status = 'not-answered';
            if ($answer->is_reviewed) {
                $status = 'review';
            } elseif (!empty($answer->answer)) {
                $status = 'answered';
            }
            $questionStates[$answer->question_id] = $status;
        }

        return $questionStates;
    }
}

if (!function_exists('getQuizById')) {
    function getQuizById($id)
    {
        return Quiz::findOrFail($id);
    }
}

if (!function_exists('getQuestionsForQuiz')) {
    function getQuestionsForQuiz($quizId, $subject)
    {
        return Question::where('quiz_id', $quizId)
            ->where('subject', $subject)
            ->get();
    }
}

// if (! function_exists('getQuizzesByExamId')) {
//     /**
//      * Get quizzes by exam ID.
//      *
//      * @param  int  $examId
//      * @return \Illuminate\Support\Collection
//      */
//     function getQuizzesByExamId($examId)
//     {
//        // Fetch quizzes data with specific fields: subject, date, and exam status
//        $quizzes = Quiz::select('exam_id')->get();


//        return [
          
//            'quizzes' => $quizzes,
//        ];
//     }
// }
if (! function_exists('getQuizzesByExamId')) {
    /**
     * Get quizzes by exam ID.
     *
     * @param  int  $examId
     * @return \Illuminate\Support\Collection
     */
    function getQuizzesByExamId($examId)
    {
        // Fetch quizzes based on exam_id
        return Quiz::where('exam_id', $examId)->get();
    }
}

if (!function_exists('getQuizById')) {
    function getQuizById($quizId)
    {
        return Quiz::find($quizId);
    }
}

if (!function_exists('getQuizzesByExamId')) {
    function getQuizzesByExamId($examId)
    {
        return Quiz::where('exam_id', $examId)->get();
    }
}

if (!function_exists('getQuestionsForQuiz')) {
    function getQuestionsForQuiz($quizId, $subject)
    {
        $subjectId = Subject::where('name', $subject)->first()->id ?? null;
        return Question::where('quiz_id', $quizId)
                        ->when($subjectId, function($query) use ($subjectId) {
                            return $query->whereHas('quiz', function($query) use ($subjectId) {
                                $query->where('subject_id', $subjectId);
                            });
                        })
                        ->get();
    }
}

if (!function_exists('getQuestionStates')) {
    function getQuestionStates($studentId, $quizId)
    {
        // Implement logic for question states (e.g., answered, not answered)
        // This is a placeholder example
        return [
            // Example states
        ];
    }
}

if (!function_exists('getOptionData')) {
    function getOptionData($question, $option)
    {
        $optionText = $question->{'option_' . $option};
        $optionImage = $question->{'option_' . $option . '_image'};
        return [
            'text' => $optionText,
            'image' => $optionImage ? asset('storage/' . $optionImage) : null,
        ];
    }
}



if (!function_exists('getQuestionsByQuizId')) {
    function getQuestionsByQuizId($quizId)
    {
        // Implement logic for question states (e.g., answered, not answered)
        // This is a placeholder example
        return Question::where('quiz_id', $quizId)->get();
    }
}





if (!function_exists('fetchQuizzesWithQuestions')) {
    /**
     * Fetch quizzes with questions and their options for a given exam ID.
     *
     * @param int $examId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function fetchQuizzesWithQuestions($examId) {
        return Quiz::with(['questions.options'])->where('exam_id', $examId)->get();
    }
}

if (!function_exists('fetchQuestionsByPart')) {
    /**
     * Fetch questions by part (A or B) for a given exam ID.
     *
     * @param int $examId
     * @param string $part
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function fetchQuestionsByPart($examId, $part) {
        return Question::where('exam_id', $examId)->where('part', $part)->get();
    }
}

if (!function_exists('getQuizTimeLimit')) {
    /**
     * Get the time limit for a given exam ID.
     *
     * @param int $examId
     * @return string
     */
    function getQuizTimeLimit($examId) {
        $quizTime = Quiz::where('exam_id', $examId)->value('time_limit');
        return is_null($quizTime) ? 'Not set' : $quizTime;
    }
}

if (!function_exists('fetchStudentNames')) {
    /**
     * Fetch student names for a given exam ID.
     *
     * @param int $examId
     * @return \Illuminate\Support\Collection
     */
    function fetchStudentNames($examId) {
        return Student::where('exam_id', $examId)->pluck('name');
    }
}















    

