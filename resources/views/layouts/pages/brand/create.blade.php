@extends('layouts.app',['activePage' => 'brands'])
@section('title_pages','Thương hiệu')
@section('pages_detail',isset($brand)?"Sửa thương hiệu":"Thêm thương hiệu")


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
           
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">{{isset($brand)?'Sửa Thương hiệu':'Thêm thương hiệu'}}</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-4">
                <form action="{{isset($brand) ? route('brand.update',$brand->brand_id): route('brand.store')}}" method="POST">
                    @csrf
                    @if (isset($brand))
                                @method('PUT')
                    @endif
                    <div class="col-md-12 h ">
                    <div class="input-group input-group-lg input-group-static mb-4">
                      <label class="">Tên thương hiệu</label>
                      <input value="{{isset($brand)? $brand->brand_name:''}}" type="text" name="brand_name" class="form-control form-control-lg">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">{{isset($brand)?'Sửa ':'Thêm '}}</button>
                </form>
                
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection