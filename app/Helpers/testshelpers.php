<?php
use Illuminate\Support\Facades\DB; // Add this line at the top
use App\Models\Subject;

use App\Models\Student;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizResult;

class testshelpers
{
    public static function getQuestionsByQuizId($quizId)
    {
        return Question::where('quiz_id', $quizId)->get();
    }
}

