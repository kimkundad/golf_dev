<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skill;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skill = DB::table('skills')->select(
              'skills.*'
              )
              ->get();

              foreach($skill as $u){

                $count = DB::table('tech_skills')->select(
                      'tech_skills.*'
                      )
                      ->where('skill_id', $u->id)
                      ->count();

                      $u->option = $count;
              }

          //
          $s = 1;
          $data['s'] = $s;
          $data['objs'] = $skill;
          $data['datahead'] = "ความเชี่ยวชาญ";
          return view('admin3.skill.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/skill');
        $data['datahead'] = "สร้างความเชี่ยวชาญ";
        return view('admin3.skill.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
       'name' => 'required'
      ]);

        //
        $package = new skill();
        $package->skill_name = $request['name'];
        $package->save();
        return redirect(url('admin/skill'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $obj = skill::find($id);
        $data['url'] = url('admin/skill/'.$id);
        $data['datahead'] = "แก้ไขความเชี่ยวชาญ";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin3.skill.edit', $data);
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

      $this->validate($request, [
       'name' => 'required'
      ]);
        //
        $package = skill::find($id);
        $package->skill_name = $request['name'];
        $package->save();

      return redirect(url('admin/skill/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $skill_tech = DB::table('tech_skills')->where('skill_id',$id)->delete();


        $obj = skill::find($id);
        $obj->delete();
        return redirect(url('admin/skill/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
