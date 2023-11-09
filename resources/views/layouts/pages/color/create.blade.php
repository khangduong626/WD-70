@extends('layouts.app',['activePage' => 'colors'])
@section('title_pages','Màu')
@section('pages_detail',isset($category)?"Sửa màu":"Thêm màu")


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
           
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">{{isset($color)?'Sửa màu':'Thêm màu'}}</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-4">
                <form action="{{isset($color)? route('color.update',$color->color_id): route('color.store')}}" method="POST">
                    @csrf
                    @if (isset($color))
                                @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Tên màu</label>
                                <input value="{{isset($color)? $color->color:''}}" type="text" name="color_name" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="col-md-6 h mt-5  ">
                            {{-- <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Mã màu</label>
                                <input value="{{isset($color)? $color->color_hex:''}}" type="text" name="color_hex" class="form-control form-control-lg">
                            </div> --}}
                            <label for="exampleColorInput" class="form-label">Mã màu</label>
                            <input type="color" name= "color_hex" class="" id="exampleColorInput" value="{{isset($color)? $color->color_hex:''}}" title="Choose your color">
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">{{isset($color)?'Sửa ':'Thêm '}}</button>
                </form>
                
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection