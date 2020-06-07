<?php

namespace App\Transformers\Voucher;

use App\Models\Voucher;
use League\Fractal\TransformerAbstract;

/**
 * Class VoucherTransformer
 * @package App\Transformers\Service
 */
class VoucherTransformer extends TransformerAbstract
{
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = resolve('Illuminate\Contracts\Filesystem\Factory');
    }

    /**
     * Transform the User entity.
     *
     * @param Voucher $model
     *
     * @return array
     */
    public function transform(Voucher $model)
    {
        $data = $model->toArray();
        $data['user'] = $model->user;
        $data['service'] = $model->service;
        return $data;
    }
}
