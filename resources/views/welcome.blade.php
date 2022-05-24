<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Test Generator</title>
</head>
<body style="background: #f7fbfb">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center " style="height: 600px; ">
        <div class="col-md-6 col-sm-10 col-lg-4 p-4 " style="background: #ffffff; height: 400px; border-radius: 8%; box-shadow: 0px 0px 3px 3px #e6e6e6 ">
            <form action="/store" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <h2 class="text text-primary text-center">Test savollarini va jovoblarini generatsiya qilish</h2>
                        <div class="alert alert-danger" role="alert">
                       Diqqat ! Faylni <a href="https://docs.moodle.org/400/en/Aiken_format" class="alert-link">Aiken formatda</a>  yuklang.
                    </div>
                    <label for="txt" class="label">Fayl tanlang: </label>
                    <input type="file" name="file" id="txt" required class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Yuborish">
                </div>

            </form>
            <label for="">Sayt <a href="http://amusoft.uz/">AmuSoft.uz</a> tomonidan yaratilgan
            </label>


        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if($errors->any())

    swal({
        title: "Xatolik !",
        text: ".txt turdagi fayl yuklang !",
        icon: "warning",
        button: "ok",
    });
    @endif
</script>
</body>
</html>
