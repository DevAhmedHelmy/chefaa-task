@extends('./app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Product Name : {{ $product->title }}</h5>
        </div>
        <div class="card-body">

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">pharmacy name</th>
                                <th scope="col">Product quantity </th>
                                <th scope="col">Product price </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->pharmacies as $pharmacy)
                                <tr>
                                    <td>{{ $pharmacy->name }}</td>
                                    <td>{{ $pharmacy->pivot->quantity }} </td>
                                    <td>{{ $pharmacy->pivot->price }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
