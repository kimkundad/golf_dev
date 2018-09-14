<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use Illuminate\Support\Facades\DB;

class ContactContraller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cat = DB::table('contacts')->select(
            'contacts.*'
            )
            ->get();


      $s = 1;
      $data['s'] = $s;
      $data['objs'] = $cat;
      $data['datahead'] = "จัดการ contact";
      return view('admin2.contact.index', $data);
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
    public function api_contact_us_status(Request $request)
    {
        //
        $user = contact::findOrFail($request->user_id);

                if($user->status == 1){
                    $user->status = 0;
                } else {
                    $user->status = 1;
                }


        return response()->json([
        'data' => [
          'success' => $user->save(),
        ]
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

        $cat = DB::table('contacts')->select(
              'contacts.*'
              )
              ->where('id', $id)
              ->first();


        $data['objs'] = $cat;


        $data['datahead'] = "ข้อความ ติดต่อ";
        return view('admin2.contact.show', $data);
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
        $obj = contact::find($id);
        $obj->delete();
        return redirect(url('admin/us_contact/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
