<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|max:50|unique:users',
            'address' => 'max:200',
            'about' => 'max:300',
            'role' => 'in:user,admin',
            'password' => 'required|min:6',
        ];
        if (!empty($request->input('phone'))) {
            $rules['phone'] = 'required|max:15';
        }
        if (!empty($request->input('avatar'))) {
            $rules['avatar'] = 'mimes:jpeg,jpg,png,JPG,JPEG,PNG';
        }
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors($validator);
        } else {
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->about = $request->input('about');
            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $user->password = bcrypt($request->input('password'));

            //Avatar Upload
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('','avatars');
                $user_avatar = ImageManagerStatic::make('storage/avatars/'.$path);
                $user_avatar->fit(512, 512);
                $user_avatar->save(storage_path().'/app/public/avatars/'.$path);

                $user->avatar = $path;
            }
            
            $user->save();
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "User has been added. You can add more user from the form below.");
            return redirect()->route('admin.user.index');
        }
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
        $user = User::find($id);
        return view('admin.user.edit')->with([
            'user' => $user
        ]);
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
        $user = User::find($id);
        $rules = [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'address' => 'max:200',
            'about' => 'max:300',
            'role' => 'in:user,admin'
        ];
        if (!empty($request->input('phone'))) {
            $rules['phone'] = 'required|max:15';
        }
        if ($request->hasFile('avatar')) {
            $rules['avatar'] = 'mimes:jpeg,jpg,png,PNG,JPEG,JPG,JPG';
        }
        if (!empty($request->input('password'))) {
            $rules['password'] = 'min:6';
        }
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors($validator)
                    ->with('user', $user);
        } else {
            $user = User::find($id);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->about = $request->input('about');
            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $user->password = bcrypt($request->input('password'));
            //Avatar Upload
            if ($request->hasFile('avatar')) {
                if(!in_array($user->avatar, ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png','man.png', 'man-1.png', 'man-2.png', 'man-3.png'])){
                    Storage::delete('public/avatars/'.$user->avatar);
                }
                $path = $request->file('avatar')->store('','avatars');
                $user_avatar = ImageManagerStatic::make('storage/avatars/'.$path);
                $user_avatar->fit(512, 512);
                $user_avatar->save(storage_path().'/app/public/avatars/'.$path);

                $user->avatar = $path;
            }
            $user->save();
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "User profile has been updated.");
            return redirect()->route('admin.user.index');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $user = User::find($id);
            $user_name = $user->first_name . " " . $user->last_name;
            $error_message = '';
            if ($user->id !== 1) {
                if ($user->id !== Auth::user()->id) {
    
                    // // Delete room bookings
                    foreach ($user->room_bookings as $booking) {
                        $booking->delete();
                    }
    
    
                    if ($user->delete()) {
                        if(Storage::disk('avatars')->exists($user->avatar)){
                            if(!in_array($user->avatar, ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png','man.png', 'man-1.png', 'man-2.png', 'man-3.png'])){
                                Storage::delete('public/avatars/'.$user->avatar);
                            }
                        }
    
                        Session::flash('flash_title', 'Success');
                        Session::flash('flash_message', 'The user, ' . $user_name . ' has been deleted');
    
                        return redirect()->route('admin.user.index');
                    } else {
                        $error_message = "Sorry, user could not be deleted.";
                    }
                } else {
                    $error_message = "Sorry, you cannot delete yourself.";
                }
            }else{
                $error_message = "Sorry, you can not delete the first user.";
            }
    
            return redirect()
                ->back()
                ->withErrors(array('message' => $error_message));
        }
    
    }
}
