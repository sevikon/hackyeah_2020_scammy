<?php

namespace App\Transformers\User;

use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserCompanyTransformer
 * @package App\Transformers\Service
 */
class UserCompanyTransformer extends TransformerAbstract
{
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = resolve('Illuminate\Contracts\Filesystem\Factory');
    }

    /**
     * Transform the User entity.
     *
     * @param User $model
     *
     * @return array
     */
    public function transform(User $user)
    {
        $data = $user->toArray();
        $data['services'] = $user->services;
        return $data;
    }
}
