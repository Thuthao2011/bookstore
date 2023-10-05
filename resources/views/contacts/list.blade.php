<head>
    @include('head')
</head>
@include('header')


@include('admin.head')

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Liên hệ</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @include('admin.alert')
                <form method="POST" action="{{ route('contacts.store') }}">
                <div class="input-group mb-3">
    <input type="text" name="your-name" class="form-control" placeholder="Họ và tên">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
</div>

<div class="input-group mb-3">
    <input type="email" name="your-email" class="form-control" placeholder="Nhập mail của bạn">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>


<div class="input-group mb-3">
    <textarea type="text" name="your-message" class="form-control" placeholder="Nội dung liên hệ"></textarea>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-map-marker"></span>
        </div>
    </div>
</div>
 



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
 
