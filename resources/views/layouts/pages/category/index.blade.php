@extends('layouts.app',['activePage' => 'category'])
@section('title_pages','Danh mục')
@section('pages_detail','Danh sách danh mục')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <a href="{{route('category.create')}}" class="btn btn-icon btn-3 btn-primary" type="button">
                <span class="btn-inner--icon"><i class="material-icons">add</i></span>
              <span class="btn-inner--text">Thêm mới</span>
            </a>
            <div class="card my-4">
                
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Bảng danh mục</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                {{-- <div>
                                  <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                </div> --}}
                                <div class=" justify-content-center">
                                  <h4 class="mb-2 text-mb ">{{$category->category_name}}</h4>
                                  {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                </div>
                              </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">Hiện</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$category->updated_at}}</span>
                            </td>
                            <td class="align-middle  text-center mr-5">
                              <a href={{route('category.edit',$category->category_id)}} class="btn btn-outline-secondary " data-toggle="tooltip" >
                                <i class="material-icons opacity-10">edit</i>
                              </a>
                              <form 
                              action="{{route('category.delete',$category->category_id)}} "
                              method="POST"
                              >
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger"><i class="material-icons opacity-10">delete</i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
        
</div>
@endsection