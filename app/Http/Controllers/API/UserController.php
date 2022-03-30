<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Models\EnrollmentCollege;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            $user = User::where('id',Auth::id())->first();
            $token = $user->createToken('userToken')->plainTextToken;
            return response()->json($token,200);
        }else{
            return response('err',401);
        }
    }

    public function logout()
    {
          $user = User::where('id',Auth::id())->first();
          $user->tokens()->delete();
          Auth::guard('web')->logout();
          return response('success',200);
    }
    
    public function del()
    {
        EnrollmentCollege::where('user_id',Auth::id())->delete();

        return response('success',200);
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
                'lastname'=>'required',
                'placeOfBirth'=>'required',
                'dateOfBirth'=>'required',
                'permanentAddress'=>'required',
                'cellphoneNumber'=>'required',
                'course'=>'required',
                'nameOfFather'=>'required',
                'fatherCellphoneNumber'=>'required',
                'nameOfMother'=>'required',
                'motherCellphoneNumber'=>'required',
                'psa'=>'required',
                'goodMoral'=>'required',
                'form137'=>'required',
                'form138'=>'required',
        ]);
        // return $request->nameOfFather;
        // return $request->goodMoral;
        $psa = time().'.'.$request->psa->extension();
        $goodMoral = time().'g.'.$request->goodMoral->extension();
        $form137 = time().'7.'.$request->form137->extension();
        $form138 = time().'8.'.$request->form138->extension();
        $enroll = EnrollmentCollege::create([
            'user_id'=>Auth::id(),
            'firstname'=>ucfirst($request->firstname),
            'lastname'=>ucfirst($request->lastname),
            'middlename'=>ucfirst($request->middlename),
            'placeOfBirth'=>ucwords($request->placeOfBirth),
            'dateOfBirth'=>$request->dateOfBirth,
            'permanentAddress'=>ucwords($request->permanentAddress),
            'cellphoneNumber'=>$request->cellphoneNumber,
            'course'=>$request->course,
            'fatherName'=>ucfirst($request->nameOfFather),
            'fatherCellphoneNumber'=>$request->fatherCellphoneNumber,
            'motherName'=>ucfirst($request->nameOfMother),
            'motherCellphoneNumber'=>$request->motherCellphoneNumber,
            'psa'=>$psa,
            'goodMoral'=>$goodMoral,
            'form137'=>$form137,
            'form138'=>$form138
        ]);

        if($enroll)
        {
             $request->psa->storeAs('public/images',$psa);
             $request->goodMoral->storeAs('public/images',$goodMoral);
             $request->form137->storeAs('public/images',$form137);
             $request->form138->storeAs('public/images',$form138);
        }

        return response('success',201);



        
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'contact'=>'required',
            'studentType'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);

        $user = User::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'middlename'=>$request->middlename,
            'contact'=>$request->contact,
            'studentType'=>$request->studentType,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json('success',201);
    }

    public function userRequest()
    {
        $data = EnrollmentCollege::where('user_id',Auth::id())->first();
        if($data == '')
        {
            $data = '';
        }
        return response()->json($data);
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
    }
}
