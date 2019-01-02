<?php $__env->startSection("content"); ?>
<main id="Main">
    <div id="head">
        <form class="earaser">
            <label>Earaser</label>
            <input type="checkbox" id="Earaser">
        </form>
        <h2>Welcome <span id="user"></span> </h2>
    </div>
    <div id="canvas"><canvas>
        </canvas></div>

    <ul class="Tools">
        <li class="Color">
            <h3>Color</h3>
            <hr>
            <div id="colorlong" class="long">
                <input type="button" value="Black">
                <input type="button" value="Orange">
                <input type="button" value="Yellow">
                <input type="button" value="Green">
                <input type="button" value="Blue">
                <input type="button" value="Red">
                <br>
                <input type="button" value="Black">
                <input type="button" value="Orange">
                <input type="button" value="Yellow">
                <input type="button" value="Green">
                <input type="button" value="Blue">
                <input type="button" value="Red">
            </div>
            <div class="colorshort short">
                <div class="select">
                    <input type="button" value="Black">
                    <input type="button" value="Orange">
                    <input type="button" value="Yellow">
                    <input type="button" value="Green">
                    <input type="button" value="Blue">
                    <input type="button" value="Red">
                    <input type="button" value="Black">
                    <input type="button" value="Orange">
                    <input type="button" value="Yellow">
                    <input type="button" value="Green">
                    <input type="button" value="Blue">
                    <input type="button" value="Red">
                </div>
                <span class="active">
                    <input type="button" value="Black">
                    <input type="button" id="colormenu" class="menu" value="^">
                </span>

            </div>
        </li>
        <li class="Shape">
            <h3>Shape</h3>
            <hr>
            <div id="shapelong" class="long">
                <input type="button" value="&#183;" class="selected">
                <input type="button" value="&#9585;">
                <input type="button" value="&#9711;">
                <input type="button" value="&#9723;">
                <input type="button" value="&#9651;">
            </div>
            <div class="shapeshort short">
                <div class="select">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#9585;">
                    <input type="button" value="&#9711;">
                    <input type="button" value="&#9723;">
                    <input type="button" value="&#9651;">
                </div>
                <span class="active">
                    <input type="button" value="&#183;">
                    <input type="button" id="shapemenu" class="menu" value="^">
                </span>
            </div>
        </li>
        <li class="Size">
            <h4>Size</h4>
            <hr>
            <div id="sizelong" class="long">
                <input type="button" value="&#183;" class="selected">
                <input type="button" value="&#183;">
                <input type="button" value="&#183;">
                <input type="button" value="&#183;">
                <input type="button" value="&#183;">
            </div>
            <div class="sizeshort short">
                <div class="select">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                </div>
                <span class="active">
                    <input type="button" value="&#183;">
                    <input type="button" id="sizemenu" class="menu" value="^">
                </span>
            </div>
        </li>
    </ul>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>