<?php echo e($texto); ?> <br><br>

<?php if($checagem == true): ?>

    Checagem = True

<?php else: ?>

    Checagem = False <br>

    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($usuario); ?> <br>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>