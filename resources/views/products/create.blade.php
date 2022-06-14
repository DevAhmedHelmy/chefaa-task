@extends('./app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add New Product</h5>
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
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="row" id="products-container">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pharmacy_id">Pharmacy</label>
                                    <select class="form-control" name="pharmacies[]">
                                        <option>choose</option>
                                        @foreach ($pharmacies as $pharmacy)
                                            <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="number" class="form-control" id="price" name="prices[]">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity">Product quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantities[]">
                                </div>
                            </div>
                        </div>
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
            <label for="pharmacy_id">Pharmacy</label>
            <select class="form-control" name="pharmacies[]">
                 <option>choose</option>
            @foreach ($pharmacies as $pharmacy)
            <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
            @endforeach
            </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" id="price" name="prices[]">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="quantity">Product quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantities[]">
            </div>
            </div>
            </div>`;
        $('#products-container').append(row);
    });
    </script>
@endpush
