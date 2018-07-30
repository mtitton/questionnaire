<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Questionnaire;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    //Function to list the questions
    public function index()
    {
        //Catch everything in DB
        $questions = Questionnaire::get();

        //Return to index
        return view('answer/index', ['questions' => $questions]);
    }

    //Function to save the form
    public function save(Request $request)
    {
        //Catch everything in DB
        $questions = Questionnaire::get();

        //Catch what come from post
        $answers = $request->all();

        //Split each part and organize better to save in DB
        foreach($questions as $question)
        {
            //Set model
            $answer = New Answer();

            //Re-attribute in new variables to organize better
            $id = $question->id;
            $ans = $answers[$id];

            //Fill the model
            $answer->id_question = $id;
            $answer->txt_answer = $ans;

            //Save the information
            $answer->save();
        }

        //Message Success
        \Session::flash('msg_success', 'Answers sent successfully!');

        //Return at the same page
        return view('answer/index', ['questions' => $questions]);
    }
}
