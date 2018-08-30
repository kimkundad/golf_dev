<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\tech;
use App\skill;
use App\tech_skill;
use App\cat_tech;
use App\tech_gallery;
use App\province_th;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count_tech = DB::table('teches')->select(
              'teches.*'
              )
              ->count();


        $cat = DB::table('teches')->select(
              'teches.*',
              'province_ths.*',
              'teches.id as id_te'
              )
              ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
              ->paginate(12);

          foreach ($cat as $obj) {

            $option = DB::table('cat_teches')->select(
                  'cat_teches.*',
                  'categories.*'
                  )
                  ->leftjoin('categories', 'categories.id',  'cat_teches.cat_id')
                  ->where('cat_teches.tech_id', $obj->id)
                  ->get();

            $obj->options = $option;

          }
          //
          $data['datahead'] = "ช่างในระบบ";
          $data['count_tech'] = $count_tech;
          $data['objs'] = $cat;
          return view('admin2.tech.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $category = category::all();
        $data['category'] = $category;
        $province_th = province_th::all();
        $data['province_th'] = $province_th;
        $skill = skill::all();
        $data['skill'] = $skill;
        $data['method'] = "post";
        $data['url'] = url('admin/tech_list');
        $data['datahead'] = "เพิ่มช่างในระบบ ";
        return view('admin2.tech.create', $data);
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

        $image = $request->file('image');
        $this->validate($request, [
             'image' => 'required|max:8048',
             'tech_fname' => 'required',
             'tech_lname' => 'required',
             'tech_email' => 'required',
             'tech_phone' => 'required',
             'tumbon' => 'required',
             'district' => 'required',
             'province_id' => 'required',
             'zip_code' => 'required',
             'tech_detail' => 'required',
             'tech_rating' => 'required',
             'category' => 'required',
             'option' => 'required'
         ]);

        $detail=$request->tech_project;
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/assets/tech_img/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }

        $detail = $dom->savehtml();

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/tech_img/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 533, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/tech_img/'.$input['imagename']);

       $package = new tech();
       $package->tech_fname = $request['tech_fname'];
       $package->tech_lname = $request['tech_lname'];
       $package->tech_phone = $request['tech_phone'];
       $package->tech_email = $request['tech_email'];
       $package->tech_image = $input['imagename'];
       $package->tumbon = $request['tumbon'];
       $package->district = $request['district'];
       $package->province_id = $request['province_id'];
       $package->zip_code = $request['zip_code'];
       $package->tech_detail = $request['tech_detail'];
       $package->tech_project = $detail;
       $package->tech_rating = $request['tech_rating'];
       $package->save();

       $the_id = $package->id;

       $option = $request['option'];
       if (sizeof($option) > 0) {
          for ($i = 0; $i < sizeof($option); $i++) {
            $admins[] = [
                'skill_id' => $option[$i],
                'tech_id' => $the_id
            ];
          }
          tech_skill::insert($admins);
        }

        $category = $request['category'];

        if (sizeof($category) > 0) {
           for ($i = 0; $i < sizeof($category); $i++) {
             $admin[] = [
                 'cat_id' => $category[$i],
                 'tech_id' => $the_id
             ];
           }
           cat_tech::insert($admin);
         }


         return redirect(url('admin/tech_gallery/'.$the_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function tech_gallery($id){
      $data['id'] = $id;
      $data['datahead'] = "เพิ่มรูปประกอบสินค้า";
      return view('admin2.tech.tech_gallery', $data);
    }


    public function add_gallery(Request $request){


      $gallary = $request->file('product_image');
        $this->validate($request, [
             'product_image' => 'required|max:8048',
             'pro_id' => 'required'
         ]);

         if (sizeof($gallary) > 0) {
          for ($i = 0; $i < sizeof($gallary); $i++) {
            $path = 'assets/tech_img/';
            $filename = time()."-".$gallary[$i]->getClientOriginalName();
            $gallary[$i]->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'tech_id' => $request['pro_id']
            ];
          }
          tech_gallery::insert($admins);
        }

        return redirect(url('admin/tech/'.$request['pro_id'].'/edit'))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

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

      $img_all = DB::table('tech_galleries')->select(
            'tech_galleries.*'
            )
            ->where('tech_id', $id)
            ->get();

            $data['img_al'] = $img_all;

            $skill = skill::all();

            foreach ($skill as $obj) {

              $options = DB::table('tech_skills')->select(
                  'tech_skills.*'
                  )
                  ->where('tech_id', $id)
                  ->where('skill_id', $obj->id)
                  ->count();

              $obj->options = $options;

            }

            $cat = DB::table('teches')->select(
                  'teches.*',
                  'province_ths.*',
                  'teches.id as id_te'
                  )
                  ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
                  ->where('teches.id', $id)
                  ->first();
        //
        $category = category::all();

        foreach ($category as $obj1) {

          $options = DB::table('cat_teches')->select(
              'cat_teches.*'
              )
              ->where('tech_id', $id)
              ->where('cat_id', $obj1->id)
              ->count();

          $obj1->options = $options;

        }

        $data['category'] = $category;
        $province_th = province_th::all();
        $data['province_th'] = $province_th;
        $data['objs'] = $cat;
        $data['skill'] = $skill;
        $data['method'] = "put";
        $data['url'] = url('admin/tech_list/'.$id);
        $data['datahead'] = "แก้ไขช่างในระบบ ";
        return view('admin2.tech.edit', $data);

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
        //
        $image = $request->file('image');
        $this->validate($request, [
             'tech_fname' => 'required',
             'tech_lname' => 'required',
             'tech_email' => 'required',
             'tech_phone' => 'required',
             'tumbon' => 'required',
             'district' => 'required',
             'province_id' => 'required',
             'zip_code' => 'required',
             'tech_detail' => 'required',
             'tech_rating' => 'required',
             'category' => 'required',
             'option' => 'required'
         ]);


         $detail=$request->tech_project;
         $dom = new \domdocument();
         $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

         $images = $dom->getelementsbytagname('img');
         //dd(sizeof($images));
         if (sizeof($images) > 1) {
         foreach($images as $k => $img){
             $data = $img->getattribute('src');

             list($type, $data) = explode(';', $data);
             list(, $data)      = explode(',', $data);

             $data = base64_decode($data);
             $image_name= time().$k.'.png';
             $path = '/assets/tech_img/'. $image_name;

             file_put_contents($path, $data);

             $img->removeattribute('src');
             $img->setattribute('src', $path);
         }
       }

         $detail = $dom->savehtml();

        if($image == null){

          $package = tech::find($id);
          $package->tech_fname = $request['tech_fname'];
          $package->tech_lname = $request['tech_lname'];
          $package->tech_phone = $request['tech_phone'];
          $package->tech_email = $request['tech_email'];
          $package->tumbon = $request['tumbon'];
          $package->district = $request['district'];
          $package->province_id = $request['province_id'];
          $package->zip_code = $request['zip_code'];
          $package->tech_detail = $request['tech_detail'];
          $package->tech_project = $detail;
          $package->tech_rating = $request['tech_rating'];
          $package->save();

        }else{

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/tech_img/');
          $img = Image::make($image->getRealPath());
          $img->resize(800, 533, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/tech_img/'.$input['imagename']);

          $package = tech::find($id);
          $package->tech_fname = $request['tech_fname'];
          $package->tech_lname = $request['tech_lname'];
          $package->tech_phone = $request['tech_phone'];
          $package->tech_email = $request['tech_email'];
          $package->tech_image = $input['imagename'];
          $package->tumbon = $request['tumbon'];
          $package->district = $request['district'];
          $package->province_id = $request['province_id'];
          $package->zip_code = $request['zip_code'];
          $package->tech_detail = $request['tech_detail'];
          $package->tech_project = $detail;
          $package->tech_rating = $request['tech_rating'];
          $package->save();

        }

        return redirect(url('admin/tech_list/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
