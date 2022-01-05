@extends('layouts.container')

@section('wp-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm người dùng
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'user/storeaddUser', 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                    @error('email')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    <select name="role_id[]" class="form-control" id="select2_init" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {!! Form::submit('Thêm mới', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </form>
            </div>
        </div>
    </div>
@endsection
