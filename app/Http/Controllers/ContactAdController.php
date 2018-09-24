<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\text_to_tech;
use App\tech;
use Illuminate\Support\Facades\DB;

class ContactAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('text_to_teches')->select(
              'text_to_teches.*',
              'text_to_teches.id as id_con',
              'teches.*',
              'teches.id as id_tech'
              )
              ->leftjoin('teches', 'teches.id',  'text_to_teches.tech_id')
              ->get();


        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $cat;
        $data['datahead'] = "จัดการข้อความถึงช่าง";
        return view('admin3.contact_admin.index', $data);

    }



    public function api_contact_status(Request $request){

      $user = text_to_tech::findOrFail($request->user_id);

              if($user->m_status == 1){
                  $user->m_status = 0;
              } else {
                  $user->m_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

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

        $tech = tech::all();
        $cat = DB::table('text_to_teches')->select(
              'text_to_teches.*',
              'text_to_teches.id as id_con',
              'teches.*',
              'province_ths.*',
              'teches.id as id_tech'
              )
              ->leftjoin('teches', 'teches.id',  'text_to_teches.tech_id')
              ->leftjoin('province_ths', 'province_ths.id',  'teches.province_id')
              ->where('text_to_teches.id', $id)
              ->first();

            //  dd($cat);

        $data['tech'] = $tech;
        $data['objs'] = $cat;
        $data['method'] = "put";
        $data['url'] = url('admin/contact_admin/'.$id);
        $data['datahead'] = "แก้ไขข้อความ ";
        return view('admin3.contact_admin.edit', $data);
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

        $this->validate($request, [
             'note' => 'required',
             'name' => 'required',
             'phone' => 'required',
             'email' => 'required',
             'comments' => 'required'
         ]);

         $package = text_to_tech::find($id);
         $package->name = $request['name'];
         $package->phone = $request['phone'];
         $package->email = $request['email'];
         $package->comments = $request['comments'];
         $package->note = $request['note'];
         $package->save();

        // dd($package);

         return redirect(url('admin/contact_admin/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
      $obj = text_to_tech::find($id);
      $obj->delete();
      return redirect(url('admin/contact_admin/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
