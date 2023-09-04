@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body col-12">
        <div class="row">
            <div class="col-12 p-md-5 p-sm-4 p-1">
                <h1 class="text-center pb-4">Update Your Resume</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- <form action="{{route('resume-builder.update', auth()->user()->id)}}" id="editform" method="POST" enctype="multipart/form-data"> -->
                <form action="{{ route('update') }}" id="editform" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('personal.edit')
                    @include('education.edit')
                    @include('experience.edit')

                    <div class="text-center">
                        <button type="submit" value="UPDATE" id="submitbtn" class="btn btn-lg btn-primary w-50 text-center">Update Resume</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection