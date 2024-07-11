@extends('backend.partials.master')
@section('content')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <div id="basic-6_wrapper" class="dataTables_wrapper">
                                    <table class="display dataTable" id="basic-6" role="grid" aria-describedby="basic-6_info" style="width: 1552px;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 285px;">S#no</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">Category Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 91px;">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($categories as $key  => $category)
                                            <tr >
                                            <td>{{$key +1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="{{route('categories.edit', ["category"=>$category->id])}}"><i class="icon-pencil-alt"></i></a></li>
                                                    <form action="{{route('categories.destroy' , ["category"=>$category->id])}}" method="post">
                                                        @method("DELETE")
                                                        @csrf
                                                        <li class="delete">
                                                            <button type="submit" class="submit_delete"><i class="icon-trash"></i></button></li>
                                                    </form>
                                                </ul>
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
                <!-- Complex headers (rowspan and colspan) Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
