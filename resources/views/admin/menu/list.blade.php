@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->name }}</td>
        <td>
        <a href="{{ asset('template/menu/'. $menu->thumb) }}" target="_blank">
            <img src="{{ asset('template/menu/'. $menu->thumb) }}" width="100px" alt="Ảnh sản phẩm">
        </a>
        </td>
        <td>{!! \App\Helpers\Helper::active($menu->active) !!}</td>
        <td>{{ $menu->updated_at }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{ $menu->id }}">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#" class="btn btn-danger btn-sm"
               onclick="removeRow({{ $menu->id }}, '/admin/menus/destroy')">
                <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
@endsection



