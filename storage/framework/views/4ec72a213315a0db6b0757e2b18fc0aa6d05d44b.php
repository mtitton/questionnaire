<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Clientes
                </div>

                <div class="card-body">
                    <?php if(Session::has('mensagem_sucesso')): ?>
                        <div class='alert alert-success'><?php echo e(Session::get('mensagem_sucesso')); ?> </div>
                    <?php endif; ?>

                    <?php if(Request::is('*/editar')): ?>
                        <?php echo e(Form::model($cliente, ['method'=> 'PATCH', 'url' => 'clientes/'.$cliente->id])); ?>

                    <?php else: ?>
                        <?php echo Form::open(['url' => 'clientes/salvar']); ?>

                    <?php endif; ?>    

                    <?php echo Form::label('nome', 'Nome'); ?>

                    <?php echo Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder'=>'Nome']); ?>


                    <?php echo Form::label('endereco', 'Endereço'); ?>

                    <?php echo Form::input('text', 'endereco', null, ['class' => 'form-control', '', 'placeholder'=>'Endereço']); ?>


                    <?php echo Form::label('numero', 'Número'); ?>

                    <?php echo Form::input('text', 'numero', null, ['class' => 'form-control', '', 'placeholder'=>'Número']); ?>

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