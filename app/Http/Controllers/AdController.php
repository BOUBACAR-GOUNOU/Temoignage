<?php

namespace Laravel\Http\Controllers;

use Laravel\Ad;
use Laravel\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Http\Requests\AdStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdController extends Controller
{   
    use RegistersUsers;

    public function __construct(){
        setLocale(LC_TIME,'fr_FR');
    }
    

    public function index()
    {
       /*  $ads = DB::table('ads')->orderBy('Created_at', 'DESC')->paginate(10); */
        $ads = DB::table('users') ->join('ads', 'users.id', 'ads.user_id')->orderBy('ads.Created_at', 'DESC')->paginate(10);
        return view('ads', compact('ads'));
    }

    public function create()
    {
         $ad = new Ad();
        return view('create', compact('ad'));
    }

    public function store(AdStore $request )
    {
        $validated = $request->validated();

        if(!Auth::check())
        {
            $request->validate([
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);

           $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $this->guard()->login($user);

        }

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->user_id = auth()->user()->id;
        $ad->save();
        
        /* flash(sprintf('Temoignage #%s ajouter avec success', $ad->id)); */
        flashy(sprintf('Temoignage #%s ajouter avec success', $ad->id));

        return redirect()->route('ad.index');
        
      
    }

    public function search(Request $request)
    {
        $words = $request->words;

        $ads = DB::table('ads')
            ->where('title', 'LIKE', "%$words%")
            ->orWhere('description', 'LIKE', "%$words%")
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json(['success' => true, 'ads' => $ads]);
        
    }

     public function edit(Ad $ad)
    {
        return view('edit', compact('ad'));
    }

   public function update(Ad $ad)
    {   $data = request()->validate([
            'title'=> 'required',
            'description' => 'required',
        ]);
        $ad->update($data);
        flashy(sprintf('Temoignage #%s modifié avec success', $ad->id));
        return redirect('home');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        flashy(sprintf('Temoignage #%s supprimé avec success', $ad->id));
        return redirect('home');

    }

    
}
