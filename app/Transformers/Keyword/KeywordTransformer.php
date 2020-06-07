<?php

namespace App\Transformers\Keyword;

use App\Models\Keyword;
use League\Fractal\TransformerAbstract;

/**
 * Class KeywordTransformer
 * @package App\Transformers\Keyword
 */
class KeywordTransformer extends TransformerAbstract
{
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = resolve('Illuminate\Contracts\Filesystem\Factory');
    }

    /**
     * Transform the User entity.
     *
     * @param Keyword $model
     *
     * @return array
     */
    public function transform(Keyword $model)
    {
        return $model->toArray();
    }
}
