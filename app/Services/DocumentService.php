<?php

namespace App\Services;

use App\Document;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    public function find($id)
    {
        return Document::findOrFail($id);
    }

    public function createMany($data)
    {
        Log::info($data);

        return Document::insert($data);
    }

    public function upload($uploadedDocuments, $oragnizationId)
    {
        $dir = config('constants.document.dir_name')
            . '/'
            . date('Y')
            . '/'
            . date('M');

        $documents = array();

        foreach ($uploadedDocuments as $document) {
            $imagePath = Storage::putFile($dir, $document['document']);
            $name = $document['name'] ?: basename($imagePath);
            array_push($documents, [
                'name' => $name,
                'path' => $imagePath,
                'organization_id' => $oragnizationId
            ]);
        }

        $this->createMany($documents);

        return true;
    }

    public function unlinkDocument($document)
    {
        if (Storage::exists($document->path)) {
            Storage::delete($document->path);
        }
    }
}
