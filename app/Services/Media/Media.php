<?php

namespace App\Services\Media;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Media
{
    protected $fileName;

    protected $directory;

    protected $request;
    protected $model;

    public function __construct(Request $request, string $fileName, string $directory, ?Model $model = null)
    {
        $this->fileName = $fileName;
        $this->directory = $directory;
        $this->request = $request;
        $this->model = $model;
    }

    public function make(): ?string
    {
        $fileName = null;
        if($this->request->file($this->fileName)) {
            if ($this->model){
                $this->deleteFile();
            }

            $fileName = pathinfo($this->request->file($this->fileName)->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $this->request->file($this->fileName)->getClientOriginalExtension();
            $this->request->file($this->fileName)->move(public_path($this->directory), $fileName);
        }
        return (is_null($fileName) && $this->model) ? $this->model->{$this->fileName} : $fileName;
    }

    public function deleteFile()
    {
        File::delete(public_path($this->directory . '/' . $this->model->{$this->fileName}));
    }
}
