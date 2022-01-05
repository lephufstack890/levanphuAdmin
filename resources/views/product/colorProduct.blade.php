@extends('layouts.container')

@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Thêm màu sắc
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'product/storeColor', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('color_name', 'Tên màu sắc') !!}
                            {!! Form::text('color_name', '', ['class' => 'form-control', 'id' => 'color_name']) !!}
                            @error('color_name')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('color_slug', 'Đường dẫn') !!}
                            {!! Form::text('color_slug', '', ['class' => 'form-control', 'id' => 'color_slug']) !!}
                            @error('color_slug')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        {!! Form::submit('Thêm mới', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách màu sắc
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên màu sắc</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $t = 0; ?>
                                @foreach ($list_color as $color)
                                    <?php $t++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $t; ?></th>
                                        <td>{{ $color->color_name }}</td>
                                        <td>{{ $color->color_slug }}</td>
                                        <td>{{ $color->created_at }}</td>
                                        <td>
                                            @can('update-color')
                                                <a href="{{ $color->url_update = Route('product.updatecolorProduct', $color->id) }}"
                                                    class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete-color')
                                                <a data-id="{{ $color->id }}"
                                                    onclick="myDeleteColor(this.getAttribute('data-id'))" href="#"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
