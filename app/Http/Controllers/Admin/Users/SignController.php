<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash;

class SignController extends Controller
{
    public function index()
    {
        return view('admin.users.signup');
    }

    public function store(Request $request)
    {
        // dd($request->all()); // In ra dữ liệu để kiểm tra
    
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            //Thêm validation rules cho các trường bổ sung khác (nếu cần)
        ], [
            'full_name.required' => 'Họ và tên không được để trống.',
            'email.required' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu phải có ít nhất 8 ký tự và khớp với mật khẩu xác nhận.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'address.required' => 'Địa chỉ không được để trống.',
        ]);
    
        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
    
        return redirect()->back()->with('success', 'Tạo tài khoản thành công');
    }
    
}