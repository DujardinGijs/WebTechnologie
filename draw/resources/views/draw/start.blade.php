@extends("master")

@section("content")
    <main id="Index">
        <form method="post" action="{{ route("draw.store") }}"  class="username">
            @csrf
            <label for="Username">Enter your name:</label>
            <input type="text" name="name" id="Username" autofocus="autofocus" >
            <input type="submit" value="Start drawing">
        </form>
    </main>
    @endsection