@extends('dashboard.master')

@section('content')
    <div class="container">
        <h1>Custom Orders</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Image</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->message }}</td>
                            <td>{{ $order->image }}</td>
                            <td>{{ $order->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   
@endsection
