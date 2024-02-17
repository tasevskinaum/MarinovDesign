@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Custom Orders</h1>

        <table id="orders-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customOrders as $customOrder)
                    <tr>
                        <td>{{ $customOrder->id }}</td>
                        <td>{{ $customOrder->name }}</td>
                        <td>{{ $customOrder->email }}</td>
                        <td>{{ $customOrder->message }}</td>
                        <td><img src="{{ asset('storage/'.$customOrder->image) }}" alt="" width="100"></td>
                        <td>{{ $customOrder->link }}</td>
                        <td>
                            @if($customOrder->completed)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('custom-orders.edit', $customOrder->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('custom-orders.toggle-completed', $customOrder->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn {{ $customOrder->completed ? 'btn-success' : 'btn-warning' }}">
                                    {{ $customOrder->completed ? 'Completed' : 'Mark as Completed' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection