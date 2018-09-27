<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;



class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $cat = DB::table('settings')->select(
              'settings.*'
              )
              ->where('id', 1)
              ->first();


        $data['objs'] = $cat;

        $data['method'] = "post";
        $data['url'] = url('admin/setting/update');
        $data['datahead'] = "ตั้งค่าเว็บไซต์";
        return view('admin3.setting.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $image = $request->file('image');

        $image_logo = $request->file('image_logo');
        $id = 1;
        $this->validate($request, [
             'phone' => 'required',
             'fax' => 'required',
             'website' => 'required',
             'email' => 'required',
             'compony' => 'required',
             'address' => 'required',
             'title_company' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'fb_title' => 'required',
             'fb_detail' => 'required'
         ]);

         if($image == null && $image_logo == null){

           $package = setting::find($id);
           $package->phone = $request['phone'];
           $package->fax = $request['fax'];
           $package->website = $request['website'];
           $package->email = $request['email'];
           $package->compony = $request['compony'];
           $package->address = $request['address'];
           $package->title_company = $request['title_company'];
           $package->lat = $request['lat'];
           $package->lng = $request['lng'];
           $package->fb_title = $request['fb_title'];
           $package->fb_detail = $request['fb_detail'];
           $package->save();

         }elseif($image != null && $image_logo == null){

           $objs = DB::table('settings')
           ->select(
              'settings.*'
              )
           ->where('id', 1)
           ->first();

           $file_path = 'assets/category_img/'.$objs->facebook_img;
           unlink($file_path);


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
             $img = Image::make($image->getRealPath());
             $img->resize(600, 314, function ($constraint) {
             $constraint->aspectRatio();
           })->save('assets/category_img/'.$input['imagename']);



           $package = setting::find($id);
           $package->phone = $request['phone'];
           $package->fax = $request['fax'];
           $package->website = $request['website'];
           $package->email = $request['email'];
           $package->compony = $request['compony'];
           $package->address = $request['address'];
           $package->title_company = $request['title_company'];
           $package->lat = $request['lat'];
           $package->lng = $request['lng'];
           $package->fb_title = $request['fb_title'];
           $package->fb_detail = $request['fb_detail'];
           $package->facebook_img = $input['imagename'];
           $package->save();

         }elseif($image == null && $image_logo != null){





           $input['logo_website'] = time().'.'.$image_logo->getClientOriginalExtension();
             $img = Image::make($image_logo->getRealPath());
             $img->save('assets/image/logo_website/'.$input['logo_website']);

           $package = setting::find($id);
           $package->phone = $request['phone'];
           $package->fax = $request['fax'];
           $package->website = $request['website'];
           $package->email = $request['email'];
           $package->compony = $request['compony'];
           $package->address = $request['address'];
           $package->title_company = $request['title_company'];
           $package->lat = $request['lat'];
           $package->lng = $request['lng'];
           $package->fb_title = $request['fb_title'];
           $package->fb_detail = $request['fb_detail'];
           $package->logo_img = $input['logo_website'];
           $package->save();

         }else{


           $objs = DB::table('settings')
           ->select(
              'settings.*'
              )
           ->where('id', 1)
           ->first();

           $file_path = 'assets/category_img/'.$objs->facebook_img;
           unlink($file_path);


           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
             $img = Image::make($image->getRealPath());
             $img->resize(600, 314, function ($constraint) {
             $constraint->aspectRatio();
           })->save('assets/category_img/'.$input['imagename']);

           $input['logo_website'] = time().'.'.$image_logo->getClientOriginalExtension();
             $img = Image::make($image_logo->getRealPath());
             $img->save('assets/image/logo_website/'.$input['logo_website']);

           $package = setting::find($id);
           $package->phone = $request['phone'];
           $package->fax = $request['fax'];
           $package->website = $request['website'];
           $package->email = $request['email'];
           $package->compony = $request['compony'];
           $package->address = $request['address'];
           $package->title_company = $request['title_company'];
           $package->lat = $request['lat'];
           $package->lng = $request['lng'];
           $package->fb_title = $request['fb_title'];
           $package->fb_detail = $request['fb_detail'];
           $package->facebook_img = $input['imagename'];
           $package->logo_img = $input['logo_website'];
           $package->save();

         }



        // dd($package);

         return redirect(url('admin/setting'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
