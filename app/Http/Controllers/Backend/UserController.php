<?php



namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                ->select()
                ->get();
        return view('user.index', compact('users'));
    }

    
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
            'name'=>'required|max:255',
            'email'=>'required|max:255|email|unique:users',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'

            ],[
            'name.required'=>'Bạn chưa nhập tên',    
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Xin mời nhập lại',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
         
           
            ]);
 
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->isAdmin=$request->isAdmin;
        $user->save();
        Session::flash('success','User created successfully');
        return redirect()->route('users.index');
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
        $user = DB::table('users')
            ->select()
            ->where('id',$id)
            ->get();
    
        return view('user.edit', compact('user'));
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
     
        $this->validate($request,[
            
            'name'=>'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'

            ],[
            'name.required'=>'Bạn chưa nhập tên',    
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Xin mời nhập lại',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',

            ]);

    $user = user::find($id);
 
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->isAdmin=$request->isAdmin;
            $user->save();
            Session::flash('success','User created successfully');
      
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
       $user = user::find($id)->delete();

       
        return redirect()->route('users.index');
    }
}
