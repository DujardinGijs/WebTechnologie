<?php $__env->startSection("content"); ?>
    <main id="Index">
        <form method="post" action="<?php echo e(route("draw.store")); ?>"  class="username">
            <?php echo csrf_field(); ?>
            <label for="Username">Enter your name:</label>
            <input type="text" name="name" id="Username" autofocus="autofocus" >
            <input type="submit" value="Start drawing">
        </form>
    </main>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>