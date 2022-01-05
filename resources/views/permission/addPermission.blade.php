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
                        Thêm quyền
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'permission/storeAddpermission', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="name">Tên quyền</label>
                            <input class="form-control" type="text" name="name" id="name">
                            @error('name')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="display_name">Mô tả</label>
                            <input class="form-control" type="text" name="display_name" id="display_name">
                            @error('display_name')
                                <h6 class="form-text text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="belongPermission">Thuộc quyền</label>
                            <select name="module_parent" id="" class="form-control">
                                <option value="0">Chọn quyền cha</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('belongPermission')
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
                    <div class="card-body mr-2 mb-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col" class="text-left pl-4">Tên quyền</th>
                                    <th scope="col" class="text-left">Mô tả</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t=0;    
                                @endphp
                                @foreach ($list_permission as $item)
                                @php
                                    $t++;    
                                @endphp
                                    <tr>
                                        <th scope="row">{{$t}}</th>
                                        <td class="text-left pl-4"><?php echo str_repeat('----', $item->level) . $item->name; ?></td>
                                        <td class="text-left"><?php echo $item->display_name; ?></td>
                                        <td><a href=""
                                            class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#"
                                            class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
