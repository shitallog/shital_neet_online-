<?php

// app/Imports/QuestionsImport.php
namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // Optional if your CSV has headers
use App\Models\Question; // Adjust this if you have a different model
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Question([
            'question_text' => $row[0], // Adjust according to your CSV structure
            'answer' => $row[1],
            // Add other fields as necessary
        ]);
    }
}
