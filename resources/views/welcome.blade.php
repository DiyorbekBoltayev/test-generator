<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Generator</title>
</head>
<body>
<form action="/store" method="post" enctype="multipart/form-data" >
    @csrf
    <label for="txt">.txt formatdagi fayl yuklang !</label> <br>
    <input type="file" style="color: black" name="file" id="txt"><br>
    <input type="submit" value="saqlash">
</form>
</body>
</html>
