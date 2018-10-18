<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use App\News;
use Yajra\DataTables\DataTables;
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


    public function getDataid()
    {
        $news = News::with(['user' => function($query) {
                 $query->where('id', $this->user->id);
                }])->get(); 
            return Datatables::of($news)
                  ->addColumn('action', function ($news) {
                          return '
                          <div style="text-align: center">
                          
                              <a class="btn btn-success btn-xs" href="'.route('news.edit', $news->id) .'">
                                    <i class="fa fa-pencil"></i> Edit</a>

                               <a class="btn btn-info btn-xs" href="'.route('news.show', $news->id) .'">
                               <i class="fa fa-search"></i>Show</a>

                               <form onsubmit= "return ConfirmDelete()" action="' .route('news.destroy', $news->id). '" method="POST" accept-charset="UTF-8" style="display: inline;">
                                 <input name="_method" type="hidden" value="DELETE">
                                 <input name="_token" type="hidden" value="'.csrf_token().'"> 
                                 <button type="submit" value="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</button>
                                </form>

                          </div>'; 
                     })
                  ->rawColumns(['action'])
                  ->addIndexColumn()
                  ->make(true);
    }

    public function getDataall()
    {
       $news = News::with(['user'])->get(); 
    }

    public function indexId()
    {
      return view('news.indexid');       
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
                $fileName = rand(1, 99999).$image->getClientOriginalName();
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
