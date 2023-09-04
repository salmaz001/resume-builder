$(document).ready(function () {
    var lastEduCard = $("[id^='card-education']").last();
    var lastEduId = lastEduCard.attr("id");
    var lastEduNumber = lastEduId.replace("card-education", "");

    let eduCount = lastEduNumber - 1;

    $("#add_education").click(function (e) {
        e.preventDefault();

        eduCount++;
        var currentDate = new Date().toISOString().split('T')[0];
        var html = `<input type="hidden" id="edu_id" name="edu_id[${eduCount}]" class="form-control" value="new" />
        <div class="card mb-4">
        <div class="card-body" id="card-education${eduCount + 1}">
            <span onclick="return confirm('Are you sure you want to delete?') && remove_section(this)"
                class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i
                    class="fa fa-close"></i></span>
            <div class="row mb-0">
                <div class="col-sm-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold text-secondary">School Name*</label>
                                <input type="text" id="school_name" name="school_name[${eduCount}]"
                                    placeholder="School Name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold text-secondary">Qualification*</label>
                                <input type="text" id="qualification" name="qualification[${eduCount}]" class="form-control"
                                    placeholder="Qualification" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label class="form-label fw-bold text-secondary">Field of Study</label>
                                <input type="text" id="field_of_study" name="field_of_study[${eduCount}]"
                                    class="form-control" placeholder="Field of Study" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold text-secondary">Study Start Date*</label>
                                <input type="date" id="study_start_date" name="study_start_date[${eduCount}]"
                                    class="form-control" placeholder="Study Start Date" max="${currentDate}" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label class="form-label fw-bold text-secondary">Study End Date*</label>
                                <input type="date" id="study_end_date" name="study_end_date[${eduCount}]"
                                    class="form-control" placeholder="Study End Date" max="${currentDate}" required />
                            </div>
                        </div>
    
                    </div>
                </div>
    
            </div>
        </div>
    </div>`;

        $(".education_section").append(html);

    });

    var lastWorkCard = $("[id^='card-education']").last();
    var lastWorkId = lastWorkCard.attr("id");
    var lastWorkNumber = lastWorkId.replace("card-education", "");

    let workCount = lastWorkNumber - 1;

    $("#add_work_experience").click(function (e) {
        e.preventDefault();
        workCount++;

        var currentDate = new Date().toISOString().split('T')[0];
        var html = `<input type="hidden" id="work_id" name="work_id[${workCount}]" class="form-control" value="new" />
        <div class="card mb-4">
        <div class="card-body" id="card-work${workCount + 1}">
            <span onclick="return confirm('Are you sure you want to delete?') && remove_section(this)"            class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end px-4 mx-2 pb-2 pt-3 mt-3">
                                        <div class="form-check">
                                        <input type="hidden" name="job_current[${workCount}]" value="0">
                                        <input class="form-check-input job-current-checkbox${workCount + 1}" type="checkbox" value="1" id="job_current${workCount + 1}" name="job_current[${workCount}]">
                                        <label class="form-check-label" for="job_current">
                                            I currently work here
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Job Title*</label>
                                            <input type="text" id="job_title" name="job_title[${workCount}]" placeholder="Job Title" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Company Name*</label>
                                            <input type="text" id="company_name" name="company_name[${workCount}]" class="form-control" placeholder="Company Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold text-secondary">Job Start Date*</label>
                                            <input type="date" id="job_start_date" name="job_start_date[${workCount}]" class="form-control" placeholder="Job Start Date" max="${currentDate}" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <label class="form-label fw-bold text-secondary">Job End Date*</label>
                                            <input type="date" id="job_end_date${workCount + 1}" name="job_end_date[${workCount}]" class="form-control job-end-date-input${workCount + 1}" placeholder="Job End Date" max="${currentDate}" required />
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold text-secondary">Job
                                            Description</label>
                                        <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[${workCount}]" rows="4"></textarea>
                                    </div>

                                </div>
                            </div>
        </div>
        </div>`;

        $(".work_experience_section").append(html);

    });
});

$("[id^='job_current']").each(function () {
    var id = $(this).attr("id");
    var index = id.replace("job_current", "");
    var dateEndInput = $("#job_end_date" + index);

    if ($(this).is(":checked")) {
        dateEndInput.prop("required", false);
        dateEndInput.prop("disabled", true);
    } else {
        dateEndInput.prop("required", true);
        dateEndInput.prop("disabled", false);
    }
});
$(document).on("change", "[id^='job_current']", function () {
    var id = $(this).attr("id");
    var index = id.replace("job_current", ""); // Extract the number from the id
    console.log(index);
    var dateEndInput = $("#job_end_date" + index);

    if ($(this).is(":checked")) {
        dateEndInput.prop("required", false);
        dateEndInput.prop("disabled", true);
    } else {
        dateEndInput.prop("required", true);
        dateEndInput.prop("disabled", false);
    }
});

function remove_section(element) {
    $(element).closest(".card").remove();
}