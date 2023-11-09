@extends('layouts.app',['activePage' => 'product'])
@section('title_pages','Sản phẩm')
@section('pages_detail','Thêm sản phẩm')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
           
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">{{isset($products)?'Sửa sản phẩm':'Thêm sản phẩm'}}</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-4">
                <form action="{{isset($products) ? route('product.update',$products->product_id): route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($products))
                                @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6 h ">
                            {{-- <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Tên màu</label>
                                <input value="" type="text" name="color_name" class="form-control form-control-lg">
                            </div> --}}
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label for="exampleFormControlSelect1" class="ms-0">Danh mục</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    <option value="0">---NONE--- </option>
                                    @foreach ($categories as $category)
                                        
                                        <option value="{{$category->category_id}}"  {{ isset($products) &&  $products->category_id == $category->category_id ?" selected ":''}}>{{$category->category_name}}  </option>
                                        
                                    
                                    @endforeach
                                </select>   
                              </div>
                        </div>
                        <div class="col-md-6 h   ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label for="exampleFormControlSelect1" class="ms-0">Thương hiệu</label>
                                <select class="form-control" id="exampleFormControlSelect1" name='brand_id'>
                                    <option value="0">---NONE--- </option>
                                    @foreach ($brands as $brand)
                                        
                                        <option value="{{$brand->brand_id}}" {{ isset($products) &&  $products->brand_id == $brand->brand_id ?" selected ":''}}>{{$brand->brand_name}}  </option>
                                    
                                    
                                    @endforeach
                                </select>   
                            </div>
                        </div>
                        <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Tên Sản phẩm</label>
                    
                                <input class="form-control form-control-lg" value="{{isset($products)? $products->product_name : ''}}" type="text" name="product_name" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="col-md-12 h">
                            <label for="exampleFormControlFile1">Ảnh</label>
                            <input type="file" value="{{isset($products) ? $products->img_url:''}}" name="img_url" class="form-control-file" id="exampleFormControlFile1">
                                <div class="fileinput fileinput-new text-center">
                                        <img class=" w-50" src=" {{isset($products) ? asset($products->img_url) :"" }} " alt="">
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Giá</label>
                                <input value="{{isset($products)? $products->price : ''}}" type="text" name="price" class="form-control form-control-lg">
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">{{isset($products)?'Sửa ':'Thêm '}}</button>
                </form>
                
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection