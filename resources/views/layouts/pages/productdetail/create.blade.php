@extends('layouts.app',['activePage' => 'product'])
@section('title_pages','Sản phẩm')
@section('pages_detail','Sản phẩm biến thể')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
           
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">{{isset($productdetail)?'Sửa sản phẩm biến thể':'Thêm sản phẩm biến thể'}}</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-4">
                <form action="{{isset($productdetail) ? route('productdetail.update',$productdetail->product_detail_id): route('productdetail.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($productdetail))
                                @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6 h ">
                            {{-- <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Tên màu</label>
                                <input value="" type="text" name="color_name" class="form-control form-control-lg">
                            </div> --}}
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label for="exampleFormControlSelect1" class="ms-0">Màu sắc</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="color_id">
                                   
                                    @foreach ($colors as $color)
                                        
                                        <option value="{{$color->color_id}}" {{isset($productdetail) && $productdetail->color_id == $color->color_id ? "selected" : ''}} >{{$color->color}}  </option>
                                        
                                    
                                    @endforeach
                                </select>   
                              </div>
                        </div>
                        <div class="col-md-6 h   ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label for="exampleFormControlSelect1" class="ms-0">Kích thước</label>
                                <select class="form-control" id="exampleFormControlSelect1" name='size_id'>
                                    
                                    @foreach ($sizes as $size)
                                        
                                        <option value="{{$size->size_id}}" {{ isset($productdetail) &&  $productdetail->size_id == $size->size_id ?" selected ":''}}>{{$size->size}}  </option>
                                    
                                    
                                    @endforeach
                                </select>   
                            </div>
                        </div>
                        {{-- <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Tên Sản phẩm</label>
                    
                                <input class="form-control form-control-lg" value="{{isset($products)? $products->product_name : ''}}" type="text" name="product_name" class="form-control form-control-lg">
                            </div>
                        </div> --}}
                        <div class="col-md-12 h">
                            <label for="exampleFormControlFile1">Ảnh</label>
                            <input type="file" value="{{isset($productdetail) ? $productdetail->images:''}}" name="images" class="form-control-file" id="exampleFormControlFile1">
                                <div class="fileinput fileinput-new text-center">
                                        <img class=" w-50" src=" {{isset($productdetail) ? asset($productdetail->images) :"" }} " alt="">
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Giá</label>
                                <input value="{{isset($productdetail)? $productdetail->price : ''}}" type="text" name="price" class="form-control form-control-lg">
                            </div>
                        </div>
                        <input value="  {{isset($productdetail) ? $productdetail->product_id : $product_id }}" type="text" name="product_id" class="form-control form-control-lg" hidden>
                        <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Số lượng</label>
                                <input value="{{isset($productdetail)? $productdetail->stock_quantity : ''}}" type="text" name="stock_quantity" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="col-md-12 h ">
                            <div class="input-group input-group-lg input-group-static input-group-outline my-3 ">
                                <label class="">Mô tả</label>
                                <input value="{{isset($productdetail)? $productdetail->description : ''}}" type="text" name="description" class="form-control form-control-lg">
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">{{isset($productdetail)?'Sửa ':'Thêm '}}</button>
                </form>
                
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection