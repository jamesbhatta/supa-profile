<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use DB;

class ResourceTemplateController extends Controller
{
    public function create($slug)
    {
        // return $model;
        $resource = Resource::where('slug', $slug)->firstOrFail();
        return view('create-resource', [
            'resource' => $resource
        ]);
    }

    public function store(Request $request, $slug)
    {
<<<<<<< HEAD
        $model = collect(models())->filter(fn ($item) =>  $item['slug'] == $model)->first();
                if (!$model) {
            abort(404, 'Page Not Found');
        }
        // return $model['fields'];
=======
        $model = Resource::where('slug', $slug)->firstOrFail();

>>>>>>> d1fae47e99a18a118bc26cf8a270ef7290e55f70
        $rules = [];
        foreach ($model['fields'] as $field) {
            $rules[$field['name']] = $field['rules'];
        };
        $request->validate($rules);
<<<<<<< HEAD
            }
=======
        return $request->description;

        DB::table($model['slug'])->insert(
            ['title' => $request->title],
            ['description' => $request->description]
        );
    }
>>>>>>> d1fae47e99a18a118bc26cf8a270ef7290e55f70
}
