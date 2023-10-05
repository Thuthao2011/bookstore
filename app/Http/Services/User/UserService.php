<?php


namespace App\Http\Services\User;


use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserService
{

    public function insert(\Illuminate\Http\Request $request)
    {
        try {
            $requestData = $request->except(['_token']);
    
            // Kiểm tra nếu có trường 'password' trong dữ liệu đầu vào và mã hóa nó
            if (isset($requestData['password'])) {
                $requestData['password'] = bcrypt($requestData['password']);
            }
    
            User::create($requestData);
            Session::flash('success', 'Thêm User mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm User LỖI');
            Log::error($err->getMessage());
    
            return false;
        }
    
        return true;
    }
    
    

    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    public function update($request, $User)
    {
        try {
            $User->fill($request->input());
            $User->save();
            Session::flash('success', 'Cập nhật User thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật User Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy(User $user)
    {
        if ($user) {
            $path = str_replace('storage', 'public');
            Storage::delete($path);
            $user->delete();
            return true;
        }
    
        return false;
    }

    
}