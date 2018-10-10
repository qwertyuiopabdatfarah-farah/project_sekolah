<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\News;
use App\NewsImage;
use App\User;

class NewsController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        $news = News::all();
        var_dump($news); exit;
          foreach ($news as $new) {
             echo $new->user->name;

          }
        //var_dump($news); exit;
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
    try {
        $news          = new News();
        $news->user_id = $this->user->id;
        $news->judul   = $request->judul;
        $news->isi     = $request->isi;
        $news->save();
        if ($request->hasfile('file_name')) {
            foreach ($request->file('file_name') as $image) {
                $fileName = rand(1, 999).$image->getClientOriginalName();
                $img = Image::make($image->getRealPath());
                $img->resize(120, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->stream();
                Storage::disk('local')->put('public/berita/' . $fileName, $img);
                $news->newsimages()->create([
                'news_id'   => $news->id,
                'file_name' => $fileName,
               ]);
            }
            flash('Berhasil Disimpan')->success();
            return redirect()->back();
            }
         } catch (\Exception $e) {
            flash($e->getMessage())->error();
            return redirect()->back();
         }
    }
}
