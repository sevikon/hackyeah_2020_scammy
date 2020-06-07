<?php

namespace App\Transformers\Voucher;

use App\Models\Voucher;
use League\Fractal\TransformerAbstract;

/**
 * Class VoucherGuestTransformer
 * @package App\Transformers\Service
 */
class VoucherGuestTransformer extends TransformerAbstract
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
        $model->setHidden([
            'user'
        ]);
        $data = $model->toArray();
        $data['service'] = $model->service;
        return $data;
    }
}
