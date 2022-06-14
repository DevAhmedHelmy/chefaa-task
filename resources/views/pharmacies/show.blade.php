@extends('./app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>pharmacy Name : {{ $pharmacy->name }}</h5>
        </div>
        <div class="card-body">

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Product name</th>
                                <th scope="col">Product quantity </th>
                                <th scope="col">Product price </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pharmacy->products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->pivot->quantity }} </td>
                                    <td>{{ $product->pivot->price }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
