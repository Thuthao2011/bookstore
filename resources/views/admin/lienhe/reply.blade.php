@extends('admin.main')

@section('content')

@if (isset($success))
            <div class="alert alert-success">{{ $success }}</div>
        @endif
    <div class="contact mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $contact->name }}</strong></li>
            <li>Email: <strong>{{ $contact->email }}</strong></li>
            <li>Nội dung: <strong>{{ $contact->message }}</strong></li>

        </ul>
    </div>

    <form action="{{ route('lienhe.replyToContact', $contact->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="reply">Câu trả lời:</label>
            <textarea class="form-control" id="reply" name="reply" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
@endsection


