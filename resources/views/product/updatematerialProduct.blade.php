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
                        Cập nhật chất liệu
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['product.storeupdateMaterial', $item->id], 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="material_name">Tên chất liệu</label>
                            <input type="text" name="material_name" class="form-control" id="material_name" value="{{$item->material_name}}">
                            @error('material_name')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="material_slug">Đường dẫn</label>
                            <input type="text" name="material_slug" class="form-control" id="material_slug" value="{{$item->material_slug}}">
                            @error('material_slug')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        {!! Form::submit('Cập nhật', ['name' => 'btn_update', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách chất liệu
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên chất liệu</th>
                                    <th scope="col">Đường dẫn</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $t = 0; ?>
                                @foreach ($list_material as $material)
                                    <?php $t++; ?>
                                    <tr>
                                        <th scope="row"><?php echo $t; ?></th>
                                        <td>{{$material->material_name}}</td>
                                        <td>{{$material->material_slug}}</td>
                                        <td>{{ $material->created_at }}</td>
                                        <td>
                                            <a href="{{ $material->url_update = Route('product.updatematerialProduct', $material->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
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
