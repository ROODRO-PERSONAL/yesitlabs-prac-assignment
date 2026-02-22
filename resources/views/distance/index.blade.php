@extends('layouts.app')

@section('title','Distance Calculator')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card border-0 shadow-lg">

            {{-- Header --}}
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 fw-semibold">
                    📍 Distance Calculator
                </h4>
            </div>

            <div class="card-body p-4">

                <form method="POST" action="{{ route('distance.calculate') }}">
                    @csrf

                    {{-- Location 1 --}}
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-3">
                            Location 1
                        </h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text"
                                    name="lat1"
                                    class="form-control"
                                    placeholder="e.g. 22.5726"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text"
                                    name="lng1"
                                    class="form-control"
                                    placeholder="e.g. 88.3639"
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- Location 2 --}}
                    <div class="mb-4">
                        <h5 class="fw-bold text-success mb-3">
                            Location 2
                        </h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text"
                                    name="lat2"
                                    class="form-control"
                                    placeholder="e.g. 28.7041"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text"
                                    name="lng2"
                                    class="form-control"
                                    placeholder="e.g. 77.1025"
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="d-grid">
                        <button type="submit"
                            class="btn btn-primary btn-lg shadow-sm">
                            Calculate Distance
                        </button>
                    </div>

                </form>

                {{-- Result --}}
                @isset($distance)
                <hr class="my-4">

                <div class="alert alert-success text-center mb-0">
                    <h5 class="mb-1">✅ Distance Result</h5>
                    <strong class="fs-4">
                        {{ $distance }} KM
                    </strong>
                </div>
                @endisset

            </div>
        </div>

    </div>

</div>

@endsection