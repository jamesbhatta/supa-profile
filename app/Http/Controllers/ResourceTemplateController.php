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
        $model = Resource::where('slug', $slug)->firstOrFail();

        $rules = [];
        foreach ($model['fields'] as $field) {
            $rules[$field['name']] = $field['rules'];
        };
        $request->validate($rules);
        return $request->description;

        DB::table($model['slug'])->insert(
            ['title' => $request->title],
            ['description' => $request->description]
        );
    }
}
