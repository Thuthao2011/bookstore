<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <title>Đăng ký hệ thống</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng ký</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @include('admin.alert')
                <form method="POST" action="{{ route('signup') }}/store">
                <div class="input-group mb-3">
    <input type="text" name="full_name" class="form-control" placeholder="Họ và tên">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-phone"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-map-marker"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
    <a href="{{ route('login') }}" class="btn btn-link">Đăng nhập</a>

    </div>
    <!-- /.col -->
    <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </div>
    <!-- /.col -->
</div>

                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    @include('admin.footer')
</body>
</html>