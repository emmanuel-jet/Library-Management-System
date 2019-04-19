<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request; 

use App\Http\Controllers\Controller;

use App\Member;




class MembersController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request){
    	if($request->ajax())
          {
            $member = Member::where('member_id','=',$request->id)->get();       
            return response($member);
          }

    }
    public function update(Request $request){
    	$rules = [
    		'member_name' => 'required|min:4',
            'member_email' => 'required|email',
            'member_contact' => 'required|min:11',
            'member_mat_no' => 'required|max:9',
						'member_fac' => 'required',
						'member_dept' => 'required'
            ];
        $messages = [
            'member_name.required' => 'Member Name is required!',
            'member_name.min' => 'Member Name is Invalid!',
            'member_email.required' => 'Member Email is required!',
            'member_email.unique' => 'This Email Already in Used!',
            'member_contact.required' => 'Mobile Number is required!',
            'member_contact.min' => 'Invalid Mobile Number',
            'member_mat_no.required' => 'Matric Number is required',
            'member_mat_no.unique' => 'Matric Number already Used!',
            'member_mat_no.max' => 'Matric Number number cannot be greater than 9 characters',
						'member_fac.required' => 'Member Faculty is required!',
						'member_dept.required' => 'Member Department is required!',
         
        ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }

            // Update Member Database and give a json response to show ajax notification

            if ($request->ajax()) {
            $member = Member::where('member_id', '=' ,$request->member_id)->update(
            	[
            	'member_name' => $request->member_name, 
            	'member_email' => $request->member_email, 
            	'member_contact' => $request->member_contact, 
            	'member_fac' => $request->member_fac, 
            	'member_dept' => $request->member_dept, 
            	'member_mat_no' => $request->member_mat_no
            ]
            );
            return response()->json($member);
            }

    }



       public function search(Request $request){ 
        if ($request->search_input=='') {
           $members = Member::latest()->paginate(20);
        return view('member.show', compact('members'));
        }
        else {
          $members = Member::where('member_mat_no','=',$request->search_input)->orWhere('member_fac','=',$request->search_input)->orWhere('member_dept','=',$request->search_input)->orWhere('member_contact','=',$request->search_input)->orWhere('member_email','LIKE','%'.$request->search_input.'%')->orWhere('member_name','LIKE','%'.$request->search_input.'%')->paginate(1000);  
          return view('member.show', compact('members'));
      }
}

    public function store(Request $request)
    {   
    	$rules = [
    		'member_name' => 'required|min:4',
            'member_email' => 'required|email|unique:members',
            'member_contact' => 'required|min:10|max:11',
            'member_mat_no' => 'required|unique:members|max:9',
						'member_fac' => 'required',
						'member_dept' => 'required'
            ];
        $messages = [
            'member_name.required' => 'Member Name is required!',
            'member_name.min' => 'Member Name is Invalid!',
            'member_email.required' => 'Member Email is required!',
            'member_email.unique' => 'This Email Already in Used!',
            'member_contact.required' => 'Mobile Number is required!',
            'member_contact.min' => 'Invalid Mobile Number',
						'member_contact.max' => 'Invalid Mobile Number',
            'member_mat_no.required' => 'Matric Number is required',
            'member_mat_no.unique' => 'Matric Number already Used!',
            'member_mat_no.max' => 'Matric Number number cannot be greater than 9 characters',
						'member_fac.required' => 'Member Faculty is required!',
						'member_dept.required' => 'Member Department is required!',
        ];   
     $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }
            else {
   
                $member = new Member;                
                $member->member_name = $request->member_name;
                $member->member_email = $request->member_email;
                $member->member_contact = $request->member_contact;            
                $member->member_fac = $request->member_fac;
                $member->member_dept = $request->member_dept;
                $member->member_mat_no = $request->member_mat_no;

                $member->save();
                return response()->json($member);
          }

    }

        public function destroy(Request $request)
        {  
            $memberinfodel = Member::where('member_id','=',$request->member_id)->delete(); 
             return redirect('/members');
                 // return response($memberinfodel); 
        }
}
 