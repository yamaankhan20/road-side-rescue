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
                            <form action="{{ route('cards.store')}}" method="POST">
                                @csrf
                                <div class="form theme-form">
                                    <div class="form-group mb-3">
                                        <label for="card_number">Card Number</label>
                                        <input minlength="16" type="number" name="card_number" maxlength="16" pattern="\d{16}" class="form-control" required oninput="this.value = this.value.slice(0, 16);">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="card_holder_name">Card Holder Name</label>
                                        <input type="text" name="card_holder_name" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="expiry_date">Expiry Date</label>
                                        <input type="date" name="expiry_date" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="cvv">CVV</label>
                                        <input type="number" name="cvv" class="form-control" required maxlength="3" pattern="\d{3}" title="Please enter a 3-digit CVV" oninput="this.value = this.value.slice(0, 3);">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Card</button>
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
