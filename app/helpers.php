<?php

use Illuminate\Support\Facades\DB;



function get_logo(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->logo_img;
}

function fb_title(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->fb_title;
}

function fb_detail(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->fb_detail;
}

function title_company(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->title_company;
}


function facebook_img(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->facebook_img;
}

function get_compony(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->compony;
}


function get_address(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->address;
}

function get_phone(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->phone;
}
function get_fax(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->fax;
}

function get_website(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->website;
}
function get_emial(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->email;
}


function get_lat(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->lat;
}

function get_lng(){

  $cat = DB::table('settings')->select(
        'settings.*'
        )
        ->where('id', 1)
        ->first();
  return $cat->lng;
}
