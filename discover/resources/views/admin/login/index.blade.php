<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap v4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- google icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="{{ asset('login/asset/css/main.css') }}">


</head>

<body>


    <div class="login-page">
        <div class="login">
            <div class="header">
                <h3>Login</h3>
                <img src="{{ asset('login/asset/svg/path.svg') }}" alt="">
            </div>

            <div class="wrapper">
                <div class="img-box">
                    <img src="{{ asset('login/asset/svg/login.svg') }}" alt="">
                </div>

                <div class="form">
                    <form action="{{ route('admin.logindata') }}" method="POST">
                        @csrf
                        <div class="form-grp">
                            <label for="">Email</label>
                            <input type="email" name="uname" id="userName" placeholder="Email">
                        </div>
                        
                        <div class="form-grp">
                            <label for="">Password</label>
                            <input type="password" name="password" id="pwd" placeholder="Password">
                        </div>

                        <!-- <p class="error">Error : Info not matching.</p> -->

                        <button>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('login/logic/js/main.js') }}"></script>

</body>

</html>