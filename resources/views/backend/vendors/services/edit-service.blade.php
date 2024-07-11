@extends('backend.partials.master')
@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('services.update', ["service"=>$service->id])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Service Title</label>
                                            <input value="{{$service->name}}" class="form-control" type="text" name="name" placeholder="Service name *">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Services price</label>
                                            <input value="{{$service->price}}" class="form-control" name="price" type="number" placeholder="Enter Services Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <select class="form-select" name="category_id">
                                                <option value="selected" disabled selected>Select</option>
                                                @foreach($Category as $key => $Categories)
                                                    @if($service->category_id === $Categories->id)
                                                        <option selected value="{{$Categories->id}}">{{$Categories->category_name}}</option>
                                                    @else
                                                        <option value="{{$Categories->id}}">{{$Categories->category_name}}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Enter some Details</label>
                                            <textarea class="form-control" id="services_description" name="description" rows="3">{{$service->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success me-3" href="#">Update Service</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
