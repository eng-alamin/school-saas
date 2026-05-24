<?php

namespace App\Helpers;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TenantFileHelper
{
    public static function store(TemporaryUploadedFile $file, string $folder): string
    {
        $filename  = time() . '.' . $file->getClientOriginalExtension();
        $destPath  = public_path('tenants/' . tenant('id') . '/' . $folder);
        $source    = base_path('storage/app/public/livewire-tmp/' . $file->getFilename());

        if (!file_exists($destPath)) {
            mkdir($destPath, 0755, true);
        }

        file_put_contents($destPath . '/' . $filename, file_get_contents($source));

        return 'tenants/' . tenant('id') . '/' . $folder . '/' . $filename;
    }
}