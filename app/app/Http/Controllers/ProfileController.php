<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();

        return response($profiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profile  = new Profile();

        $profile->user_id = $request->input('user_id');
        $profile->gender = $request->input('gender');
        $profile->religion = $request->input('religion');
        $profile->maritalstatus = $request->input('maritalstatus');
        $profile->id_type = $request->input('id_type');
        $profile->id_number = $request->input('id_number');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->weight = $request->input('weight');
        $profile->height = $request->input('height');
        $profile->address = $request->input('address');
        $profile->country_id = $request->input('country_id');
        $profile->province_id = $request->input('province_id');
        $profile->province_name = $request->input('province_name');
        $profile->city_id = $request->input('city_id');
        $profile->city_name = $request->input('city_name');
        $profile->dob = $request->input('dob');
        $profile->pob = $request->input('pob');
        $profile->jobtitle = $request->input('jobtitle');
        $profile->bio = $request->input('bio');

        if ($request->hasFile('photo')) {
            $avatar = Str::random(34);
            // $avatar = $request->photo->getClientOriginalName();
            // $profile->photo = $request->file('photo')->move(('avatar'), $avatar);

            $image = Image::make($request->file('photo'));
                
            $image->resize(128, 128)->save('avatar/'. $avatar);

            $profile->photo = 'avatar/' . $avatar;
        }
       
       	$profile->save();
    
        return response('Berhasil Tambah Data');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $model = Profile::where('user_id',\Auth::user()->id)->get();

        $result=array(
                "profiles"  => $model,
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
        $profile = Profile::where('id',$id)->first();

        $profile->user_id = $request->input('user_id');
        $profile->gender = $request->input('gender');
        $profile->religion = $request->input('religion');
        $profile->maritalstatus = $request->input('maritalstatus');
        $profile->id_type = $request->input('id_type');
        $profile->id_number = $request->input('id_number');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->weight = $request->input('weight');
        $profile->height = $request->input('height');
        $profile->address = $request->input('address');
        $profile->country_id = $request->input('country_id');
        $profile->province_id = $request->input('province_id');
        $profile->province_name = $request->input('province_name');
        $profile->city_id = $request->input('city_id');
        $profile->city_name = $request->input('city_name');
        $profile->dob = $request->input('dob');
        $profile->pob = $request->input('pob');
        $profile->jobtitle = $request->input('jobtitle');
        $profile->bio = $request->input('bio');

        if ($request->hasFile('photo')) {
            $avatar = Str::random(34);
            // $avatar = $request->photo->getClientOriginalName();
            // $profile->photo = $request->file('photo')->move(('avatar'), $avatar);

            $image = Image::make($request->file('photo'));
                
            $image->resize(128, 128)->save('avatar/'. $avatar);

            $profile->photo = 'avatar/' . $avatar;
        }
       
        $profile->save();
           
        return response('Berhasil Merubah Data');
   
    }

    public function get_avatar($name)
    {
        $avatar_path = ('avatar') . '/' . $name;
        if (file_exists($avatar_path)) {
        $file = file_get_contents($avatar_path);
        return response($file, 200);
        }
        $res['success'] = false;
        $res['message'] = "Avatar not found";
        
        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
