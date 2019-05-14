<!doctype html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
        <h1>hello world View</h1>
        {{-- <h1>news_id：{{$id}}</h1> --}}
            <input type="file" name="upload" id="upload">
            <input type="button" value="submit" onclick="upload()">
    </body>
</html>
<script>
function upload()
{
   

}
</script>