<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class addWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if(!$i){
            return;
        }

        $srcPath = storage_path('app/public/' . dirname($i->path) . '/crop_400x400_' . basename($i->path));
        // $srcPath =base_path($i->getUrl(400 , 400)); 

        $image= file_get_contents($srcPath);

      
            $image = SpatieImage::load($srcPath);
            $image->watermark('public\media\PRESTO.IT.png')
                ->watermarkOpacity(40)
                ->watermarkPosition(Manipulations::POSITION_CENTER);

                $image->save($srcPath);
        
    }
}
