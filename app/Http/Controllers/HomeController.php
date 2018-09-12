<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\text_to_tech;
use App\category;

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
          ->where('tech_status_show', 1)
          ->where('tech_status', 1)
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

            foreach($tech_cat as $j){

              $cat_for = DB::table('categories')
                  ->select(
                  'categories.name_cat'
                  )
                  ->where('id', $j->cat_id)
                  ->first();
              $j->name_cat_for = $cat_for->name_cat;
            }

        $u->tech_prov = $tech_prov->province_name;
        $u->tech_imgs = $tech_img->image;
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
          ->where('tech_status_show', 1)
          ->where('tech_status', 1)
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


              $tech_cat = DB::table('cat_teches')
                  ->where('tech_id', $id)
                  ->get();

                  foreach($tech_cat as $j){

                    $cat_for = DB::table('categories')
                        ->select(
                        'categories.name_cat'
                        )
                        ->where('id', $j->cat_id)
                        ->first();
                    $j->name_cat_for = $cat_for->name_cat;
                  }
          //dd($tech_cat);
          $data['tech_prov'] = $tech_prov->province_name;
          $data['tech'] = $tech;
          $data['tech_cat'] = $tech_cat;
          $data['tech_img'] = $tech_img;
      return view('single_tech', $data);
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
      return view('regis_tech');
    }

    public function search(Request $request){

      $category = category::all();
      $data['category'] = $category;

    //  dd($request['radius']);
      $cat_id = $request['cat_id'];
      $lat = $request['lat'];
      $lon = $request['lng'];
      $check = $request['check'];
      $location = $request['location'];

    //  dd($check);

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
          ->paginate(10);

        //  dd($tech);


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

              foreach($tech_cat as $j){

                $cat_for = DB::table('categories')
                    ->select(
                    'categories.name_cat'
                    )
                    ->where('id', $j->cat_id)
                    ->first();
                $j->name_cat_for = $cat_for->name_cat;
              }

          $u->tech_prov = $tech_prov->province_name;
          $u->tech_imgs = $tech_img->image;
          $u->cat_tech = $tech_cat;
        }

          $data['lat'] = $lat;
          $data['lon'] = $lon;
          $data['tech'] = $tech;
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
