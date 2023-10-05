<?php

namespace App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống',
        ]);
    }

    


    public function store(Request $request)
    {
        $lastAttempted = Auth::getLastAttempted();
//dd($lastAttempted);
//dd($request->input());
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('admin');
        }
    
        return redirect()->back()->withErrors(['login' => 'Email hoặc Mật khẩu không đúng.']);
    }

    public function getInputEmail()
    {
        return view('emails.input-email');
    }
    
    public function postInputEmail(Request $req)
    {
        $email = $req->txtEmail; // Thay $emai thành $email
    
        // Thực hiện kiểm tra định dạng email ở đây (bạn nên thêm logic kiểm tra email)
    
        $user = User::where('email', $email)->get(); // Sử dụng first() thay vì get()
    
        //dd($user);
        if ($user->count()!=0) {
            $sentData = [
                'title' => "Mật khẩu mới của bạn",
                'body' => '123456'
            ];
    
            \Mail::to($email)->send(new \App\Mail\SendMail($sentData)); // Sửa \App thành \\App
    
            Session::flash('message', 'Gửi email thành công');
            return redirect()->route('admin');
        } else {
            return redirect()->route('getInputEmail')->with('message', 'Email của bạn không đúng');
        }
    }

    
    
    
    
}
