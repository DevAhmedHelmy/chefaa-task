@extends('./app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>pharmacies</h5>

            <a href="{{ route('pharmacies.create') }}" class="btn btn-primary">Create New pharmacy</a>
        </div>
        <div class="card-body">

            <div class="card-body">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pharmacies as $pharmacy)
                                <tr>
                                    <th scope="row">{{ $pharmacy->id }}</th>
                                    <td>{{ $pharmacy->name }}</td>
                                    <td> {{ \Illuminate\Support\Str::limit($pharmacy->address, 50, $end = '...') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('pharmacies.edit', $pharmacy->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                             <a href="{{ route('pharmacies.show', $pharmacy->id) }}">
                                                <button class="btn btn-info btn-sm">Show</button>
                                            </a>
                                        <form action="{{ route('pharmacies.destroy', $pharmacy->id) }}" method="POST"
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
                {{ $pharmacies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
