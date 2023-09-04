<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use App\Models\EducationDetails;
use App\Models\WorkExperienceDetails;
use App\Http\Requests\resumeRulesRequest;

use Illuminate\Support\Str;


class ResumeDetailsController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }

    public function create()
    {
        return view('resume.create');
    }

    public function store(resumeRulesRequest $request)
    {
        $user_id = auth()->id();

        //save personal details
        $details = new PersonalDetails();
        $details->first_name = $request->first_name;
        $details->last_name = $request->last_name;
        $details->phone = $request->phone;
        $details->email = $request->email;
        $details->address = $request->address;
        $details->user_id = $user_id;

        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT); //generate 4 random number

        $details->resume_link = $randomNumber . '-' . Str::slug($request->input('first_name')) . '-' . Str::slug($request->input('last_name'));

        if ($request->file('profile_image')) {
            $profile_image = !empty($request->file('profile_image')) ? $request->file('profile_image')->getClientOriginalName() : '';
            $profile_image = $randomNumber . '_' . $profile_image;
            $request->file('profile_image')->move(public_path('assets/images/'), $profile_image);
        }
        $details->profile_image = isset($profile_image) && !empty($profile_image) ? $profile_image : '';
        $details->save();

        //save education details
        // $edu_count = count($request->qualification);
        $edu_count = array_key_last($request->qualification);

        for ($i = 0; $i <= $edu_count; $i++) {
            if (array_key_exists($i, $request->qualification)) {
                $edu_info = new EducationDetails();
                $edu_info->user_id = $user_id;
                $edu_info->school_name = $request->school_name[$i];
                $edu_info->qualification = $request->qualification[$i];
                $edu_info->field_of_study = $request->field_of_study[$i] ?? ' ';
                $edu_info->study_start_date = $request->study_start_date[$i];
                $edu_info->study_end_date = $request->study_end_date[$i];
                $edu_info->save();
            }
        }

        //save work experience details
        // $exp_count = count($request->job_title);
        $exp_count = array_key_last($request->job_title);
        for ($i = 0; $i <= $exp_count; $i++) {
            if (array_key_exists($i, $request->job_title)) {
                $work_info = new WorkExperienceDetails();
                $work_info->user_id = $user_id;
                $work_info->job_title = $request->job_title[$i];
                $work_info->company_name = $request->company_name[$i];
                $work_info->job_start_date = $request->job_start_date[$i];
                $work_info->job_end_date = $request->job_end_date[$i] ?? now();
                $work_info->job_description = $request->job_description[$i] ?? ' ';
                $work_info->job_current = $request->job_current[$i] ?? 0;
                $work_info->save();
            }
        }

        return redirect()->route('home')->with('success', 'You have successfully create your resume :D');
    }

    public function edit($user_id)
    {
        if (!empty($user_id)) {
            $resume_info['personal_info'] = PersonalDetails::where('user_id', $user_id)->firstOrFail()->toArray();
            $resume_info['edu_info'] = EducationDetails::where('user_id', $user_id)->get()->toArray();
            $resume_info['work_info'] = WorkExperienceDetails::where('user_id', $user_id)->get()->toArray();

            return view('resume.edit', ['resume_info' => $resume_info]);
        } else {
            return redirect()->back()->withErrors('Error, please try again');
        }
    }

    public function update(resumeRulesRequest $request)
    {
        $user_id = auth()->id();

        // update personal information
        $details = PersonalDetails::where('user_id', $user_id);
        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT); //generate 4 random number
        if ($request->file('profile_image')) {
            $profile_image = !empty($request->file('profile_image')) ? $request->file('profile_image')->getClientOriginalName() : '';
            $profile_image = $randomNumber . '_' . $profile_image;
            $request->file('profile_image')->move(public_path('assets/images/'), $profile_image);
        }
        $details->profile_image = isset($profile_image) && !empty($profile_image) ? $profile_image : '';

        $details->update(
            $request->only(['first_name', 'last_name', 'phone', 'email', 'address']) + ['profile_image' => $details->profile_image]
        );

        // update education information
        $edu_count = array_key_last($request->edu_id);

        for ($i = 0; $i <= $edu_count; $i++) {
            if (array_key_exists($i, $request->edu_id)) {
                if ($request->edu_id[$i] === "new") {
                    $edu_info = new EducationDetails();
                    $edu_info->user_id = $user_id;
                    $edu_info->school_name = $request->school_name[$i];
                    $edu_info->qualification = $request->qualification[$i];
                    $edu_info->field_of_study = $request->field_of_study[$i] ?? ' ';
                    $edu_info->study_start_date = $request->study_start_date[$i];
                    $edu_info->study_end_date = $request->study_end_date[$i];
                    $edu_info->save();
                } else {
                    $edu_details = EducationDetails::where('user_id', $user_id)->where('id', $request->edu_id[$i]);
                    if ($edu_details && isset($request->school_name[$i])) {
                        $edu_details->update([
                            'school_name' => $request->school_name[$i],
                            'qualification' => $request->qualification[$i],
                            'field_of_study' => $request->field_of_study[$i] ?? '',
                            'study_start_date' => $request->study_start_date[$i],
                            'study_end_date' => $request->study_end_date[$i],
                        ]);
                    } else {
                        EducationDetails::find($request->edu_id[$i])->delete();
                    }
                }
            }
        }

        // update work information
        $work_count = array_key_last($request->work_id);
        for ($i = 0; $i <= $work_count; $i++) {
            if (array_key_exists($i, $request->work_id)) {
                if ($request->work_id[$i] === "new") {
                    $work_info = new WorkExperienceDetails();
                    $work_info->user_id = $user_id;
                    $work_info->job_title = $request->job_title[$i];
                    $work_info->company_name = $request->company_name[$i];
                    $work_info->job_start_date = $request->job_start_date[$i];
                    $work_info->job_end_date = $request->job_end_date[$i] ?? now();
                    $work_info->job_description = $request->job_description[$i] ?? ' ';
                    $work_info->job_current = $request->job_current[$i] ?? 0;
                    $work_info->save();
                } else {
                    $work_details = WorkExperienceDetails::where('user_id', $user_id)->where('id', $request->work_id[$i]);
                    if ($work_details && isset($request->job_title[$i])) {
                        $work_details->update([
                            'job_title' => $request->job_title[$i],
                            'company_name' => $request->company_name[$i],
                            'job_start_date' => $request->job_start_date[$i] ?? '',
                            'job_end_date' => $request->job_end_date[$i] ?? now(),
                            'job_description' => $request->job_description[$i] ?? ' ',
                            'job_current' => $request->job_current[$i],
                        ]);
                    } else {
                        WorkExperienceDetails::find($request->work_id[$i])->delete();
                    }
                }
            } 
        }

        return redirect()->route('home')->with('success', 'You have successfully updated your resume :D');
    }

    public function destroy($user_id)
    {
        if (!empty($user_id)) {
            PersonalDetails::where('user_id', $user_id)->delete();
            EducationDetails::where('user_id', $user_id)->delete();
            WorkExperienceDetails::where('user_id', $user_id)->delete();

            return redirect()->route('home')->withSuccess("Your Resume has been deleted successfully");
        } else {
            return redirect()->back()->withErrors("Error, please try again");
        }
    }

    public function show($resumeLink)
    {
        $resume = PersonalDetails::where('resume_link', $resumeLink)->first();

        if (!$resume) {
            abort(404);
        } else {
            $resume_info['personal_info'] = PersonalDetails::where('user_id', $resume->user_id)->firstOrFail()->toArray();
            $resume_info['edu_info'] = EducationDetails::where('user_id', $resume->user_id)->orderBy('study_end_date', 'desc')->get()->toArray();
            $resume_info['work_info'] = WorkExperienceDetails::where('user_id', $resume->user_id)->orderBy('job_end_date', 'desc')->get()->toArray();

            return view('resume.view', ['resume' => $resume_info]);
        }
    }

}
