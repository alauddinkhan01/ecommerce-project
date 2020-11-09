<?php

namespace App\Http\Controllers;

use Session;
use App\Admin;
// use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

// use Illuminate\Validation\Validator;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin')->except('adminlogin');
    }
    public function dashboard()
    {
		Session::put('page','dashboard');
        return view('admin.admin_dashboard');
    }
    public function adminlogin(Request $request)
    {
		
    	if ($request->isMethod('post')) 
    	{
			 $data=$request->all();
			 $validatedData = $request->validate([
				'email' => 'required|email',
				'password' => 'required|min:6',
			]);
		// $rule=[
		// 	'email'=>'required'|'email',
		// 	'password'=>'required'
		// ];
		// $custommessage=[
		// 	'email.required'=>'email is required',
		// 	'email.email'=>'enter a valid email formate',
		// 	'password.required'=>'password is required'
		// ];
		// $this->validate($request,$rule,$custommessage);

    		if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) 
    		{
    			return redirect('dashboard');
    		}
    		else
    		{
				Session::flash('error_message','email or password are incorrect');
				Session::flash('instruction_message','please use the correct email and password and try again');

    			return redirect()->back();
    		}
    	}
         return view('admin.admin_login');
	}
	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect()->route('adminlogin');
	}

	public function settings()
	{
		Session::put('page','settings');

		$admindata=Auth::guard('admin')->user();
		return view('admin.admin_settings',compact('admindata'));
	}
	public function adminpasswordchange()
	{
		return view('admin.admin_settings');
	}
	public function changepassword(Request $request)
	{
		Session::put('page','changepassword');
		// -----  sample validation ------- //
		// $this->validate($request, [
		// 	'current_pwd'=> 'required',
		// 	'new_pwd'=>'required|min:4',
		// 	'confirm_new_pwd'=>'required|min:4',

		// ]);
		// -----  custom  validation ------- //
		$rules=[
			'current_pwd'=>'required',
			'new_pwd'=>'required',
			'confirm_new_pwd'=>'required|confirmed'
		];
		$custommessage=[
			'current_pwd.required'=>'Please enter the current password',
			'new_pwd.required'=>'Please enter the new password',
			'confirm_new_pwd.required'=>'Please enter the confirm new password',

		];
		$this->validate($request,$rules,$custommessage);
		if(!(Hash::check($request->get('current_pwd'), Auth::guard('admin')->user()->password)))
		{
			return back()->with('error','current password dose not match with old password');
		}
		if($request->get('current_pwd')==$request->get('new_pwd'))
		{
			return back()->with('error','current password and the new password will not be the same');
		}
		// if(!strcmp($request->get('new_pwd'), $request->get('confirm_new_pwd'))==0)
		// {
		// 	return back()->with('error','new password and confirm new password dosnot match');
		// }


		$admin= Auth::guard('admin')->user();
		$admin->password=bcrypt($request->new_pwd);
		$admin->save();
		return back()->with('message','password changed successfully');
	}
	public function admindetails()
	{
		Session::put('page','admindetails');

		return view('admin.update_admin_detail');
	}
	public function updateadmindetails(Request $request)
	{
		$rules=[
			'name'=>'required',
			'mobile'=>'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		];
		$custommessage=[
			'name.required'=>'Please enter the admin name',
			'mobile.required'=>'Please enter mobile number',
			// 'mobile.integer'=>'Mobile number should be in numbers',
			'image.required'=>'Image is required.the image should be in jpg,png,gif,svg jpeg and the max size si 2mb',
			'image.image'=>'Image is required.the image should be in jpg,png,gif,svg jpeg and the max size si 2mb',
			'image.mimes'=>'Image is required.the image should be in jpg,png,gif,svg jpeg and the max size si 2mb'


		];
		$this->validate($request,$rules,$custommessage);
		$admininfo=Auth::guard('admin')->user();
		$admininfo->name=$request->name;
		$admininfo->mobile=$request->mobile;
		if($file=$request->file('image'))
		{
			// echo $file;
			if($admininfo->image)
			{
				unlink(public_path().'\storage\images\admin_images\\'.$admininfo->image);
				// $admininfo->image->delete();
			}
			// Image::
			$name=time().'_'.$file->getClientOriginalName();
			$file->storeAs('public/images/admin_images',$name);
			$admininfo->image=$name;

		}
		$admininfo->save();
		return back()->with('message','Admin data updated successfully');
	}
}
