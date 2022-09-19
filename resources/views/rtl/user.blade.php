<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>



    .formexample {
        position: relative;
        width: 550px;
        height: 300px;
        border-radius: 20px;
        padding: 40px;
        box-sizing: border-box;
        background: #ecf0f3;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    }



    .inputs {
        text-align: left;
        margin-top: 30px;
    }

    label, input, button {
        display: block;
        width: 100%;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
    }

    label {
        margin-bottom: 4px;
    }

    label:nth-of-type(2) {
        margin-top: 12px;
    }

    input::placeholder {
        color: gray;
    }



    .submit {
        color: white;
        margin-top: 20px;
        height: 40px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 900;
        box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
        transition: 0.5s;
        background-color: #35858B;
    }

    .submit:hover {
        box-shadow: none;
    }



    input {
        background: #ecf0f3 !important;
        padding: 10px !important;
        padding-right: 20px !important;
        height: 50px !important;
        font-size: 14px !important;
        border-radius: 50px !important;
        box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white !important;
    }

</style>
<body>







<div class="container formexample">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <form method="post">
                <div class="inputs">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-right mb-3">نمونه ورودی خود را وارد نمایید </label>
                    <input type="text" class="form-control text-right" name="text">
                </div>
                <button type="submit" class="btn  mb-3 submit">ثبت</button>
                </div>
            </form>
            <div class="output"></div>
        </div>
    </div>
</div>
<script>
    $("form").submit(function (ev) {
        $.ajax({
            "url": "{{route('submit')}}",
            "type" : "POST",
            "data":$("form").serialize(),
            "success":function(res){
                const parser = new DOMParser();
                let doc = parser.parseFromString(res, "text/html");
                $(".output").html(`
            <span>خروجی نمونه  : ${doc.querySelectorAll("textarea").item(1).innerText}</span>
            `)
            },
            "error":function(){
                alert("error")
            }
        })
        ev.preventDefault();
    })
</script>
</body>
</html>
