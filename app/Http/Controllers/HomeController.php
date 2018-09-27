<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\text_to_tech;
use App\category;
use App\province_th;
use App\tech;
use App\cat_tech;
use App\contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $tech = DB::table('teches')
          ->select(
          'teches.id',
          'teches.tech_fname',
          'teches.tech_lname',
          'teches.tech_image',
          'teches.tech_status_show',
          'teches.tech_view',
          'teches.tech_view',
          'teches.tech_rating',
          'teches.tech_detail',
          'teches.province_id',
          'teches.district',
          'teches.tech_status'
          )
          ->where('teches.tech_status_show', 1)
          ->where('teches.tech_status', 1)
          ->get();

      foreach($tech as $u){

        $tech_img = DB::table('tech_galleries')
            ->select(
            'image'
            )
            ->where('tech_id', $u->id)
            ->first();

            $tech_prov = DB::table('province_ths')
                ->select(
                'province_name'
                )
                ->where('id', $u->province_id)
                ->first();

        $tech_cat = DB::table('cat_teches')
            ->where('tech_id', $u->id)
            ->get();

            $tech_cat_count = DB::table('cat_teches')
                ->where('tech_id', $u->id)
                ->count();

            if($tech_cat_count > 0){

              foreach($tech_cat as $j){

                $cat_for = DB::table('categories')
                    ->select(
                    'categories.name_cat'
                    )
                    ->where('id', $j->cat_id)
                    ->first();
                $j->name_cat_for = $cat_for->name_cat;
              }

            }





        $u->tech_prov = $tech_prov->province_name;

        if(empty($tech_img->image)){
          $u->tech_imgs = 'listing-item-03.jpg';
        }else{
          $u->tech_imgs = $tech_img->image;
        }

        $u->cat_tech = $tech_cat;
      }

      //dd($tech);


      $cat = DB::table('categories')
          ->get();
      foreach($cat as $u){

        $objs = DB::table('cat_teches')
            ->select(
            'cat_teches.*'
            )
            ->where('cat_id', $u->id)
            ->count();
            $u->count = $objs;
      }

      $cat_head = DB::table('categories')
          ->limit(2)
          ->get();
      foreach($cat_head as $u){

        $objs = DB::table('cat_teches')
            ->select(
            'cat_teches.*'
            )
            ->where('cat_id', $u->id)
            ->count();
            $u->count = $objs;
      }
      $category = category::all();
      $data['category'] = $category;
      $data['tech'] = $tech;
      $data['cat'] = $cat;
      $data['cat_head'] = $cat_head;
        return view('welcome', $data);
    }

    public function single_tech($id){

      $tech_skill = DB::table('tech_skills')
          ->where('tech_id', $id)
          ->get();
          foreach($tech_skill as $k){

            $skill = DB::table('skills')
                ->select(
                'skills.*'
                )
                ->where('id', $k->skill_id)
                ->first();

            $k->option_skill = $skill->skill_name;
          }

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

        //  dd($tech_skill);
      $data['tech_skill'] = $tech_skill;

      $tech_img = DB::table('tech_galleries')
          ->select(
          'image'
          )
          ->where('tech_id', $id)
          ->get();

      $tech = DB::table('teches')
          ->select(
          'teches.*',
          'teches.id as id_tech'
          )
          ->where('tech_status', 1)
          ->where('id', $id)
          ->first();




          $province = DB::table('province_ths')
              ->where('province_ths.id', $tech->province_id)
              ->first();

          $tech->province_ths = $province;

        //  dd($tech);

          $tech_prov = DB::table('province_ths')
              ->select(
              'province_name'
              )
              ->where('id', $tech->province_id)
              ->first();

              $tech_cat_count = DB::table('cat_teches')
                  ->where('tech_id', $u->id)
                  ->count();


              $tech_cat = DB::table('cat_teches')
                  ->where('tech_id', $id)
                  ->get();

                  if($tech_cat_count > 0){

                    foreach($tech_cat as $j){

                      $cat_for = DB::table('categories')
                          ->select(
                          'categories.name_cat'
                          )
                          ->where('id', $j->cat_id)
                          ->first();
                      $j->name_cat_for = $cat_for->name_cat;
                    }

                  }

          //dd($tech_cat);

          $tech_img = DB::table('tech_galleries')
              ->select(
              'image'
              )
              ->where('tech_id', $id)
              ->first();

          $data['tech_imgs'] = $tech_img;

          $data['tech_cat_count'] = $tech_cat_count;
          $data['tech_prov'] = $tech_prov->province_name;
          $data['tech'] = $tech;
          $data['tech_cat'] = $tech_cat;
          $data['tech_img'] = $tech_img;
      return view('single_tech', $data);
    }


    public function contact_us(Request $request){

      $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'subject' => 'required',
           'comments' => 'required'
       ]);

       $package = new contact();
       $package->name = $request['name'];
       $package->email = $request['email'];
       $package->subject = $request['subject'];
       $package->comments = $request['comments'];
       $package->save();

      // dd($package);

       return redirect(url('email_success'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');



    }


    public function post_to_tech(Request $request){

      $this->validate($request, [
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required',
           'comments' => 'required'
       ]);

       $package = new text_to_tech();
       $package->name = $request['name'];
       $package->phone = $request['phone'];
       $package->email = $request['email'];
       $package->comments = $request['comments'];
       $package->tech_id = $request['tech_id'];
       $package->save();

      // dd($package);

       return redirect(url('email_success'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


    public function regis_tech_submit(Request $request){

      $image = $request->file('image');
      $this->validate($request, [
           'image' => 'required|max:8048',
           'tech_fname' => 'required',
           'tech_lname' => 'required',
           'tech_phone' => 'required',
           'tech_email' => 'required',
           'category' => 'required',
           'province_id' => 'required'
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
     $package->province_id = $request['province_id'];
     $package->lat = '13.7211075';
     $package->lng = '100.5904873';
     $package->save();

     $the_id = $package->id;
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

      return redirect(url('email_success'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    public function about(){
      return view('about');
    }

    public function email_success(){
      return view('email_success');
    }

    public function contact(){
      return view('contact');
    }

    public function regis_tech(){

      $category = category::all();
      $data['category'] = $category;

      $province_th = province_th::all();
      $data['province_th'] = $province_th;
      return view('regis_tech', $data);
    }

    public function search(Request $request){
      $cat_id = $request['cat_id'];



      $category = DB::table('categories')
          ->get();

      foreach ($category as $k) {

        for($s = 0; $s < count($cat_id); $s++ ){

          if($k->id == $cat_id[$s]){
            $k->option = 1;
          }
        }
        // code...

      }

    //  dd($category);

      $data['category'] = $category;

    //  dd($request['radius']);

      $lat = $request['lat'];
      $lon = $request['lng'];
      $check = $request['check'];
      $location = $request['location'];




      if($request['radius'] == null){
        $radius = 50; // Km
      }else{
        $radius = $request['radius'];
      }




      $angle_radius = $radius / ( 111 * cos( $lat ) ); // Every lat|lon degree° is ~ 111Km
      $min_lat = $lat - $angle_radius;
      $max_lat = $lat + $angle_radius;
      $min_lon = $lon - $angle_radius;
      $max_lon = $lon + $angle_radius;


      if($lat == null || $lon == null ){

        $location = "กรุงเทพมหานคร ประเทศไทย";


        if($cat_id[0] == 0){

          $tech = DB::table('teches')
              ->select(
              'teches.id',
              'teches.tech_fname',
              'teches.tech_lname',
              'teches.tech_image',
              'teches.tech_status_show',
              'teches.tech_view',
              'teches.tech_view',
              'teches.tech_rating',
              'teches.tech_detail',
              'teches.province_id',
              'teches.district',
              'teches.lat',
              'teches.lng',
              'teches.id as id_tech',
              'teches.tech_status'
              )
              ->where('teches.tech_status', 1)
              ->paginate(10);


              $tech_count = DB::table('teches')
                ->select(
                'teches.id'
                )
                ->where('teches.tech_status', 1)
                ->count();

            //   dd($tech);

        }else{

          $tech = DB::table('teches')
              ->select(
              'teches.id',
              'teches.tech_fname',
              'teches.tech_lname',
              'teches.tech_image',
              'teches.tech_status_show',
              'teches.tech_view',
              'teches.tech_view',
              'teches.tech_rating',
              'teches.tech_detail',
              'teches.province_id',
              'teches.district',
              'teches.lat',
              'teches.lng',
              'teches.id as id_tech',
              'teches.tech_status'
              )
              ->leftjoin('cat_teches', 'teches.id', '=','cat_teches.tech_id')
              ->whereIn('cat_teches.cat_id', [$cat_id])
              ->where('teches.tech_status', 1)
              ->groupBy('teches.id')
              ->paginate(10);


              $tech_count = DB::table('teches')
                ->select(
                'teches.id',
                'cat_teches.tech_id'
                )
                ->leftjoin('cat_teches', 'teches.id', '=','cat_teches.tech_id')
                ->whereIn('cat_teches.cat_id', [$cat_id])
                ->where('teches.tech_status', 1)
                ->groupBy('teches.id')
                ->count();

            //    dd($tech);

        }



      }else{


        if($cat_id[0] == 0){

          $tech = DB::table('teches')
              ->select(
              'teches.id',
              'teches.tech_fname',
              'teches.tech_lname',
              'teches.tech_image',
              'teches.tech_status_show',
              'teches.tech_view',
              'teches.tech_view',
              'teches.tech_rating',
              'teches.tech_detail',
              'teches.province_id',
              'teches.district',
              'teches.lat',
              'teches.lng',
              'teches.id as id_tech',
              'teches.tech_status'
              )
              ->whereBetween('lat', [$min_lat, $max_lat])
              ->whereBetween('lng', [$min_lon, $max_lon])
              ->where('teches.tech_status', 1)
              ->paginate(10);

          $tech_count = DB::table('teches')
            ->whereBetween('lat', [$min_lat, $max_lat])
            ->whereBetween('lng', [$min_lon, $max_lon])
            ->where('teches.tech_status', 1)
            ->count();

          //  dd($tech_count);
        }else{

          $tech = DB::table('teches')
              ->select(
              'teches.id',
              'teches.tech_fname',
              'teches.tech_lname',
              'teches.tech_image',
              'teches.tech_status_show',
              'teches.tech_view',
              'teches.tech_view',
              'teches.tech_rating',
              'teches.tech_detail',
              'teches.province_id',
              'teches.district',
              'teches.lat',
              'teches.lng',
              'teches.id as id_tech',
              'teches.tech_status',
              'cat_teches.tech_id'
              )
              ->leftjoin('cat_teches', 'cat_teches.tech_id', 'teches.id')
              ->whereBetween('teches.lat', [$min_lat, $max_lat])
              ->whereBetween('teches.lng', [$min_lon, $max_lon])
              ->where('teches.tech_status', 1)
              ->groupBy('teches.id')
              ->paginate(10);

              $tech_count = DB::table('teches')
                ->select(
                'teches.id',
                'cat_teches.tech_id'
                )
                ->leftjoin('cat_teches', 'cat_teches.tech_id', 'teches.id')
                ->whereIn('cat_teches.cat_id', [$cat_id])
                ->whereBetween('teches.lat', [$min_lat, $max_lat])
                ->whereBetween('teches.lng', [$min_lon, $max_lon])
                ->where('teches.tech_status', 1)
                ->groupBy('teches.id')
                ->count();

          //      dd($tech_count);

        }



      }



      //    dd($tech);


        foreach($tech as $u){

          $tech_img = DB::table('tech_galleries')
              ->select(
              'image'
              )
              ->where('tech_id', $u->id)
              ->first();

              $tech_prov = DB::table('province_ths')
                  ->select(
                  'province_name'
                  )
                  ->where('id', $u->province_id)
                  ->first();

          $tech_cat = DB::table('cat_teches')
              ->where('tech_id', $u->id)
              ->get();

              $tech_cat_count = DB::table('cat_teches')
                  ->where('tech_id', $u->id)
                  ->count();

                  if($tech_cat_count > 0){
              foreach($tech_cat as $j){

                $cat_for = DB::table('categories')
                    ->select(
                    'categories.name_cat'
                    )
                    ->where('id', $j->cat_id)
                    ->first();
                $j->name_cat_for = $cat_for->name_cat;
              }
            }

          $u->tech_prov = $tech_prov->province_name;


          if(empty($tech_img->image)){
            $u->tech_imgs = 'listing-item-03.jpg';
          }else{
            $u->tech_imgs = $tech_img->image;
          }


          $u->cat_tech = $tech_cat;
        }

      //  dd($cat_id);
          $data['cat_id'] = $cat_id;
          $data['lat'] = $lat;
          $data['lon'] = $lon;
          $data['tech'] = $tech;
          $data['radius'] = $radius;
          $data['tech_count'] = $tech_count;
          $data['location'] = $location;
      return view('search', $data);
    }

    public function privacy(){
      return view('privacy');
    }

    public function terms_conditions(){
      return view('terms_conditions');
    }





    public function map_api(){
        return response()->json([
        'win' => 'success','win' => 'success'
      ]);

    }

}
