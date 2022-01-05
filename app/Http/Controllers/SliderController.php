<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function addSlider(){
        return view('slider.addSlider');
    }
    function storeaddSlider(Request $request){
        $request->validate(
            [
                'file' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
                'min' => ':attribute có độ dài ít nhất 5 kí tự!'
            ],
            [
                'file' => 'Ảnh slider',
            ]
        );
        $input_add_slider = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $fileName = $file->getClientOriginalName();
            // Lấy đuôi file
            echo $file->getClientOriginalExtension();
            // Lấy kích thước file
            echo $file->getSize();
            $path = $file->move('public/uploadSlider', $file->getClientOriginalName());
            $slider_img = 'public/uploadSlider/' . $fileName;
            $input_add_slider['slider_img'] = $slider_img;
        }
        Slider::create($input_add_slider);
        return redirect('slider/addSlider')->with('status', 'Thêm slider thành công!');
    }
    // Danh sách slider
    function showSlider(){
        $sliders = Slider::all();
        return view('slider.showSlider', compact('sliders'));
    }
    // Cập nhật slider
    function updateSlider($id){
        $slider = Slider::find($id);
        return view('slider.updateSlider', compact('slider'));
    }
    function storeupdateSlider(Request $request, $id){
        $slider = Slider::find($id);
        if ($request->hasFile('new_img')) {
            $new_img = $request->file('new_img');
            $old_img  = $slider->slider_img;
            unlink($old_img);
            $get_name_img = $new_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_img));
            $new_image = $name_image . rand(0, 99) . '.' . $new_img->getClientOriginalExtension();
            $new_img->move('public/uploadSlider', $new_image);
            $path = "public/uploadSlider/". $new_image;
            $slider->slider_img = $path;
        }
        if($slider->save()){
            return redirect()->route('slider.updateSlider', $slider->id)->with('status', 'Cập nhật thành công!');        
        }   
    }
    // Xóa slider
    function deleteSlider($id){
        Slider::find($id)->delete();
        return redirect('slider/showSlider')->with('status', 'Xóa slider thành công!');
    }
}
