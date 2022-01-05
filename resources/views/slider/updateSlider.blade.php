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
                Cập nhật slider
            </div>
            <div class="card-body">
                {!! Form::open(['route' => ['slider.storeupdateSlider', $slider->id], 'method' => 'POST', 'files' => true]) !!}
                <div class="form-group">
                    <label for="">Chọn hình ảnh</label>
                    <input type="file" name="new_img" class="form-control-file">
                    <img class="update_img" src="{{ asset($slider->slider_img) }}" alt="">
                    <input type="hidden" name="old_img" value="">
                    @error('file')
                        <h6 class="form-text text-danger">{{ $message }}</h6>
                    @enderror
                </div>
                {!! Form::submit('Cập nhật', ['name' => 'btn_add', 'class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
