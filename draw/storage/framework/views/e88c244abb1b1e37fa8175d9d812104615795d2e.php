<?php $__env->startSection("content"); ?>
    <main id="Index">
        <form class="username">
            <label for="Username">Enter your name:</label>
            <input type="text" name="" id="Username" >
            <input type="submit" value="Start drawing">
        </form>
    </main>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>