<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\UserConfig;
use App\User;
use App\Profile;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveConfig(Request $request)
    {

        
        // $user = Auth::user();
        $name = $request->get('name');
        $value = $request->get('value');

        saveUserConfig($name,$value);
        
        // $userConfig = UserConfig::firstOrNew(['user_id' => $user->id,'name' => $name]);
        // $userConfig->timestamps = false;
        // $userConfig->user_id = $user->id;
        // $userConfig->name = $name;
        // $userConfig->value = $value;
        // $userConfig->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    public function addUser(Request $request)
    {  
        $item = new User;
        $item->id = 0;

        justForGods();

        $availableProfiles = Profile::all();

        return view('admin.user.profile',[
            'item'=>$item,
            'availableProfiles'=>$availableProfiles
        ]);
    }


    public function listUsers(Request $request)
    {

        // $items = [];

        $me = Auth::user();

        $query = User::where('id', '<>', $me->id)->orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('name', 'like' ,"%{$request->input('q')}%")->orWhere('email', 'like', "%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());



        justForGods();

        return view('admin.user.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }



    // Mostrar pantalla de perfil del usuario
    public function editProfile($id = 0, Request $request)
    {

        justForGods();

        if($item = User::find($id)){

        }
        else{
            $item = Auth::user();
        }

        $availableProfiles = Profile::all()->diff($item->profiles);

        return view('admin.user.profile',['item'=>$item, 'availableProfiles'=>$availableProfiles]);
    }


    public function patchProfile(Request $request)
    {

        justForGods();


        $id = $request->get('id');


        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:user,email,' . $id,
            'name' => 'required|max:200',
            // 'password' => 'nullable|string|min:6|confirmed',
            // 'layout' => 'required',
        ],[ 
            'email.required' => 'El E-mail es requerido',
            'email.unique' => 'El E-mail ya existe en el sistema',           
            'name.required' => 'El nombre esta vacio vamoosss',
            'name.max' => 'El nombre no debe tener mas de 200 caracteres',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }


        if($id==0){
            $item = new User;

            $item->password = \Hash::make($request->get('email')); // el password inicial es el mismo mail
    
        }
        else{
            $item = User::find($id);
        }


        $item->email = $request->get('email');
        $item->name = $request->get('name');

        $item->god = $request->get('god')=="1"?1:0;

        $item->save();

        $profiles = explode(',',$request->get('profiles'));
        if(sizeof($profiles)>0 && $profiles[0] > 0  ){
            $item->profiles()->sync($profiles);
        }
        else{
            $item->profiles()->sync([]);;
        }
        
        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


    

    public function deleteUser($id = 0, Request $request)
    {

        justForGods();

        if($item = User::find($id)){
            $item->delete();
        }
      
        return $this->listUsers($request);
    }




    public function editPassword($id = 0, Request $request)
    {

        if($item = User::find($id)){

        }
        else{
            $item = Auth::user();
        }

        return view('admin.user.password',['item'=>$item]);
    }


    public function patchPassword($id = 0, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ],[
            'password.required' => 'Debe ingresar la nueva contraseña',
            'password.string' => 'La contraseña tiene caracteres no permitidos',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden. Volvé a escribirlas',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }

        $item = User::find($id);
        $item->password = \Hash::make($request->get('password'));
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


}
