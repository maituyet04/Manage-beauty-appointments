@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Dịch Vụ</th>
            <th>Danh Mục</th>
            <th>Giá Gốc</th>
            <th>Giá Khuyến Mãi</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($beauties as $key => $beauty)
            <tr>
                <td>{{ $beauty->id }}</td>
                <td>{{ $beauty->name }}</td>
                <td>{{ $beauty->menu->name }}</td>
                <td>{{ $beauty->price }}</td>
                <td>{{ $beauty->price_sale }}</td>
                <td>{!! \App\Helpers\Helper::active($beauty->active) !!}</td>
                <td>{{ $beauty->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/beauties/edit/{{ $beauty->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $beauty->id }}, '/admin/beauties/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $beauties->links() !!}
    </div>
@endsection

