<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        return view('resource.index', [
            'resources' => Resource::get()
        ]);
    }

    public function create()
    {
        return $this->showResourceForm(new Resource());
    }

    public function store(Request $request)
    {
        $request->validate([
            'display_name' => 'required',
            'slug' => 'required',
            'description' => 'nullable'
        ]);

        Resource::create([
            'display_name' => $request->display_name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        return redirect()->route('resources.index')->with('success', 'New resource added.');
    }

    public function edit($slug)
    {
        $resource = Resource::where('slug', $slug)->firstOrFail();
        return $this->showResourceForm($resource);
    }

    private function showResourceForm(Resource $resource)
    {
        $updateMode = false;
        if ($resource->exists) {
            $updateMode = true;
        }

        return view('resource.form', [
            'resource' => $resource,
            'updateMode' => $updateMode
        ]);
    }

    public function saveFields(Request $request, $slug)
    {
        $resource = Resource::where('slug', $slug)->firstOrFail();

        $request->validate([
            'fields.*.label' => 'required',
            'fields.*.name' => 'required',
            'fields.*.type' => 'required',
            'fields.*.is_required' => 'nullable|boolean',
        ]);

        $data = [];
        foreach ($request->fields as $field) {
            $data[] = [
                'label' => $field['label'],
                'name' => $field['name'],
                'type' => $field['type'],
                'is_required' => $field['is_required'] ? true : false,
            ];
        }

        $resource->fields = $data;
        $resource->save();

        return 'Done';
    }
}
