<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(){
        return view('front.notes.index');
    }

    public function createPage(){
        return view('front.notes.create');
    }

    public function addNote(Request $request){
        //dd($request->all());
        //dd($request->title);
        //dd(Auth::user()); // dinamikliği sağlar userın tüm bilgilerini gösterir


        //validation: doğrulama

        $request->validate(
            [
                //'doğrulamakİstediğimizKey' => 'Kurallarım'
                //'title' => 'Zorunlu minumum 3 karakter'

                'title' => 'required | min:13 | max:20', //required zorunlu demek
                'content' => 'required'
            ],
            [
                //custom message
                //keyAdı.kuralAdı => 'mesaj',
                'title.required' => 'Başlık yazmayı unutma'
            ]
        );  // doğrulama alanında bir hata bile olsa bu yapı break olur

        //laravel otomatik olarak errors gönderir
        //eğer validate kısmında hata varsa
        //return redirect()->back()->with('errors', 'message');


        // validasyondan geçtiyse
        $note = new Note();
        $note->user_id = Auth::user()->id; //login olan her bir kullanıcının id lerini verir
        $note->title =  $request->title;
        $note->content = $request->content;
        $note->save();

        //return view();
        //return redirect()->back();

        //başarılı giriş
        return redirect()->route('notes.index')->with('success', 'Başarıyla Gönderildi');
    }
}
