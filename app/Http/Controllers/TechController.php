<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\tech;
use App\skill;
use App\tech_skill;
use App\cat_tech;
use App\text_to_tech;
use App\tech_gallery;
use Validator;
use Response;
use Redirect;
use App\province_th;
use App\tech_job_img;
use App\tech_job;
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
              ->paginate(15);

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
          return view('admin3.tech.index', $data);
    }



    public function new_tech()
    {
        //
        $count_tech = DB::table('teches')->select(
              'teches.*'
              )
              ->where('teches.tech_status', 0)
              ->count();


        $cat = DB::table('teches')->select(
              'teches.*',
              'province_ths.*',
              'teches.id as id_te'
              )
              ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
              ->where('teches.tech_status', 0)
              ->paginate(15);

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
          return view('admin3.tech.new_tech', $data);
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
        return view('admin3.tech.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function api_tech_status(Request $request){

      $user = tech::findOrFail($request->user_id);

              if($user->tech_status == 1){
                  $user->tech_status = 0;
              } else {
                  $user->tech_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

    }


    public function tech_search(Request $request){

      $this->validate($request, [
        'search' => 'required'
      ]);

      $search = $request->get('search');

      $count_tech = DB::table('teches')
                      ->select(
                      'teches.*',
                      'teches.id as id_te',
                      'province_ths.*'
                      )
                      ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
                      ->where('teches.tech_fname', 'like', "%$search%")
                      ->orWhere('province_ths.province_name', 'like', "%$search%")
                      ->count();

                  //    dd($count_tech);

      if($count_tech > 0){

        $cat = DB::table('teches')
                        ->select(
                        'teches.*',
                        'teches.id as id_te',
                        'province_ths.*'
                        )
                        ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
                        ->where('teches.tech_fname', 'like', "%$search%")
                        ->orWhere('province_ths.province_name', 'like', "%$search%")
                        ->get();

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

                        $data['objs'] = $cat;

      }else{


        $cat_count = DB::table('categories')->select(
              'categories.*'
              )
              ->where('categories.name_cat', 'like', "%$search%")
              ->count();


        if($cat_count > 0){




                $cat_2 = DB::table('categories')->select(
                      'categories.*'
                      )
                      ->where('categories.name_cat', 'like', "%$search%")
                      ->first();


                        $option_t = DB::table('cat_teches')->select(
                              'cat_teches.*',
                              'categories.*'
                              )
                              ->leftjoin('categories', 'categories.id',  'cat_teches.cat_id')
                              ->where('categories.id', $cat_2->id)
                              ->get();


                          //    dd($option_t);

                            $option_z = [];

                              foreach ($option_t as $u) {


                                $cat_z = DB::table('teches')
                                                ->select(
                                                'teches.*',
                                                'teches.id as id_te',
                                                'province_ths.*'
                                                )
                                                ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
                                                ->where('teches.id', $u->tech_id)
                                                ->first();

                                    $option_z[] = $cat_z;


                              }

                              $option_t->options = $option_z;

                          //    dd($option_z);



                              $data['objs'] = $option_z;

        }else{


          $data['objs'] = null;

        }










      // dd($option);

      }

                      $data['count_tech'] = $count_tech;
                      $data['datahead'] = "ช่างในระบบ";
                      $data['search'] = $search;





                      return view('admin3.tech.search', $data);

    }



    public function store(Request $request)
    {
        //

        $image = $request->file('image');
        $this->validate($request, [
             'image' => 'required|max:8048',
             'tech_fname' => 'required',
             'tech_lname' => 'required',
             'tech_phone' => 'required',
             'tech_show' => 'required',
             'province_id' => 'required',
             'tech_detail' => 'required',
             'tech_rating' => 'required',
             'category' => 'required',
             'option' => 'required'
         ]);




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
       $package->tech_sex = $request['tech_sex'];
       $package->province_id = $request['province_id'];
       $package->tech_detail = $request['tech_detail'];
       $package->tech_rating = $request['tech_rating'];
       $package->tech_status_show = $request['tech_show'];
       $package->lat = $request['lat'];
       $package->lng = $request['lng'];
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


         return redirect(url('admin/tech_list/'.$the_id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function tech_gallery($id){

      $proocess = 0;
      $img_count = DB::table('tech_galleries')->select(
            'tech_galleries.*'
            )
            ->where('tech_id', $id)
            ->count();

            $job_count = DB::table('tech_jobs')->select(
                  'tech_jobs.*'
                  )
                  ->where('tech_id', $id)
                  ->count();

            $data['img_count'] = $img_count;
            $data['job_count'] = $job_count;

            if($img_count > 0){
              $proocess += 33;
            }
            if($job_count > 0){
              $proocess = 100;
            }

            $success = 0;
            if($proocess > 70){
              $success = 1;
            }else{
              $success = 0;
            }
            $data['success'] = $success;

            $data['proocess'] = $proocess;


            $img_all = DB::table('tech_galleries')->select(
                  'tech_galleries.*'
                  )
                  ->where('tech_id', $id)
                  ->get();
      $data['img_all'] = $img_all;
      //dd($img_all);
      $data['id'] = $id;
      $data['datahead'] = "เพิ่มรูปประกอบ";
      return view('admin2.tech.tech_gallery', $data);
    }


    public function tech_image_del(Request $request){

      $gallary = $request->get('product_image');
      $pro_id = $request['pro_id'];

      if (sizeof($gallary) > 0) {

       for ($i = 0; $i < sizeof($gallary); $i++) {

         $objs = DB::table('tech_galleries')
           ->where('id', $gallary[$i])
           ->first();

           $file_path = 'assets/tech_img/'.$objs->image;
           unlink($file_path);

           DB::table('tech_galleries')->where('id', $objs->id)->delete();

       }


      }
      //dd($objs);
      return redirect(url('admin/tech_list/'.$pro_id))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

      }

      public function job_image_del(Request $request){

        $gallary = $request->get('product_image');
        $pro_id = $request['pro_id'];

        if (sizeof($gallary) > 0) {

         for ($i = 0; $i < sizeof($gallary); $i++) {

           $objs = DB::table('tech_job_imgs')
             ->where('id', $gallary[$i])
             ->first();

             $file_path = 'assets/job_img/'.$objs->image;
             unlink($file_path);

             DB::table('tech_job_imgs')->where('id', $objs->id)->delete();

         }


        }
        //dd($objs);
        return redirect(url('admin/edit_job/'.$pro_id))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

      }


      public function del_job_tech(Request $request){
        $id_job = $request['id_job'];
        $id_tech = $request['id_tech'];

      //  dd($id_tech);

        $job_all = DB::table('tech_jobs')->select(
              'tech_jobs.*'
              )
              ->where('id', $id_job)
              ->first();

              $job_img = DB::table('tech_job_imgs')->select(
                    'tech_job_imgs.*'
                    )
                    ->where('job_id', $id_job)
                    ->get();

                    foreach($job_img as $u){

                      $file_path = 'assets/job_img/'.$u->image;
                      unlink($file_path);
                      DB::table('tech_job_imgs')->where('id', $u->id)->delete();
                    }
        DB::table('tech_jobs')->where('id', $id_job)->delete();

        return redirect(url('admin/tech_job/'.$id_tech))->with('del_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');
      }


    public function tech_job($id){

      $proocess = 0;
      $img_count = DB::table('tech_galleries')->select(
            'tech_galleries.*'
            )
            ->where('tech_id', $id)
            ->count();

            $job_count = DB::table('tech_jobs')->select(
                  'tech_jobs.*'
                  )
                  ->where('tech_id', $id)
                  ->count();

            $data['img_count'] = $img_count;
            $data['job_count'] = $job_count;

            if($img_count > 0){
              $proocess += 33;
            }
            if($job_count > 0){
              $proocess = 100;
            }

            $success = 0;
            if($proocess > 70){
              $success = 1;
            }else{
              $success = 0;
            }
            $data['success'] = $success;

            $data['proocess'] = $proocess;

            $job_all = DB::table('tech_jobs')->select(
                  'tech_jobs.*'
                  )
                  ->where('tech_id', $id)
                  ->get();

                  foreach ($job_all as $u) {

                    $job_img = DB::table('tech_job_imgs')->select(
                          'tech_job_imgs.*'
                          )
                          ->where('job_id', $u->id)
                          ->get();

                        $u->img = $job_img;
                    // code...
                  }

                //  dd($job_all);

            $data['job_all'] = $job_all;

      $data['id'] = $id;
      $data['datahead'] = "เพิ่มผลงานของช่าง";
      return view('admin2.tech.tech_job', $data);
    }


    public function edit_job($id){

      $job_all = DB::table('tech_jobs')->select(
            'tech_jobs.*'
            )
            ->where('id', $id)
            ->first();


      $proocess = 0;
      $img_count = DB::table('tech_galleries')->select(
            'tech_galleries.*'
            )
            ->where('tech_id', $job_all->tech_id)
            ->count();

            $job_count = DB::table('tech_jobs')->select(
                  'tech_jobs.*'
                  )
                  ->where('tech_id', $job_all->tech_id)
                  ->count();

            $data['img_count'] = $img_count;
            $data['job_count'] = $job_count;

            if($img_count > 0){
              $proocess += 33;
            }
            if($job_count > 0){
              $proocess = 100;
            }

            $success = 0;
            if($proocess > 70){
              $success = 1;
            }else{
              $success = 0;
            }
            $data['success'] = $success;

            $data['proocess'] = $proocess;




                //  dd($job_all);

                    $job_img = DB::table('tech_job_imgs')->select(
                          'tech_job_imgs.*'
                          )
                          ->where('job_id', $job_all->id)
                          ->get();


                    // code...




            $data['job_all'] = $job_all;
            $data['job_img'] = $job_img;


      $data['id'] = $job_all->tech_id;
      $data['datahead'] = "แก้ไขผลงานของช่าง";
      return view('admin2.tech.edit_job', $data);
    }

    public function jobs_tech_edit(Request $request){


      $gallary = $request->file('product_image');
      $this->validate($request, [
           'name_job' => 'required',
           'id_job' => 'required'
       ]);

       $id = $request['id_job'];

       $package = tech_job::find($id);
       $package->name_job = $request['name_job'];
       $package->detail_job = $request['detail_job'];
       $package->save();

       $the_id = $package->id;



       if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'assets/job_img/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'job_id' => $the_id
          ];
        }
        tech_job_img::insert($admins);
      }

       return redirect(url('admin/edit_job/'.$request['id_job']))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }

    public function add_jobs_tech(Request $request){

      $gallary = $request->file('product_image');
      $this->validate($request, [
           'name_job' => 'required',
           'pro_id' => 'required'
       ]);

       $package = new tech_job();
       $package->tech_id = $request['pro_id'];
       $package->name_job = $request['name_job'];
       $package->detail_job = $request['detail_job'];
       $package->save();

       $the_id = $package->id;



       if (sizeof($gallary) > 0) {
        for ($i = 0; $i < sizeof($gallary); $i++) {
          $path = 'assets/job_img/';
          $filename = time()."-".$gallary[$i]->getClientOriginalName();
          $gallary[$i]->move($path, $filename);
          $admins[] = [
              'image' => $filename,
              'job_id' => $the_id
          ];
        }
        tech_job_img::insert($admins);
      }

       return redirect(url('admin/tech_list/'.$request['pro_id']))->with('add_success_img','คุณทำการแก้ไขอสังหา สำเร็จ');

    }


    public function add_gallery(Request $request){



        $gallary = $request->file('product_image');

        $this->validate($request, [
             'product_image' => 'required|max:8048',
             'pro_id' => 'required'
         ]);



            $path = 'assets/tech_img/';
            $filename = time().'-'.(\random_int(1000, 9999)).'.'.$gallary->getClientOriginalExtension();
            $gallary->move($path, $filename);
            $admins[] = [
                'image' => $filename,
                'tech_id' => $request['pro_id']
            ];

          tech_gallery::insert($admins);


        return response()->json([
        'data' => 'success'
      ]);

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

        $proocess = 0;
        $img_count = DB::table('tech_galleries')->select(
              'tech_galleries.*'
              )
              ->where('tech_id', $id)
              ->count();

              $job_count = DB::table('tech_jobs')->select(
                    'tech_jobs.*'
                    )
                    ->where('tech_id', $id)
                    ->count();

              $data['img_count'] = $img_count;
              $data['job_count'] = $job_count;

              if($img_count > 0){
                $proocess += 33;
              }
              if($job_count > 0){
                $proocess = 100;
              }

              $success = 0;
              if($proocess > 70){
                $success = 1;
              }else{
                $success = 0;
              }
              $data['success'] = $success;
              $data['proocess'] = $proocess;

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

        //  dd($category);

          $img_all = DB::table('tech_galleries')->select(
                'tech_galleries.*'
                )
                ->where('tech_id', $id)
                ->get();
    $data['img_all'] = $img_all;


      $text_tech = DB::table('text_to_teches')->select(
          'text_to_teches.*'
          )
          ->where('tech_id', $id)
          ->get();
          $data['text_tech'] = $text_tech;

    $job_all = DB::table('tech_jobs')->select(
          'tech_jobs.*'
          )
          ->where('tech_id', $id)
          ->get();

          foreach ($job_all as $u) {

            $job_img = DB::table('tech_job_imgs')->select(
                  'tech_job_imgs.*'
                  )
                  ->where('job_id', $u->id)
                  ->get();

                $u->img = $job_img;
            // code...
          }

        //  dd($job_all);

    $data['job_all'] = $job_all;

          $data['category'] = $category;
          $province_th = province_th::all();
          $data['province_th'] = $province_th;
          $data['objs'] = $cat;
          $data['skill'] = $skill;
          $data['method'] = "put";
          $data['url'] = url('admin/tech_list/'.$id);
          $data['datahead'] = "แก้ไขช่างในระบบ ";
          return view('admin3.tech.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $proocess = 0;
      $img_count = DB::table('tech_galleries')->select(
            'tech_galleries.*'
            )
            ->where('tech_id', $id)
            ->count();

            $job_count = DB::table('tech_jobs')->select(
                  'tech_jobs.*'
                  )
                  ->where('tech_id', $id)
                  ->count();

            $data['img_count'] = $img_count;
            $data['job_count'] = $job_count;

            if($img_count > 0){
              $proocess += 33;
            }
            if($job_count > 0){
              $proocess = 100;
            }

            $success = 0;
            if($proocess > 70){
              $success = 1;
            }else{
              $success = 0;
            }
            $data['success'] = $success;
            $data['proocess'] = $proocess;

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
        return view('admin3.tech.edit', $data);

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
             'tech_phone' => 'required',
             'province_id' => 'required',
             'tech_detail' => 'required',
             'tech_show' => 'required',
             'tech_rating' => 'required',
             'lat' => 'required',
             'lng' => 'required',
             'category' => 'required',
             'option' => 'required'
         ]);

         $res=cat_tech::where('tech_id',$id)->delete();


         $category = $request['category'];

         if (sizeof($category) > 0) {
            for ($i = 0; $i < sizeof($category); $i++) {
              $admin[] = [
                  'cat_id' => $category[$i],
                  'tech_id' => $id
              ];
            }
            cat_tech::insert($admin);
          }










        if($image == null){

          $package = tech::find($id);
          $package->tech_fname = $request['tech_fname'];
          $package->tech_lname = $request['tech_lname'];
          $package->tech_phone = $request['tech_phone'];
          $package->tech_email = $request['tech_email'];
          $package->tech_sex = $request['tech_sex'];
          $package->province_id = $request['province_id'];
          $package->tech_detail = $request['tech_detail'];
          $package->tech_rating = $request['tech_rating'];
          $package->tech_status_show = $request['tech_show'];
          $package->lat = $request['lat'];
          $package->lng = $request['lng'];
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
          $package->tech_sex = $request['tech_sex'];
          $package->tech_image = $input['imagename'];
          $package->province_id = $request['province_id'];
          $package->tech_detail = $request['tech_detail'];
          $package->tech_rating = $request['tech_rating'];
          $package->tech_status_show = $request['tech_show'];
          $package->lat = $request['lat'];
          $package->lng = $request['lng'];
          $package->save();

        }

        $res1=tech_skill::where('tech_id',$id)->delete();
        $option = $request['option'];
        if (sizeof($option) > 0) {
           for ($i = 0; $i < sizeof($option); $i++) {
             $admins[] = [
                 'skill_id' => $option[$i],
                 'tech_id' => $id
             ];
           }
           tech_skill::insert($admins);
         }

        return redirect(url('admin/tech_list/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }


    public function imagess(Request $request) {

        $data = array('image' => $request->file('files'));
        $rules = array(
            'image' => 'required|max:8048',
            );

        $validator = Validator::make($data,$rules);

        if($validator->fails()) {
            return Response::json($validator->errors()->first('image'), 400);
        }

        $file = $request->file('files');
        $destinationPath = 'assets/image/tech'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = sha1(time().time()).".{$extension}";
        $file->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete_text(Request $request, $id){
      $tech_id = $request['tech_id'];
      $obj = text_to_tech::find($id);
      $obj->delete();
      return redirect(url('admin/tech_list/'.$tech_id))->with('delete_text','คุณทำการลบอสังหา สำเร็จ');
    }


    public function ่job_tech_del(Request $request, $id){

      $image_all =   $objs = DB::table('tech_job_imgs')
            ->select(
               'tech_job_imgs.*'
               )
            ->where('job_id', $id)
            ->get();

        foreach ($image_all as $user) {
        $file_path = 'assets/job_img/'.$user->image;
        unlink($file_path);
      }


      $tech_id = $request['tech_id'];
      $obj = tech_job::find($id);
      $obj->delete();
      return redirect(url('admin/tech_list/'.$tech_id))->with('delete_job','คุณทำการลบอสังหา สำเร็จ');

    }


    public function destroy($id)
    {
        //
        $tech = DB::table('teches')->select(
              'teches.*'
              )
              ->where('id', $id)
              ->first();

              DB::table('cat_teches')->select(
                    'cat_teches.*'
                    )
                    ->where('tech_id', $tech->id)
                    ->delete();

                    DB::table('tech_skills')->select(
                          'tech_skills.*'
                          )
                          ->where('tech_id', $tech->id)
                          ->delete();


                          DB::table('text_to_teches')->select(
                                'text_to_teches.*'
                                )
                                ->where('tech_id', $tech->id)
                                ->delete();

//* Delete tech_image gallery

                                $image_count =   $objs = DB::table('tech_galleries')
                                      ->select(
                                         'tech_galleries.*'
                                         )
                                      ->where('tech_id', $tech->id)
                                      ->count();


                               if($image_count > 0){

                                 $image_all = DB::table('tech_galleries')
                                       ->select(
                                          'tech_galleries.*'
                                          )
                                       ->where('tech_id', $tech->id)
                                       ->get();

                                       foreach($image_all as $img){

                                         $file_path = 'assets/tech_img/'.$img->image;
                                         unlink($file_path);

                                       }


                                            DB::table('tech_galleries')
                                             ->select(
                                                'tech_galleries.*'
                                                )
                                             ->where('tech_id', $tech->id)
                                             ->delete();

                               }else{

                                 $image_all = null;

                               }


//* End Delete tech_image gallery


                                /*      $file_path = 'assets/job_img/'.$objs->image;
                                      unlink($file_path);

                                      DB::table('tech_job_imgs')->where('id', $objs->id)->delete(); */

                                    //  dd($s);

//* Delete tech_jobs

                                $tech_job_count = DB::table('tech_jobs')->select(
                                      'tech_jobs.*'
                                      )
                                      ->where('tech_id', $tech->id)
                                      ->count();


                                if($tech_job_count > 0){

                                  $tech_job = DB::table('tech_jobs')->select(
                                        'tech_jobs.*'
                                        )
                                        ->where('tech_id', $tech->id)
                                        ->get();

                                        foreach($tech_job as $job){

                                          $tech_job_imgs = DB::table('tech_job_imgs')->select(
                                                'tech_job_imgs.*'
                                                )
                                                ->where('job_id', $job->id)
                                                ->get();

                                                foreach ($tech_job_imgs as $user) {
                                                $file_path = 'assets/job_img/'.$user->image;
                                                unlink($file_path);
                                              }

                                        }

                                            DB::table('tech_job_imgs')->select(
                                              'tech_job_imgs.*'
                                              )
                                              ->where('job_id', $job->id)
                                              ->delete();


                                        DB::table('tech_jobs')
                                         ->where('tech_id', $tech->id)
                                         ->delete();

                                }

//* End Delete tech_jobs


      DB::table('teches')->select(
      'teches.*'
      )
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/tech_list/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');

          //    dd($tech_job);
    }









}
