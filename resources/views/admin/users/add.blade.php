@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Người Dùng</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control"  placeholder="Nhập tên người dùng">
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input name="password" class="form-control">{{ old('password') }}</input>
                 </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Phone</label>
                        <input type="number" name="phone" value="{{ old('phone') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Địa Chỉ</label>
                        <input type="text" name="address" value="{{ old('address') }}"  class="form-control" >
                    </div>
                </div>
            </div>




        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
