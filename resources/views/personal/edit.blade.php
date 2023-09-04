{{-- Personal Information --}}
                    <div class="card p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="fw-bold text-secondary">Personal Information</h2>
                                <div class="row mb-0">
                                    <div class="col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label fw-bold text-secondary">First
                                                        name*</label>
                                                    <input type="text" id="first_name" name="first_name" placeholder="First name" class="form-control" value="{{ $resume_info['personal_info']['first_name'] }}" required />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-outline">
                                                    <label class="form-label fw-bold text-secondary">Last
                                                        name*</label>
                                                    <input type="text" id="last_name" name="last_name" placeholder="Last name" class="form-control" value="{{ $resume_info['personal_info']['last_name'] }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label fw-bold text-secondary">Email*</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $resume_info['personal_info']['email']}}"  required />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-outline">
                                                    <label class="form-label fw-bold text-secondary">Phone Number*</label>
                                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="{{ $resume_info['personal_info']['phone']}}"  required />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-outline">
                                                    <label class="form-label fw-bold text-secondary">Address*</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{ $resume_info['personal_info']['address']}}"  required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="profile_picture text-center">
                                            <label class="form-label fw-bold text-secondary">Profile Picture <br><small class="text-body-secondary">(Click the photo to upload your profile picture)</small></label>
                                            <br>
                                            <input type="file" name="profile_image" accept="image/png, image/jpeg, image/jpg" onchange="display_image(this);" class="d-none upload-box-image">
                                            <img class="box-image-preview img-fluid img-circle elevation-2" src="{{ isset($resume_info['personal_info']['profile_image']) && !empty($resume_info['personal_info']['profile_image']) ? asset('assets/images/' . $resume_info['personal_info']['profile_image']) : asset('assets/images/user-thumb.jpg') }}" alt="Profile picture" onclick="$(this).closest('.profile_picture').find('input').click();" style="height:150px; width:150px;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>