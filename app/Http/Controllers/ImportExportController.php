<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportExportController extends Controller
{
    private $rows = [];

    public function import(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));
        $existing_questions = DB::table('questions')->pluck('question')->toArray();
        if (! count($records) > 0) {
            return 'Error...';
        }

        // Get field names from header column
        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                $return_data = [count($fields), count($record), $fields, $record];
                return  $return_data;
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = $this->clear_encoding_str($record);
        }

        foreach ($this->rows as $data) {
            if (in_array($data['question'], $existing_questions)){
                Question::where('question',$data['question'])->update([
                    'question' => $data['question'],
                    'answer' => $data['answer'],
                    'level' => $data['level'],
                    'tech_id' => $data['tech_id'],
                ]);
            }
            else{
                Question::create([
                    'question' => $data['question'],
                    'answer' => $data['answer'],
                    'level' => $data['level'],
                    'tech_id' => $data['tech_id'],
                ]);
            }
        }

        return to_route('questions.index');
    }

    public function export(Request $request)
    {
        $fileName = 'questions_ ' .time(). ' .csv';
        $questions = Question::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 'question', 'answer', 'level', 'tech_id');

        $callback = function() use($questions, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($questions as $question) {
                $row['id']  = $question->id;
                $row['question']    = $question->question;
                $row['answer']    = $question->answer;
                $row['level']  = $question->level;
                $row['tech_id']  = $question->tech_id;

                fputcsv($file, array($row['id'], $row['question'], $row['answer'], $row['level'], $row['tech_id']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }

}
