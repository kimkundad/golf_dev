<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {

      $count_tech_all = DB::table('teches')->select(
            'teches.*'
            )
            ->count();

        $data['count_tech_all'] = $count_tech_all;


        $get_tech = DB::table('teches')->select(
              'teches.*'
              )
              ->where('tech_status', 0)
              ->count();

              $ran = array("badge-success","badge-warning","badge-danger","badge-info","badge-primary");

              $get_tech = DB::table('teches')->select(
                    'teches.*',
                    'province_ths.*',
                    'teches.id as id_te'
                    )
                    ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
                    ->where('teches.tech_status', 0)
                    ->limit(6)
                    ->get();

                    foreach ($get_tech as $obj) {
                      $obj->option = $ran[array_rand($ran, 1)];
                    }


          $data['get_tech'] = $get_tech;

        //  dd($get_tech);



      $count_tech = DB::table('teches')->select(
            'teches.*'
            )
            ->where('tech_status', 0)
            ->count();
        $data['count_tech'] = $count_tech;


        $count_tech_in = DB::table('teches')->select(
              'teches.*'
              )
              ->where('tech_status', 1)
              ->count();
          $data['count_tech_in'] = $count_tech_in;


          $count_tech_out = DB::table('teches')->select(
                'teches.*'
                )
                ->where('tech_status', 2)
                ->count();
            $data['count_tech_out'] = $count_tech_out;


          $count_contact = DB::table('text_to_teches')->select(
                'text_to_teches.*'
                )
                ->count();
            $data['count_contact'] = $count_contact;


            $count_contact_us = DB::table('contacts')->select(
                  'contacts.*'
                  )
                  ->count();
              $data['count_contact_us'] = $count_contact_us;

          $per_tech_in = (($count_tech_in/$count_tech_all) * 100);
          $data['per_tech_in'] = $per_tech_in;

          $per_tech_new = (($count_tech/$count_tech_all) * 100);
          $data['per_tech_new'] = $per_tech_new;

          $per_tech_out = (($count_tech_out/$count_tech_all) * 100);
          $data['per_tech_out'] = $per_tech_out;

        //  dd($per_tech_new);


        $data['datahead'] = "Dashboard ";
        return view('admin3.dashboard.index', $data);
    }
}
