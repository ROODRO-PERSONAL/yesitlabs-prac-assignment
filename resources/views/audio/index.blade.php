@extends('layouts.app')

@section('title','Audio Duration Calculator')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card border-0 shadow-lg">

            {{-- Card Header --}}
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 fw-semibold">
                    🎵 Audio Play Time Calculator
                </h4>
            </div>

            <div class="card-body p-4">

                {{-- Upload Form --}}
                <form action="{{ route('audio.calculate') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- File Input --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Select Audio File
                        </label>

                        <input type="file"
                               name="audio"
                               class="form-control @error('audio') is-invalid @enderror"
                               required>

                        @error('audio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-text">
                            Supported formats: mp3, wav, mpeg
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit"
                                class="btn btn-primary btn-lg shadow-sm">
                            Get Duration
                        </button>
                    </div>

                </form>

                {{-- Result Section --}}
                @isset($duration)
                    <hr class="my-4">

                    <div class="alert alert-success text-center mb-0">
                        <h5 class="mb-1">✅ Audio Duration</h5>
                        <strong class="fs-4">
                            {{ $duration }} seconds
                        </strong>
                    </div>
                @endisset

            </div>
        </div>

    </div>

</div>

@endsection