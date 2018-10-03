<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $objs = DB::table('users')
          ->select(
          'users.*'
          )
          ->get();

        $data['objs'] = $objs;
        $data['datahead'] = "รายชื่อผู้เข้าใช้ระบบ";
        return view('admin3.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $data['method'] = "post";
      $data['url'] = url('admin/user');
      $data['datahead'] = "สร้างผู้เข้าใช้ระบบ ";
      return view('admin3.user.create', $data);

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
       'name' => 'required|unique:users|max:255',
       'email' => 'required|email|max:255|unique:users',
       'password' => 'required|min:6|confirmed',
     ]);

      $image = $request->file('image');


     if($image == NULL){

       $ran = array("1483537975.png","1483556517.png","1483556686.png");

       $package = new User();
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->avatar = $ran[array_rand($ran, 1)];
        $package->is_admin = 0;
        $package->provider = 'email';
        $package->password = bcrypt($request['password']);
        $package->save();
        return redirect(url('admin/user'))->with('add_success','เพิ่มบัญชีผู้ใช้งาน เสร็จเรียบร้อยแล้ว');

     }else{

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $img = Image::make($image->getRealPath());
    $img->resize(300, 300, function ($constraint) {
    $constraint->aspectRatio();
    })->save('assets/images/avatar/'.$input['imagename']);

        $package = new User();
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->is_admin = 0;
        $package->avatar = $input['imagename'];
        $package->provider = 'email';
        $package->password = bcrypt($request['password']);
        $package->save();
        return redirect(url('admin/user'))->with('add_success','เพิ่มบัญชีผู้ใช้งาน เสร็จเรียบร้อยแล้ว');

     }

    }


    public function api_user_status(Request $request){


      $user = User::findOrFail($request->user_id);

              if($user->is_admin == 1){
                  $user->is_admin = 0;
              } else {
                  $user->is_admin = 1;
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
        $cat = DB::table('users')
            ->select(
            'users.*'
            )
            ->where('id', $id)
            ->first();
        $data['objs'] = $cat;










        return view('admin2.cars.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $cat = DB::table('users')
          ->select(
          'users.*'
          )
          ->where('id', $id)
          ->first();

      $data['objs'] = $cat;
      $data['url'] = url('admin/user/'.$id);
      $data['datahead'] = "แก้ไขข้อมูล";
      $data['method'] = "put";

      return view('admin3.user.edit', $data);

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
       'name' => 'required',
       'email' => 'required'
     ]);


      $image = $request->file('image');


     if($image == NULL){

       $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->save();


     }else{

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
      $img->resize(300, 300, function ($constraint) {
      $constraint->aspectRatio();
      })->save('assets/images/avatar/'.$input['imagename']);

        $package = User::find($id);
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->avatar = $input['imagename'];
        $package->save();


     }

       return redirect(url('admin/user/'.$id.'/edit'))->with('edit_success','เพิ่มบัญชีผู้ใช้งาน เสร็จเรียบร้อยแล้ว');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $objs = DB::table('users')
      ->select(
         'users.*'
         )
      ->where('id', $id)
      ->where('is_admin', '!=', 1)
      ->count();

      if($objs > 0){

        $obj = User::find($id);
        $obj->delete();
        return redirect(url('admin/user'))->with('delete','Delete successful');

      }else{

        return redirect(url('admin/user'))->with('error','Delete successful');

      }


    }
}
