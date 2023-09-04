{{-- Education Details --}}
<div class="card p-4 mb-4">
    <div class="row">
        <div class="row pb-3">
            <div class="col-8">
                <h2 class="fw-bold text-secondary">Education Details</h2>
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-primary" id="add_education">Add
                    Education</button>
            </div>
        </div>
        @php
        $eduCount = 0;
        @endphp
        <section class="education_section">
            <div class="card mb-4">
                <div class="card-body" id="card-education{{ $eduCount+1 }}">
                    <div class="col-12">
                        <div class="row mb-0">
                            <div class="col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">School Name*</label>
                                            <input type="text" id="school_name" name="school_name[{{ $eduCount }}]" placeholder="School Name" class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Qualification*</label>
                                            <input type="text" id="qualification" name="qualification[{{ $eduCount }}]" class="form-control" placeholder="Qualification" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <label class="form-label fw-bold text-secondary">Field of Study</label>
                                            <input type="text" id="field_of_study" name="field_of_study[{{ $eduCount }}]" class="form-control" placeholder="Field of Study" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Study Start Date*</label>
                                            <input type="date" id="study_start_date" name="study_start_date[{{ $eduCount }}]" class="form-control" placeholder="Study Start Date" max="{{ now()->toDateString() }}" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <label class="form-label fw-bold text-secondary">Study End Date*</label>
                                            <input type="date" id="study_end_date" name="study_end_date[{{ $eduCount }}]" class="form-control" placeholder="Study End Date" max="{{ now()->toDateString() }}" required />
                                        </div>
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