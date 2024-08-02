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
                                    @if (session('success'))
                                        <span class="alert alert-success" role="alert">
                                            <strong> {{ session('success') }}</strong>
                                        </span>
                                    @endif
                                        @if (session('error'))
                                            <span class="alert alert-danger w-100" role="alert">
                                            <strong> {{ session('error') }}</strong>
                                        </span>
                                        @endif
                                    <table class="display dataTable" id="basic-6" role="grid" aria-describedby="basic-6_info" style="width: 1552px;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 285px;">S#no</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">Card Number</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">Card Holder Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">Expiry Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106px;">cvv</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-6" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 91px;">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($cards as $key  => $all_cards)
                                            <tr >
                                                <td>{{$key +1}}</td>
                                                <td>{{$all_cards->card_number}}</td>
                                                <td>{{$all_cards->card_holder_name}}</td>
                                                <td>{{$all_cards->expiry_date}}</td>
                                                <td>{{$all_cards->cvv}}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"> <a href="{{route('cards.edit', ["card"=>$all_cards->id])}}"><i class="icon-pencil-alt"></i></a></li>
                                                        <form action="{{route('cards.destroy' , ["card"=>$all_cards->id])}}" method="post">
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
