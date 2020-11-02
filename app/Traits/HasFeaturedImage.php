<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasFeaturedImage
{
    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateFeaturedImage(UploadedFile $photo)
    {
        tap($this->featured_image, function ($previous) use ($photo) {
            $this->forceFill([
                'featured_image' => $photo->storePublicly(
                    'article-images',
                    ['disk' => $this->featuredImageDisk()]
                ),
            ])->saveQuietly();

            if ($previous) {
                Storage::disk($this->featuredImageDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteFeaturedImage()
    {
        Storage::disk($this->featuredImageDisk())->delete($this->featured_image);

        $this->forceFill([
            'featured_image' => null,
        ])->saveQuietly();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getFeaturedImageAttribute()
    {
        return $this->featured_image
            ? Storage::disk($this->featuredImageDisk())->url($this->featured_image)
            : null;
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function featuredImageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}
