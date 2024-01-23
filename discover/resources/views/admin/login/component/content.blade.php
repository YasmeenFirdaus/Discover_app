<div class="wrapper">
        <div class="logo">
            <img src="{{ asset('admin/images/icon.jpg')}}" alt="">
        </div>
        <div class="text-center mt-4 name">
            Admin Login
        </div>
        <form class="p-3 mt-3" action="{{ route('admin.logindata') }}" class="login-form" method="POST">
            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>

            @endif

            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="uname" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <!-- <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div> -->
    </div>
