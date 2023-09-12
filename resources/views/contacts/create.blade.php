@extends('layouts.master')
@section('content')
    @include('layouts.inc.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">New Contact</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                    id="contact" name="contact" required>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="public">Is it Public?</label>
                                <select class="form-control @error('public') is-invalid @enderror" id="public"
                                    name="public">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('public')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('success'))
                <div class="col-12 alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="col-12 alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
@endsection
