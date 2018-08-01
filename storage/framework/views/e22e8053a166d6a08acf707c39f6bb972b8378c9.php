<?php
use App\Answer;
?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>QUESTIONNAIRE</b>
                        <a class="float-right" href="<?php echo e(url('questionnaire/new')); ?>"> New Question </a>
                </div>

                <div class="card-body">
                    List of Questions
                    <br><br>

                    <?php if(Session::has('msg_success')): ?>
                        <div class='alert alert-success'><?php echo e(Session::get('msg_success')); ?> </div>
                    <?php endif; ?>

                    <table class="table">
                        <th>Question</th>
                        <th>Type of Answer</th>
                        <th>Param of Answer</th>
                        <th>Required?</th>
                        <tbody>
                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($question->txt_question); ?>

                                </td>
                                <td>
                                    <?php if($question->cmb_answer==0): ?>
                                        Number
                                    <?php elseif($question->cmb_answer==1): ?>
                                        Text
                                    <?php elseif($question->cmb_answer==2): ?>
                                        Date
                                    <?php elseif($question->cmb_answer==3): ?>
                                        Radio
                                    <?php elseif($question->cmb_answer==4): ?>
                                        DropDown
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($question->txt_param); ?>

                                </td>
                                <td>
                                    <?php if($question->flg_required=="Y"): ?>
                                        Yes
                                    <?php elseif($question->flg_required=="N"): ?>
                                        No
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        //Check if this question was already answered
                                        $answered = DB::table('answers')->where('id_question',$question->id)->first();
                                        if ($answered === null) 
                                        {
                                    ?>
                                            <a href="questionnaire/<?php echo e($question->id); ?>/edit" class="btn btn-default btn-sm">Edit</button>
                                            <?php echo Form::open(['method'=>'DELETE', 'url'=>'/questionnaire/'.$question->id, 'style'=> 'display: inline;']); ?>

                                            <button type='submit' class="btn btn-sm">Delete</button>
                                            <?php echo Form::close(); ?>

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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>