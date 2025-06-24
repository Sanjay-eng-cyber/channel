<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order|Placed</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <div style="max-width: 600px; text-align: center; margin: auto;background-color: #fff;">

        <div
            style="border-radius:15px;border:2px solid rgba(16, 130, 6, 1);box-shadow: 8px 9px 8px 0px rgba(0, 0, 0, 0.25);">
            <div style="max-width: 320px;margin: 0 auto;padding-top:40px;">

                <img src="{{ asset('frontend/images/mail-img/way.png') }}" style="max-width: 100%;" alt="">
            </div>

            <div style="max-width:400px;margin: 0 auto;">

                <h2 style="font-family: 'Poppins', sans-serif;color:rgba(30, 186, 17, 1);font-weight:500;font-size:24px;text-align:center">Order Is In Process</h2>

                <p style="margin-bottom:0px;font-family: 'Poppins', sans-serif;text-align:center;color:#455A64;padding-left:25px;padding-right:25px;font-weight:400;font-size:14px">
                    Hello <strong style="color: black;font-size:14px;font-weight:500"> {{ $userName }} </strong>, Your Order For<br /> <strong style="color: black;font-size:14px;font-weight:500">{{ $productName }}</strong>
                    Is In Process.<br />The Order Will Be Delivered Soon.
                </p>

                <p style="color:#455A64;font-weight:400;text-align:center;font-size:14px; font-family: 'Poppins', sans-serif;padding-top:10px;padding-bottom:10px">
                    For Any Queries Please Contact On Email : <a href="mailto:{{ $adminMail }}">{{ $adminMail }}</a>
                </p>

            </div>


            <div style="max-width:67px;margin: 0 auto;padding-top:25px;padding-bottom:25px;">

                <img src="{{ asset('frontend/images/mail-img/logo.png') }}" style="max-width: 100%;" alt="">
            </div>


        </div>
    </div>

</body>

</html>
