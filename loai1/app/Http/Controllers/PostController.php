<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $posts = Post::orderByDesc('post_id')->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'post_Name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm quy tắc cho hình ảnh
            'phone' => 'required',
        ]);
        $post = new post();
        $post->post_Name = $validator['post_Name'];
        $post->gender = $validator['gender'];
        $post->birthday = $validator['birthday'];
        $post->phone = $validator['phone'];


        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
        } else {
            $imagePath = null; // Nếu không có tệp hình ảnh được tải lên, đặt giá trị là null
        }
        $post->image = $imagePath; // Lưu đường dẫn hình ảnh vào cột 'image'


        $post->save();
        return redirect()->route('posts.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $posts = Post::all();
        return view('posts.edit', compact('post', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $post_id)
    {
        $validator = $request->validate([
            'post_Name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ]);
        $post = post::find($post_id);
        $post->post_Name = $validator['post_Name'];
        $post->gender = $validator['gender'];
        $post->birthday = $validator['birthday'];
        $post->phone = $validator['phone'];

        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            // Xóa hình ảnh cũ nếu có
            if (strpos($post->image, 'images') === 0) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $imagePath; // Lưu đường dẫn hình ảnh vào cột 'image'
        }


        $post->save();
        return redirect()->route('posts.index')->with('success', 'Chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Xóa thành công');
    }
}
