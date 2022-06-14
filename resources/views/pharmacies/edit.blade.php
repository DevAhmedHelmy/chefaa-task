@extends('./app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add New pharmacy</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('pharmacies.update',$pharmacy->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $pharmacy->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ $pharmacy->address }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="logo">logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        @foreach ($pharmacy->products as $item)

                        <div class="row" id="pharmacies-container">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pharmacy_id">Pharmacy</label>
                                    <select class="form-control" name="products[]">
                                        <option>choose</option>
                                        @foreach ($products as $product)
                                            <option @if($product->id == $item->id) selected @endif value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">product Price</label>
                                    <input type="number" class="form-control" id="price" name="prices[]" value="{{ $item->pivot->price }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity">product quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantities[]" value="{{ $item->pivot->quantity }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" id="add-row">Add Row</button>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    @endsection
@push('js')
<script>

    $('#add-row').click(function() {

        var row =`<div class="row mb-2">
            <div class="col-md-4">
            <div class="form-group">
            <label for="product_id">products</label>
            <select class="form-control" name="products[]">
                 <option>choose</option>
            @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->title }}</option>
            @endforeach
            </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="price">product Price</label>
            <input type="number" class="form-control" id="price" name="prices[]">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="quantity">product quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantities[]">
            </div>
            </div>
            </div>`;
        $('#pharmacies-container').append(row);
    });
    </script>
@endpush
