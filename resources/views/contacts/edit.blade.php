@extends('layouts.master')
@section('content')
    @include('layouts.inc.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">Edit Contact</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact">Contacts</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                    id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="public">Is it Public?</label>
                                <select class="form-control" id="public" name="public">
                                    <option value="1" {{ $contact->public == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $contact->public == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <button type="submit" class="btn btn-primary">Update Contact</button>
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
