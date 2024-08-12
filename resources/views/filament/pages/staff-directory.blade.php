@extends('layouts.cork-layout')

@section('content')
<div class="row">
    <div class="col-lg-5 mx-auto">
        <div class="autocomplete-btn">
            <input id="example2" class="form-control" placeholder="Search Staff">
            <button id="search-btn" class="btn btn-primary">Search</button>
        </div>
    </div>
</div>
    <div class="container mx-auto mt-5" id="staff-directory">

        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area d-flex flex-wrap" id="staff-list">
                @php
                    $count = 0;
                @endphp 
                @foreach ($staff as $staffMember)
                    @php
                        $count++;
                    @endphp

                    <div id="card_5" class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 layout-spacing">
                        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-7 m-auto mt-5">
                            <div class="card style-7" >
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

                    @if ($count == 10)
                        @break
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
