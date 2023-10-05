<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\User\UserService;

class LoginnController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }




    public function create()
    {
        return view('admin.users.add', [
           'title' => 'Thêm user mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|unique:users,email', // Kiểm tra email là duy nhất
            'password'   => 'required',
            'phone'   => 'required',
            'address'   => 'required',
        ]);
    
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $encryptedPassword = bcrypt($request->input('password'));
    
        // Chuyển đổi dữ liệu từ request thành một mảng để chèn vào cơ sở dữ liệu
        $userData = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => $encryptedPassword, // Mật khẩu đã được mã hóa
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
    
        // Chèn dữ liệu vào cơ sở dữ liệu
        $this->user->insert($request); // Sửa lại thành $this->user->insert($userData);
    
        return redirect()->back();
    }
    

    public function index()
    {
        return view('admin.users.list', [
            'title' => 'Danh Sách user Mới Nhất',
            'users' => $this->user->get()
        ]);
    }

    public function show(user $user)
    {
        return view('admin.users.edit', [
            'title' => 'Chỉnh Sửa Thông Tin Người Dùng',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required',
            'phone'   => 'required',
            'address'   => 'required',
        ]);
    
        // Kiểm tra nếu người dùng cung cấp mật khẩu mới, thì mã hóa nó
        if ($request->has('password')) {
            $encryptedPassword = bcrypt($request->input('password'));
        } else {
            // Nếu không cung cấp mật khẩu mới, sử dụng mật khẩu hiện có
            $encryptedPassword = $user->password;
        }
    
        $userData = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => $encryptedPassword, // Mật khẩu đã được mã hóa
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
    
        // Cập nhật thông tin người dùng
        $result = $user->update($userData);
    
        if ($result) {
            return redirect('/admin/users/list');
        }
    
        return redirect()->back();
    }
    

    public function destroy($id)
    {
        // Gọi phương thức getUserById từ model User
        $user = User::getUserById($id);
    
        if (!$user) {
            return redirect('/admin/users/list')->with('error', 'Người dùng không tồn tại');
        }
    
        if ($user->delete()) {
            return redirect('/admin/users/list')->with('success', 'Xóa thành công người dùng');
        }
    
        return redirect('/admin/users/list')->with('error', 'Xóa người dùng thất bại');
    }
    
    

}
