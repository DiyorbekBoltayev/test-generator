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


<div class="container ">
    <a href="/" class="btn btn-primary mt-5 mb-5"> Ortga qaytish </a>
    <div class="card mt-4 p-4">

        <h3 class="text">Dasturdan foydalanish qo'llanmasi</h3>
        <li><p>
                Ushbu dastur yordamida test savollarini va javoblarini generatsiya qilish mumkin. Buning uchun
               <b>AIKEN </b>formatdagi <b>.txt </b> kengaytmali faylni yuklash va variantlar soni, har bir variantdagi savolllar
                soni tanlanishi kerak. Umumiy savollar soni (variantlar soni * bir variantdagi savollar soni) <b>20 000</b> dan oshmasligi kerak
<b>Barcha to'gri javoblar A javobda bo'lishi kerak. Javoblardan keyin "ANSWER: A" (orasida bitta bo'sh joy bor) qo'shtirnoqlarsiz bo'lishi shart.</b> Quyidagi AIKEN format notog'ri yozilgan bo'lsa dastur to'gri ishlamaydi.
            </p></li>
        <li>
            AIKEN formatga misol<br><br>
            HTML teglar necha xil bo‘ladi?? <br>
            A. Juft, toq, maxsus teglar<br>
            B. Toq teglari<br>
            C. Juft teglari<br>
            D. Ko‘rinishi ko‘p<br>
            ANSWER: A<br>
<br><br>
            Qaysi teg HTML hujjatning tanasini ifodalaydi??<br>
            A. body<br>
            B. html<br>
            C. head<br>
            D. title<br>
            ANSWER: A<br>
            <br><br>

        </li>

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
