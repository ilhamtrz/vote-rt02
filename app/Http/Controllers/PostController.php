<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View{
        // get post
    $posts = Post::latest()->paginate(5);

    return view('posts.index', compact('posts'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create():View{
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse{
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage ::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    // https://santrikoding.com/tutorial-set/tutorial-laravel-10-untuk-pemula
    // https://santrikoding.com/tutorial-set/tutorial-restful-api-laravel-10
}
