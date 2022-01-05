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
                        Thêm danh mục
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'page/storeAddcatpage', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="page_cat">Tên danh mục</label>
                            <input class="form-control" type="text" name="page_cat" id="page_cat">
                            @error('page_cat')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="page_slug">Đường dẫn</label>
                            <input class="form-control" type="text" name="page_slug" id="page_slug">
                            @error('page_slug')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $t = 0; ?>
                                @foreach ($cat_page as $cat)
                                    <?php $t++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $t; ?></th>
                                        <td>{{ $cat->page_cat }}</td>
                                        <td>{{ $cat->page_slug }}</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>@can('update-cat-page')
                                                <a href="{{ $cat->url_update = Route('page.updatecatPage', $cat->id) }}"
                                                    class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('delete-cat-page')
                                                <a data-id="{{ $cat->id }}"
                                                    onclick="myDeletecatpage(this.getAttribute('data-id'))" href="#"
                                                    class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
