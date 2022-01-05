@extends('layouts.container')
<style>
    .card-body {
        -ms-flex: 1 1 auto;
        flex: 0 0 auto;
        padding: 0 !important;
        margin-left: 21px;
        margin-top: 10px;
    }
</style>
@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        {!! Form::open(['route' => ['role.storeupdateRole', $role->id], 'method' => 'POST', 'files' => true]) !!}
        <div class="card">
            <div class="card-header font-weight-bold">
                Cập nhật vai trò
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên vai trò</label>
                    <input class="form-control" type="text" name="name" id="name" value={{ $role->name }}>
                    @error('name')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Mô tả vai trò</label><br>
                    <textarea class="form-control" name="display_name" id="" cols="30"
                        rows="5">{{ $role->display_name }}</textarea>
                    @error('display_name')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card text-dark mb-3 mt-4 col-md-12 pl-0 pr-0">
            <div class="card-header bg-danger text-light">
                <label for="check_all">
                    <input type="checkbox" id="check_all" value="" class="checkbox_wp">
                    Chọn toàn bộ quyền
                </label>
            </div>
        </div>
        @foreach ($permissionParents as $permissionParent)
            <div class="card text-dark mb-3 mt-4 col-md-12 pl-0 pr-0">
                <div class="card-header bg-danger text-light">
                    <label for="{{ $permissionParent->id }}">
                        <input type="checkbox" id="{{ $permissionParent->id }}" value="" class="checkbox_wp">
                        {{ $permissionParent->name }}
                    </label>
                </div>
                <div class="row ml-0">
                    @foreach ($permissionParent->permissionsChildrent as $permissionsChildrentItem)
                        <div class="card-body col-lg-3" style="max-width: 20%;margin-right: 34px;">
                            <h5 class="card-title">
                                <label for="">
                                    <input type="checkbox" name="permission_id[]"
                                        value="{{ $permissionsChildrentItem->id }}" class="checkbox_child"
                                        {{ $permissionChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}>
                                    {{ $permissionsChildrentItem->name }}
                                </label>
                            </h5>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        {!! Form::submit('Cập nhật', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
