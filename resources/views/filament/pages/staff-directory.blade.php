@extends('layouts.cork-layout')

@section('content')
<div class="row">
    <div class="col-lg-5 mx-auto">
        <div class="autocomplete-btn">
            <form method="GET" action="{{ url()->current() }}">
                <div class="input-group">
                    <input id="example2" name="query" class="form-control" placeholder="Search Staff" value="{{ request()->input('query') }}">
                    <button type="submit" id="search-btn" class="btn btn-primary">Search</button>


                </div>
            </form>
        </div>
    </div>
                        <!-- Filter Icon -->
                        <div class="input-group-append m-2 d-flex justify-content-center justify-content-md-end justify-content-lg-end">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="departmentFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path d="M1.5 1.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.146.354L9 7.207V12.5l-2 2v-7.293L1.646 2.854A.5.5 0 0 1 1.5 2.5v-1z"/>
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="departmentFilter">
                                <li><a class="dropdown-item" href="{{ url()->current() }}">All Departments</a></li>
                                @foreach($departments as $dept)
                                    <li>
                                        <a class="dropdown-item" href="{{ url()->current() }}?query={{ request()->input('query') }}&department={{ $dept->department }}">
                                            {{ $dept->department }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
</div>

<div class="container mx-auto mt-5" id="staff-directory">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area d-flex flex-wrap" id="staff-list">
            @foreach ($staff as $staffMember)
                <div id="card_{{ $loop->index }}" class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 layout-spacing">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-7 m-auto mt-5">
                        <div class="card style-7">
                            <img src="{{ asset('storage/' . $staffMember->profile_picture) }}" class="card-img-top" alt="...">
                            <div class="card-footer">
                                <h5 class="card-title mb-0">{{ $staffMember->name }}</h5>
                                <p class="card-text">
                                    <strong>Extension:</strong> {{ $staffMember->ext_no }}<br>
                                    <strong>Department:</strong> {{ $staffMember->department }}<br>
                                    <strong>Designation:</strong> {{ $staffMember->designation }}<br>
                                    <strong>Contact Number:</strong> {{ $staffMember->contact_number }}<br>
                                    <strong>Email:</strong> {{ $staffMember->office_email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $staff->appends(['query' => request()->input('query'), 'department' => request()->input('department')])->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@endsection
