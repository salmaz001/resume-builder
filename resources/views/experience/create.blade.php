{{-- Education Details --}}
<div class="card p-4 mb-4">
    <div class="row">
        <div class="row pb-3">
            <div class="col-8">
                <h2 class="fw-bold text-secondary">Work Experience Details</h2>
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-primary" id="add_work_experience">Add
                    Work Experience</button>
            </div>
        </div>
        <section class="work_experience_section">
        @php
        $workCount = 0;
        @endphp
            <div class="card mb-4">
                <div class="card-body" id="card-work{{ $workCount+1 }}">
                    <div class="col-12">
                        <div class="row mb-0">
                            <div class="col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end px-4 mx-2 pb-2">
                                        <div class="form-check">
                                        <input type="hidden" name="job_current[{{ $workCount }}]" value="0">
                                        <input class="form-check-input job-current-checkbox{{ $workCount+1 }}" type="checkbox" value="1" id="job_current{{ $workCount+1 }}" name="job_current[{{ $workCount }}]">
                                        <label class="form-check-label" for="job_current">
                                            I currently work here
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Job Title*</label>
                                            <input type="text" id="job_title" name="job_title[{{ $workCount }}]" placeholder="Job Title" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Company Name*</label>
                                            <input type="text" id="company_name" name="company_name[{{ $workCount }}]" class="form-control" placeholder="Company Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Job Start Date*</label>
                                            <input type="date" id="job_start_date" name="job_start_date[{{ $workCount }}]" class="form-control" placeholder="Job Start Date" max="{{ now()->toDateString() }}" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <label class="form-label fw-bold text-secondary">Job End Date*</label>
                                            <input type="date" id="job_end_date{{ $workCount+1 }}" name="job_end_date[{{ $workCount }}]" class="form-control job-end-date-input{{ $workCount+1 }}" placeholder="Job End Date" max="{{ now()->toDateString() }}" required />
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold text-secondary">Job
                                            Description</label>
                                        <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[{{ $workCount }}]" rows="4"></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>