<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Questionnaire
                    <a class="float-right" href="<?php echo e(url('questionnaire/')); ?>"> List of Questions </a>
                </div>

                <div class="card-body">
                    <?php if(Session::has('msg_success')): ?>
                        <div class='alert alert-success'><?php echo e(Session::get('msg_success')); ?> </div>
                    <?php endif; ?>

                    <?php if(count($errors)>0): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(Request::is('*/edit')): ?>
                        <?php echo e(Form::model($question, ['method'=> 'PATCH', 'url' => 'questionnaire/'.$question->id])); ?>

                    <?php else: ?>
                        <?php echo Form::open(['url' => 'questionnaire/save']); ?>

                    <?php endif; ?>

                    <?php echo Form::label('txt_question', 'Question'); ?>

                    <?php echo Form::input('text', 'txt_question', null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Question']); ?>


                    <?php echo Form::label('cmb_answer', 'Type of Answer'); ?>

                    <?php echo Form::select('cmb_answer', array(   '0' => 'Number', 
                                                            '1' => 'Text', 
                                                            '2' => 'Date', 
                                                            '3' => 'Radio', 
                                                            '4' => 'DropDown',
                                                         ), null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Select the Type of Answer']); ?>

                                                         

                    <?php echo Form::label('txt_param', 'Param of Answer'); ?>

                    <?php echo Form::input('text', 'txt_param', null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Param of Answer']); ?>


                    <?php echo Form::label('flg_required', 'Required?'); ?>

                    <?php echo Form::select('flg_required', array( 'Y' => 'Yes', 
                                                            'N' => 'No'
                                                         ), null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Select']); ?>

                    <br>
                    <?php echo Form::submit('Salvar', ['class'=>'btn btn-primary']); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>