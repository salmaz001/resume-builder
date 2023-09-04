@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-body col-12">
        <div class="row">
            <div class="col-12 p-md-5 p-sm-4 p-1">

                {{-- Personal resume --}}
                <div class="card p-4 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-0">

                                <div class="col-sm-4 col-4">
                                    <div class="profile_picture text-center">

                                        <img class="profile box-image-preview img-fluid img-circle elevation-2" src="{{ isset($resume['personal_info']['profile_image']) && !empty($resume['personal_info']['profile_image']) ? asset('assets/images/'. $resume['personal_info']['profile_image'])  : asset('assets/images/user-thumb.jpg') }}" alt="" style="height:200px; width:200px;" />
                                    </div>
                                </div>
                                <div class="col-sm-8 col-12">
                                    <div class="row">
                                        <h1 class="fw-bold text-center">{{ ucwords($resume['personal_info']['first_name'])}}
                                            {{ ucwords($resume['personal_info']['last_name']) }}
                                        </h1>
                                        <div class="d-flex justify-content-center">
                                            <div class="mx-1">
                                                <a class="" href="mailto: {{ $resume['personal_info']['email'] }}">{{ $resume['personal_info']['email']}}</a>
                                            </div>
                                            <div class="mx-1">
                                                |
                                                {{ $resume['personal_info']['phone'] }}

                                            </div>
                                            <div class="mx-1">
                                                |
                                                {{ $resume['personal_info']['address'] }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        @if (!empty($resume['work_info']))
                                        <div class="experience-container container-block">
                                            <h3 class="container-block-title">Experience</h3>
                                            <hr>
                                            @foreach ($resume['work_info'] as $work_info)
                                            <div class="item py-2 pb-3">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="degree">
                                                        {{ $work_info['job_title'] }}
                                                    </h4>
                                                    <p class="text">
                                                        {{ \Carbon\Carbon::parse($work_info['job_start_date'])->format('F Y') }}
                                                        -
                                                        @if($work_info['job_current'] === 1)
                                                        Present
                                                        @else
                                                        {{ \Carbon\Carbon::parse($work_info['job_end_date'])->format('F Y') }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <h5 class="meta text-secondary">
                                                    {{ isset($work_info['company_name']) ? $work_info['company_name'] : '' }}
                                                </h5>
                                                <p>{{ isset($work_info['job_description']) ? $work_info['job_description'] : '' }}
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--//experience-container-->
                                        @endif
                                    </div>
                                    <div class="row pt-4">
                                        @if (!empty($resume['edu_info']))
                                        <div class="education-container container-block">
                                            <h3 class="container-block-title">Education</h3>
                                            <hr>
                                            @foreach ($resume['edu_info'] as $edu_info)
                                            <div class="item py-2 pb-3">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="degree">
                                                        {{ $edu_info['qualification'] }} , {{ isset($edu_info['field_of_study']) ? $edu_info['field_of_study'] : '' }}
                                                    </h4>
                                                    <p class="text">
                                                        {{ \Carbon\Carbon::parse($edu_info['study_start_date'])->format('F Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($edu_info['study_end_date'])->format('F Y') }}
                                                    </p>
                                                </div>
                                                <h5 class="meta text-secondary">
                                                    {{ isset($edu_info['school_name']) ? $edu_info['school_name'] : '' }}
                                                </h5>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--//education-container-->
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection