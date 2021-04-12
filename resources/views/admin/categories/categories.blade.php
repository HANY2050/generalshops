@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">


            <div class="col-md-12" >

                <div class="card">
                    <div class="card-header">{{ __('categories') }}</div>
                    <div class="card-body">


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong  >{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <form action="{{route('categories')}}" method="post" class="row">

                            @csrf

                            <div class="form-group col-md-6 ">
                                <label for="tag_name" >Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Tag Name " required >
                            </div>



                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary btn2 " >ادخال البيانات</button>
                            </div>
                        </form>










                        <div class="row">

                            @foreach($categories as $category)
                                <div class="col-md-3" >
                                    <div class="alert alert-primary" role="alert">

                                        <span>
                                            <form action="{{route('categories')}}" method="post"  >
                                         @csrf

                                       <input type="hidden" name="_method"  value="delete" />
                                                   <input type="hidden" name="category_id"  value="{{$category->id}}" />
                                                <button type="submit" class="delete-btn" ><i class="fas fa-trash-alt"></i></button>

                                            </form>

                                        </span>

                                        <span> <a class="edit-All" data-categoryname="{{$category->name}}"

                                                  data-categorygid="{{$category->id}}"> <i class="fas fa-edit"></i> </a>  </span>



                                        <p>{{$category->name}}</p>


                                    </div>


                                </div>

                            @endforeach

                        </div>
                            {{ (!is_null($showLinks)&&$showLinks)  ? $categories->links('pagination::bootstrap-4'):'' }}
                            <form action="{{route('search-categories')}}"  method="get"  >
                                @csrf
                                <div class="row" >
                                    <div class="form-group col-md-6 ">
                                        <input type="text" class="form-control" name="category_search" id="category_search" placeholder="Tag Search " required >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary" >بحث</button>
                                    </div>
                                </div>
                            </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="modal" tabindex="-1"  id="edit" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل البيانات</h5>
                    <span> <a  href=""  class="edit-close"  >  <i class="fas fa-window-close"></i> </a>  </span>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories')}}" method="post" class="row">

                        @csrf

                        <div class="form-group col-md-6 ">
                            <label for="category_name" >Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="edit_category_name" placeholder="Category Name " required >
                        </div>

                        <input type="hidden" class="form-control" name="category_id" id="edit_category_id"  required >
                        <input type="hidden" name="_method"  value="put" />
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn2 " >تحديث البيانات </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('.delete-btn').click(function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });
    </script>

    <script>
        $(document).ready(function (){
            var $Edit = $('.edit-All');
            var $Window = $('#edit');
            var $edit_category_name =$('#edit_category_name');

            var $edit_category_id =$('#edit_category_id');
            $Edit.on('click', function (element) {
                element.preventDefault();
                var categoryName = $(this).data('categoryname');

                var categoryId = $(this).data('categorygid');
                $Window.modal('show');

                $edit_category_name.val(categoryName);

                $edit_category_id.val(categoryId);

            });


        });


    </script>






@endsection
