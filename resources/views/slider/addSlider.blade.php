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
                Thêm slider
            </div>
            <div class="card-body">
                {!! Form::open(['url' => 'slider/storeaddSlider', 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('', 'Chọn hình ảnh') !!}
                    {!! Form::file('file', ['class' => 'form-control-file']) !!}
                    @error('file')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {!! Form::submit('Thêm mới', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
