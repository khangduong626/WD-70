@extends('layouts.app',['activePage' => 'sizes'])
@section('title_pages','Kích thước')
@section('pages_detail',isset($size)?"Sửa kích thước":"Thêm kích thước")


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
           
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">{{isset($size)?'Sửa kích thước':'Thêm kích thước'}}</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-4">
                <form action="{{isset($size)? route('size.update',$size->size_id): route('size.store')}}" method="POST">
                    @csrf
                    @if (isset($size))
                                @method('PUT')
                    @endif
                    <div class="col-md-12 h ">
                    <div class="input-group input-group-lg input-group-static mb-4">
                      <label class="">Tên kích thước</label>
                      <input value="{{isset($size)? $size->size:''}}" type="text" name="size_name" class="form-control form-control-lg">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Thêm</button>
                </form>
                
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection