@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name">Tên Người Dùng</label>
                            <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="********" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập Nhật User</button>
            </div>
            @csrf
        </div>
    </form>
@endsection
