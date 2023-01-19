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
        <div class="col-md-6 col-sm-10 col-lg-4 p-4 " style="background: #ffffff; height:500px; border-radius: 8%; box-shadow: 0px 0px 3px 3px #e6e6e6 ">
            <form action="/store" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="mb-4">
                    <h3 class="text text-center m-4  text-info">Test generator</h3>
                </div>
                <div class="mb-4">
                    <label for="txt1" class="label">Bitta variantdagi savollar sonini kiriting</label>
                    <input type="number" name="savol_soni" value="{{old('savol_soni')}}" id="txt1" required class="form-control">
                </div>
                <div class="mb-4">
                    <label for="txt2" class="label"> Variantlar sonini kiriting </label>
                    <input type="number" name="variant_soni" id="txt2" value="{{old('variant_soni')}}" required class="form-control">
                </div>
                <div class="mb-4">
                    <label for="txt" class="label">Fayl tanlang: </label>
                    <input type="file" name="file" id="txt" required class="form-control">
                </div>
                <div class="mb-4">
                    <input type="submit" class="form-control btn btn-primary" value="Yuborish">
                </div>

            </form>
            <div class="d-flex justify-content-between">
                <label for=""> ©<a href="http://amusoft.uz/">AmuSoft.uz</a></label>
                <label for=""> <a href="{{route('doc')}}">Foydalanish qo'llanmasi</a></label>
            </div>



        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    let errors = @json($errors->all());
    @if($errors->any())
    console.log(errors);

    let msg = '';
    for (let i = 0; i < errors.length; i++) {
        msg += (i + 1) + '-xatolik ' + errors[i] + '\n';
    }

    swal({
        title: "Xatolik !",
        text: msg,
        icon: "warning",
        button: "ok",
    });
    @endif
</script>
</body>
</html>
