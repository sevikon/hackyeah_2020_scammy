<?php

namespace App\Transformers\Website;

use App\Models\Website;
use League\Fractal\TransformerAbstract;

/**
 * Class WebsiteTransformer
 * @package App\Transformers\Website
 */
class WebsiteTransformer extends TransformerAbstract
{
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = resolve('Illuminate\Contracts\Filesystem\Factory');
    }

    /**
     * Transform the User entity.
     *
     * @param Website $model
     *
     * @return array
     */
    public function transform(Website $model)
    {
        return $model->toArray();
    }
}
