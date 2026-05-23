<h1>About Page</h1>
<p>Hello {{ $name }}</p>
<form action="about" method="post">
    @csrf
    <input type="text" name="name" id="name"><br><br>
    <select name="department" id ="department">
        @foreach ($departments as $key => $department )
        <option value="{{$key}}">{{$department}}</option>
        @endforeach
    </select><br><br>
    <input type="submit" value="Send">
</form>
