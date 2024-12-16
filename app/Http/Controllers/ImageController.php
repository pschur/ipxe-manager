<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use stdClass;

class ImageController extends Controller
{
    private function rules(Request $request) {
        return [
            'name' => ['string', 'required'],
            'family' => ['string', 'nullable'],
            'type' => ['string', Rule::in(['local', 'remote'])],
            'path' => ['string', ($request->post('type') === 'remote') ? 'url:http,https' : 'file'],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $images = Image::query();
        $families = Image::query()->select('family')->distinct()->get()->pluck('family');

        if ($request->has('family')) {
            $images->where('family', $request->family);
        }

        if ($request->has('name')) {
            $images->where('name', 'LIKE', '%'.$request->name.'%');
        }

        return view('images.index', [
            'images' => $images->get(),
            'families' => $families
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!$request->has('type')) {
            return view('images.create-select');
        }

        if ($request->get('type') === 'local'){
            abort('500', 'Sorry but this function is not implemented yet.');
        }

        if (!in_array($request->get('type'), ['local', 'remote'])) {
            return redirect()->route('images.create');
        }

        return view('images.form', [
            'type' => $request->get('type'),
            'image' => new Image(),
            'config' => (object) [
                'title' => __('Create :resource', ['resource' => __('Image')]),
                'action' => route('images.store'),
                'method' => 'POST'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules($request));

        $data = Image::create($request->only(['name', 'family', 'path', 'type']));

        return redirect()->route('images.show', $data)->with('success', __(':resource created.', ['resource' => __('Image')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.form', [
            'type' => $image->type,
            'image' => $image,
            'config' => (object) [
                'title' => __('Edit :resource', ['resource' => __('Image')]),
                'action' => route('images.update', $image),
                'method' => 'PUT'
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $request->validate($this->rules($request));

        $image->update($request->only(['name', 'family', 'path', 'type']));

        return redirect()->route('images.show', $image)->with('success', __(':resource updated.', ['resource' => __('Image')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('images.index')->with('success', __(':resource deleted.', ['resource' => __('Image')]));
    }

    public function get_image_url(Image $image) {
        if ($image->type === 'remote'){
            return redirect($image->path);
        }

        if ($image->type === 'local') {
            return '';
        }

        return '';
    }
}
