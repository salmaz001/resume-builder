@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
            @endif
            <h1 class="text-center py-2">Welcome to Resume Builder</h1>
            <div class="card-body text-center">
                @if (Auth::guest() || !$resumeExists)
                <a class="btn btn-primary text-center" href="{{route('resume-builder.create')}}" role="button">Build Your Own Resume</a>

                @else
                <div class="d-flex justify-content-center">
                    @php
                    // Retrieve the resume link
                    $resume = \App\Models\PersonalDetails::where('user_id', auth()->user()->id)->first();
                    $resumeLink = $resume ? $resume->resume_link : null;
                    @endphp
                    <a class="btn btn-primary text-center mx-3" href="{{ route('resume.show', ['resumeLink' => $resumeLink]) }}" role="button"> View Resume</a>
                    <a class="btn btn-success text-center mx-3" href="{{route('resume-builder.edit', auth()->user()->id)}}" role="button"> Update Resume</a>
                    <form action="{{route('resume-builder.destroy', auth()->user()->id)}}" id="deleteResumeForm" method="POST" onsubmit="return confirm('Are you sure you want to delete? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="submitbtn" value="Delete" class="btn btn-danger text-center  mx-3">Delete Resume</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection