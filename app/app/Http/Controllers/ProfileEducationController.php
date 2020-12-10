<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\ProfileEducation;

class ProfileEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile_educations = ProfileEducation::all();

        return response($profile_educations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profile_education  = new ProfileEducation();

        $profile_education->profile_id = $request->input('profile_id');
        $profile_education->school_name = $request->input('school_name');
        $profile_education->prodi_name = $request->input('prodi_name');
        $profile_education->jenjang = $request->input('jenjang');
        $profile_education->nilai = $request->input('nilai');
        $profile_education->year_start = $request->input('year_start');
        $profile_education->year_end = $request->input('year_end');
        $profile_education->school_address = $request->input('school_address');
        $profile_education->description = $request->input('description');
       
       	$profile_education->save();
    
        return response('Berhasil Tambah Data');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = ProfileEducation::where('profile_id',$id)->orderBy('year_start', 'desc')->get();

        $result=array(
                "profile_educations"  => $model,
        );

        return response($result);
    }

    public function showId($id)
    {
        $model = ProfileEducation::where('id',$id)->get();

        $result=array(
                "profile_educations"  => $model,
        );

        return response($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile_education = ProfileEducation::where('id',$id)->first();

        $profile_education->profile_id = $request->input('profile_id');
        $profile_education->school_name = $request->input('school_name');
        $profile_education->prodi_name = $request->input('prodi_name');
        $profile_education->jenjang = $request->input('jenjang');
        $profile_education->nilai = $request->input('nilai');
        $profile_education->year_start = $request->input('year_start');
        $profile_education->year_end = $request->input('year_end');
        $profile_education->school_address = $request->input('school_address');
        $profile_education->description = $request->input('description');

        $profile_education->save();
           
        return response('Berhasil Merubah Data');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile_education = ProfileEducation::where('id',$id)->first();
        $profile_education->delete();
    
        return response('Berhasil Menghapus Data');
    }
}
