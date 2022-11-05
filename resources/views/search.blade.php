@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Citizens Registration</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <form method="POST" action="{{ route('citizens.searchCitizens') }}">
                                @csrf

                                <div class="col-md-6">
                                    Search <input id="search" type="text"
                                        class="form-control-sm @error('search') is-invalid @enderror"
                                        name="search"placeholder="Enter Citizens id or Name here" value="" required
                                        autocomplete="email" autofocus>
                                    <button type="submit" class=" form-control btn btn-primary btn-sm mt-2">
                                        Submit
                                    </button>

                                    @error('search')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </form>

                            <table class="mt-5 table-responsive text-center">
                                <thead class="bg-light">
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>Gender</td>
                                </thead>
                                @if (isset($citizens))
                                    @foreach ($citizens as $citizen)
                                        <tr>
                                            <td>{{ $citizen->id }}</td>
                                            <td>{{ $citizen->fullname }}</td>
                                            @if ($citizen->gender == 0)
                                                <td>Male</td>
                                            @else
                                                <td>Female</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
