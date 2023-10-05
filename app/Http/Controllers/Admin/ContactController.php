<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
    
        return view('admin.lienhe.contact', [
            'title' => 'Danh Sách khách hàng liên hệ',
            'contacts' => $contacts, // Truyền danh sách liên hệ vào view
        ]);
    }
    

    public function show($id)
    {
        // Tìm liên hệ theo ID
        $contact = Contact::find($id);
    
        // Kiểm tra xem liên hệ có tồn tại không
        if (!$contact) {
            return redirect()->route('admin.lienhe.contact')->with('error', 'Không tìm thấy liên hệ.');
        }
    
        // Trả về view hiển thị chi tiết liên hệ và truyền biến $contact vào view
    return view('admin.lienhe.reply', [
        'title' => 'khách hàng liên hệ',
        'contact' => $contact,
    ]);
    }
    
    
    public function updateContactStatus($id, $status)
    {
        // Cập nhật trạng thái của liên hệ với ID tương ứng
        $contact = Contact::find($id);
        $contact->status = $status;
        $contact->save();
        session()->flash('success', 'Cập nhật trạng thái thành công');

        // Trả về thông báo cập nhật thành công
        return redirect()->back()->with(['flag' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    public function replyToContact(Request $request, $id)
    {
        // Tìm liên hệ theo ID
        $contact = Contact::find($id);
    
        // Kiểm tra xem liên hệ có tồn tại không
        if (!$contact) {
            return redirect()->route('lienhe.index')->with('error', 'Không tìm thấy liên hệ.');
        }
    
        // Lấy nội dung phản hồi từ biểu mẫu
        $reply = $request->input('reply');
    
        // Thay đổi trạng thái và lưu liên hệ
        $contact->status = 'Đã liên hệ';
        $contact->save();
    
        // Gửi email đến địa chỉ email của khách hàng với nội dung phản hồi
        Mail::to($contact->email)->send(new ContactMail(['reply' => $reply]));
    
        return redirect()->route('lienhe.index')->with('success', 'Đã gửi phản hồi thành công.');
    }
    
    

    public function destroy($id)
{
    // Tìm liên hệ theo ID
    $contact = Contact::find($id);

    // Kiểm tra xem liên hệ có tồn tại không
    if (!$contact) {
        return redirect()->back()->with(['flag' => 'error', 'message' => 'Không tìm thấy liên hệ để xóa.']);
    }

    // Xóa liên hệ
    $contact->delete();

    return redirect()->back()->with(['flag' => 'success', 'message' => 'Liên hệ đã được xóa thành công.']);
}







}

