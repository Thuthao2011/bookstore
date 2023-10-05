<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.list', compact('contacts'));
    }




    public function store(Request $request)
    {
        // Lưu dữ liệu từ form vào cơ sở dữ liệu
        $contact = new Contact();
        $contact->name = $request->input('your-name');
        $contact->email = $request->input('your-email');
         $contact->message = $request->input('your-message');
        $contact->save();
    
        // Trả về thông báo thành công hoặc chuyển hướng đến trang khác
        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi đi thành công!');
    }

    public function updateStatus($id)
    {
        $contact = Contact::find($id);
    
        return view('contacts.list', compact('contact'));
    }


    
 
}
