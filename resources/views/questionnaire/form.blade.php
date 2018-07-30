@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Questionnaire
                    <a class="float-right" href="{{ url('questionnaire/') }}"> List of Questions </a>
                </div>

                <div class="card-body">
                    @if(Session::has('msg_success'))
                        <div class='alert alert-success'>{{ Session::get('msg_success') }} </div>
                    @endif

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Request::is('*/edit'))
                        {{ Form::model($question, ['method'=> 'PATCH', 'url' => 'questionnaire/'.$question->id]) }}
                    @else
                        {!! Form::open(['url' => 'questionnaire/save']) !!}
                    @endif

                    {!! Form::label('txt_question', 'Question') !!}
                    {!! Form::input('text', 'txt_question', null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Question']) !!}

                    {!! Form::label('cmb_answer', 'Type of Answer') !!}
                    {!! Form::select('cmb_answer', array(   '0' => 'Number', 
                                                            '1' => 'Text', 
                                                            '2' => 'Date', 
                                                            '3' => 'Radio', 
                                                            '4' => 'DropDown',
                                                         ), null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Select the Type of Answer'])   !!}
                                                         

                    {!! Form::label('txt_param', 'Param of Answer') !!}
                    {!! Form::input('text', 'txt_param', null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Param of Answer']) !!}

                    {!! Form::label('flg_required', 'Required?') !!}
                    {!! Form::select('flg_required', array( 'Y' => 'Yes', 
                                                            'N' => 'No'
                                                         ), null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Select'])   !!}
                    <br>
                    {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
