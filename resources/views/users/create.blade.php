@extends('layouts.app')

@section('title','Create User')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Create New User</h4>
            </div>

            <div class="card-body">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control"
                               placeholder="Enter full name">
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control"
                               placeholder="Enter email">
                    </div>

                    {{-- Mobile --}}
                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input type="text"
                               name="mobile"
                               value="{{ old('mobile') }}"
                               class="form-control"
                               placeholder="10 digit mobile number">
                    </div>

                    {{-- Profile Image --}}
                    <div class="mb-3">
                        <label class="form-label">Profile Picture</label>
                        <input type="file"
                               name="profile_pic"
                               class="form-control">
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Minimum 6 characters">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            Save User
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection