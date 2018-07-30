<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class QuestionnaireController extends Controller
{
    //Function to list the questions
    public function index()
    {
        //Catch everything in DB
        $questions = Questionnaire::get();

        //Return the list with all questions saved in the system
        return view('questionnaire/list', ['questions' => $questions]);
    }

    //Function to view the form (new register)
    public function new()
    {
        //Redirect to Form
        return view('questionnaire/form');
    }

    //Function to save the form
    public function save(Request $request)
    {
        //Set model
        $questionnaire = New Questionnaire();

        //Fields Validation
        $errors = $this->validate($request, [
            'txt_question' => 'required|max:255',
            'cmb_answer' => 'required',
            'flg_required' => 'required',
        ],[
            'txt_question.required' => 'The field "Question" is required.',
            'txt_question.max' => 'The max size of Question Field is 255.',
            'cmb_answer.required' => 'The field "Type of Answer" is required.',
            'flg_required.required' => 'The field "Required?" is required.',
        ]);

        //Save the information
        $questionnaire = $questionnaire->create($request->all());

        //Message Success
        \Session::flash('msg_success', 'Question saved successfully!');

        //Redirect at the same page
        return Redirect::to('questionnaire/new');
    }

    //Function to edit a question
    public function edit($id)
    {
        //Find this ID in DB or return an error
        $question = Questionnaire::findOrFail($id);

        //Redirect to form
        return view('questionnaire/form', ['question'=>$question]);
    }

    //Function to update the form
    public function update($id, Request $request)
    {
        //Find this ID in DB or return an error
        $question = Questionnaire::findOrFail($id);

        //Fields Validation
        $errors = $this->validate($request, [
            'txt_question' => 'required|max:255',
            'cmb_answer' => 'required',
            'flg_required' => 'required',
        ],[
            'txt_question.required' => 'The field "Question" is required.',
            'txt_question.max' => 'The max size of Question Field is 255.',
            'cmb_answer.required' => 'The field "Type of Answer" is required.',
            'flg_required.required' => 'The field "Required?" is required.',
        ]);

        //Update all fields
        $question->update($request->all());

        //Message Success
        \Session::flash('msg_success', 'Question updated successfully!');

        //Return at the same page
        return Redirect::to('questionnaire/'.$question->id.'/edit');
    }

    //Function to delete questions
    public function delete($id)
    {
        //Find this ID in DB or return an error
        $question = Questionnaire::findOrFail($id);

        //Delete the question
        $question->delete();

        //Message Success
        \Session::flash('msg_success', 'Question deleted successfully!');

        //Return to list of the questions
        return Redirect::to('questionnaire');
    }
}
