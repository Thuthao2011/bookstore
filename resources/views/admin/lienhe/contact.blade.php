@extends('admin.main')

@section('content')






    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Email</th>
            <th>Nội dung </th>
            <th>Trạng thái </th>
            <th>Ngày nhận tin nhắn</th>
             <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $key => $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->status }}</td>
        <td>{{ $contact->created_at }}</td>
        <td>
        <a class="btn btn-primary btn-sm" href="{{ route('lienhe.reply', ['id' => $contact->id]) }}">
                <i class="fas fa-eye"></i>
            </a>
            <form id="delete-form-{{ $contact->id }}" action="{{ route('contacts.destroy', ['id' => $contact->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $contact->id }}').submit();">
                <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>

    <div class="card-footer clearfix">
    </div>
@endsection


