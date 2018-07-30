<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Clients
                        <a class="float-right" href="<?php echo e(url('clientes/novo')); ?>"> New Register </a>
                </div>

                <div class="card-body">
                    List of Clients
                    <br><br>

                    <?php if(Session::has('mensagem_sucesso')): ?>
                        <div class='alert alert-success'><?php echo e(Session::get('mensagem_sucesso')); ?> </div>
                    <?php endif; ?>

                    <table class="table">
                        <th>Name</th>
                        <th>Address</th>
                        <th>Number</th>
                        <th>Action</th>
                        <tbody>
                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($cliente->nome); ?></td>
                                <td><?php echo e($cliente->endereco); ?></td>
                                <td><?php echo e($cliente->numero); ?></td>
                                <td>
                                    <a href="clientes/<?php echo e($cliente->id); ?>/editar" class="btn btn-default btn-sm">Edit</button>
                                    <?php echo Form::open(['method'=>'DELETE', 'url'=>'/clientes/'.$cliente->id, 'style'=> 'display: inline;']); ?>

                                    <button type='submit' class="btn btn-sm">Delete</button>
                                    <?php echo Form::close(); ?>

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