@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>ANSWER THE QUESTIONS</b>
                </div>

                <div class="card-body">
                    Please, answer the questionnaire below. <br>
                    Questions with <font color='red'>*</font> are required.
                    <br><br>

                    @if(Session::has('msg_success'))
                        <div class='alert alert-success'>{{ Session::get('msg_success') }} </div>
                    @endif

                    {!! Form::open(['url' => 'answer/save']) !!}

                    <?php
                        $count = 0;

                        //Catch all the questions that was registered by admin
                        foreach($questions as $question)
                        {
                            //Define a counter
                            $count = $count + 1;

                            //To make it easier, define in new variables
                            $id = $question->id;
                            $txt_question = $question->txt_question;
                            $cmb_answer = $question->cmb_answer;
                            $txt_param = $question->txt_param;
                            $flg_required = $question->flg_required;

                            if($flg_required=="Y")
                            {
                                $lbl_required = "<font color='red'>*</font>";
                            }
                            else
                            {
                                $lbl_required = "";
                            }

                            //Question's Label
                            echo "<b><font size='3'>" . $count . " - " . $txt_question . $lbl_required . "</font></b><br>";
                            
                            //Verify what kind of question is
                            switch ($cmb_answer)
                            {
                                case '0': // Number
                                    echo "<input id='answer_number' style='width: 60%;' class='form-control' name='" . $id . "' type='number'>";
                                
                                    echo "<br>";

                                    break;
                                case '1': //Text
                                    echo "<input type='text' style='width: 60%;' class='form-control' maxlength='100' name='" . $id . "' />";

                                    echo "<br>";

                                    break;
                                case '2': //Date
                                    echo "<input type='date' style='width: 60%;' id='answer_date' class='form-control' name='". $id ."' value='' min='2018-01-01' max='2018-12-31'/ >";

                                    echo "<br>";

                                    break;
                                case '3': //Radio

                                    //Split by |
                                    $param = explode('|', $txt_param);
                                    
                                    //Catch all the values
                                    foreach ($param as $value)
                                    {
                                        echo "<div class='form-check'>";
                                        echo "<input type=radio class='form-check-input' name='" . $id . "' value='" . ltrim($value) . "'/>";
                                        echo "<label class='form-check-label'>" . ltrim($value) . "</label>";
                                        echo "</div>";
                                    }

                                    echo "<br>";

                                    break;
                                case '4': //DropDown
                                    //Split by |
                                    $param = explode('|', $txt_param);
                                    
                                    echo "<select name='" . $id . "' class='custom-select my-1 mr-sm-2' style='width: 60%;'>";
                                    echo "<option selected>Select</option>";

                                    //Catch all the values
                                    foreach ($param as $value)
                                    {
                                        echo "<option value='".$value."'>".$value."</option>";
                                    }

                                    echo "</select><br>";

                                    echo "<br>";

                                    break;
                            }
                        }
                    ?>

                    {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
