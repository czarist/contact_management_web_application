@extends('layouts.master')
@section('content')
    @include('layouts.inc.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1>Contacts</h1>
            </div>
            <div class="col-md-12 mt-5">
                <a href="{{ route('contacts.create') }}" class="btn btn-success">New Contact</a>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">Global Public Contact List</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publicContacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->contact }}</td>
                                        <td>{{ $contact->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Contact List</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($privateContacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->contact }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>
                                            <a href="{{ route('contacts.edit', $contact->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this contact')">Delete</button>
                                            </form>
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
@endsection
