@extends("master")

@section("content")
<main id="Main" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <div id="head">
        <form class="earaser">
            <label>Earaser</label>
            <input type="checkbox" v-on:click="Earase" id="Earaser">
        </form>
        <h2>Welcome {{$name}} </h2>
    </div>
    <div class="canvas"><canvas>

        </canvas></div>

    <ul class="Tools">
        <li class="Color">
            <h3>Color</h3>
            <hr>
            <div id="colorlong" class="long" v-on:click="select">
                <input type="button" value="Yellow" class="selected">
                <input type="button" value="Goldenrod">
                <input type="button" value="indianRed">
                <input type="button" value="Deepskyblue">
                <input type="button" value="Lime">
                <input type="button" value="Silver">
                <br>
                <input type="button" value="Orange">
                <input type="button" value="Saddlebrown">
                <input type="button" value="red">
                <input type="button" value="Blue">
                <input type="button" value="Green">
                <input type="button" value="Black">
            </div>
            <div class="colorshort short" id="fckingvue">
                <div class="select" v-if="visible1">
                    <input type="button" value="Yellow" class="selected">
                    <input type="button" value="Goldenrod">
                    <input type="button" value="indianRed">
                    <input type="button" value="Deepskyblue">
                    <input type="button" value="Lime">
                    <input type="button" value="Silver">
                    <input type="button" value="Orange">
                    <input type="button" value="Saddlebrown">
                    <input type="button" value="red">
                    <input type="button" value="Blue">
                    <input type="button" value="Green">
                    <input type="button" value="Black">
                </div>
                <span class="active">
                    <input type="button" value="Black">
                    <input type="button" id="colormenu" class="menu" v-on:click="set1()" value="^">
                </span>

            </div>
        </li>
        <li class="Shape">
            <h3>Shape</h3>
            <hr>
            <div id="shapelong" class="long" v-on:click="select">
                <input type="button" value="&#183;" class="dot selected">
                <input type="button" value="&#9585;" class="line">
                <input type="button" value="&#9711;" class="circle">
                <input type="button" value="&#9723;" class="rect">
                <input type="button" value="&#9651;" class="trian">
            </div>
            <div class="shapeshort short">
                <div class="select" v-if="visible2">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#9585;">
                    <input type="button" value="&#9711;">
                    <input type="button" value="&#9723;">
                    <input type="button" value="&#9651;">
                </div>
                <span class="active">
                    <input type="button" value="&#183;">
                    <input type="button" id="shapemenu" v-on:click="set2()" class="menu" value="^">
                </span>
            </div>
        </li>
        <li class="Size">
            <h4>Size</h4>
            <hr>
            <div id="sizelong" class="long" v-on:click="select">
                <input type="button" value="&#183;" class="1 selected">
                <input type="button" value="&#183;" class="2">
                <input type="button" value="&#183;" class="3">
                <input type="button" value="&#183;" class="4">
                <input type="button" value="&#183;" class="5">
            </div>
            <div class="sizeshort short">
                <div class="select" v-if="visible3">
                    <input type="button" value="&#183;" >
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                    <input type="button" value="&#183;">
                </div>
                <span class="active">
                    <input type="button" value="&#183;">
                    <input type="button" id="sizemenu" v-on:click="set3()" class="menu" value="^">
                </span>
            </div>
        </li>
    </ul>
</main>
<script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endsection