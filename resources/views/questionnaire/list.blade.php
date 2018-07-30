<?php
use App\Answer;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>QUESTIONNAIRE</b>
                        <a class="float-right" href="{{ url('questionnaire/new') }}"> New Question </a>
                </div>

                <div class="card-body">
                    List of Questions
                    <br><br>

                    @if(Session::has('msg_success'))
                        <div class='alert alert-success'>{{ Session::get('msg_success') }} </div>
                    @endif

                    <table class="table">
                        <th>Question</th>
                        <th>Type of Answer</th>
                        <th>Param of Answer</th>
                        <th>Required?</th>
                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td>
                                    {{ $question->txt_question }}
                                </td>
                                <td>
                                    @if($question->cmb_answer==0)
                                        Number
                                    @elseif($question->cmb_answer==1)
                                        Text
                                    @elseif($question->cmb_answer==2)
                                        Date
                                    @elseif($question->cmb_answer==3)
                                        Radio
                                    @elseif($question->cmb_answer==4)
                                        DropDown
                                    @endif
                                </td>
                                <td>
                                    {{$question->txt_param}}
                                </td>
                                <td>
                                    @if($question->flg_required=="Y")
                                        Yes
                                    @elseif($question->flg_required=="N")
                                        No
                                    @endif
                                </td>
                                <td>
                                    <?php
                                        //Check if this question was already answered
                                        $answered = DB::table('answers')->where('id_question',$question->id)->first();
                                        if ($answered === null) 
                                        {
                                    ?>
                                            <a href="questionnaire/{{ $question->id }}/edit" class="btn btn-default btn-sm">Edit</button>
                                            {!! Form::open(['method'=>'DELETE', 'url'=>'/questionnaire/'.$question->id, 'style'=> 'display: inline;']) !!}
                                            <button type='submit' class="btn btn-sm">Delete</button>
                                            {!! Form::close() !!}
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            -
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
