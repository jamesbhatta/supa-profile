<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceTemplateController extends Controller
{
    public function create($model)
    {
        $model = collect(models())->filter(fn ($item) =>  $item['slug'] == $model)->first();
        if (!$model) {
            abort(404, 'Page Not Found');
        }
        return view('create-resource', [
            'model' => $model
        ]);
    }

    public function store(Request $request, $model)
    {
        $model = collect(models())->filter(fn ($item) =>  $item['slug'] == $model)->first();
        if (!$model) {
            abort(404, 'Page Not Found');
        }
        // return $model['fields'];
        $rules = [];
        foreach ($model['fields'] as $field) {
            $rules[$field['name']] = $field['rules'];
        };
        $request->validate($rules);

        return $request;
    }
}
