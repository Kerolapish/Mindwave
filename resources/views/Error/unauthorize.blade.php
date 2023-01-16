<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/images/mindwave-ico.png">
    <link rel="stylesheet" href="{{ asset('assets\css\ErrorStyle.css') }}">
    <title>401 - Unauthorize</title>
</head>

<body>
    <div class="topText">
        <h1>
            <span class="digit">4</span>
            <span class="digit">0</span>
            <span class="digit">1</span>
        </h1>
        <p>Missing Permision</p>
        <p class="message">Don't worry, we will redirect you to out homepage in <span id="timer">5</span> second(s) <br>or click <a href="{{ url('/') }}">here</a> if don't wish to wait</p>
    </div>
</body>
<script>
    var count = 5;
    var countdown = setInterval(function() {
        document.getElementById("timer").innerHTML = count;
        if (count == 0) {
            clearInterval(countdown);
            window.location.href = "{{ url('/') }}";
        }
        count--;
    }, 1000);
</script>

</html>
