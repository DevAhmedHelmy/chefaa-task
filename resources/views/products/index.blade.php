@extends('./app')
@section('content')
    <div class="col-12 mb-5 pb-3">


        <div class="mb-2">
            <input type="text" autocomplete="off" id="search" class="form-control typeahead" placeholder="Search ...">
        </div>
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Products</h5>

                <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
            </div>
            <div class="card-body">

                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->title }}</td>
                                        <td> {{ \Illuminate\Support\Str::limit($product->description, 50, $end = '...') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('products.show', $product->id) }}">
                                                <button class="btn btn-info btn-sm">Show</button>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var path = "{{ route('products.search') }}";
        $('#search').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    search: query
                }, function(data) {
                    return process(data.data);
                });
            },
            displayText: function(item) {
                return item.title;
            },
            afterSelect: function(data) {
                window.location.replace(`/products/${data.id}`);
            }
        });
    </script>
@endpush
