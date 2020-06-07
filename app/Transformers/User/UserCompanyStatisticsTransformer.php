<?php

namespace App\Transformers\User;

use App\Models\Service;
use App\Models\User;
use App\Services\User\UserCompanyService;
use League\Fractal\TransformerAbstract;

/**
 * Class UserCompanyStatisticsTransformer
 * @package App\Transformers\User
 */
class UserCompanyStatisticsTransformer extends TransformerAbstract
{
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = resolve('Illuminate\Contracts\Filesystem\Factory');
    }

    /**
     * Transform
     *
     * @param Service $service
     * @param null $limit
     * @return array
     */
    public function transform(User $user, $limit = null)
    {
        $limit = $limit && is_int($limit) ? $limit : null;
        return [
            'voucher_statistics_day' => UserCompanyService::get_vouchers_statistics_day($user, $limit),
            'voucher_statistics_kind' => UserCompanyService::get_vouchers_statistics_status($user, $limit),
            'statistics' => UserCompanyService::get_vouchers_statistics_general($user),
        ];
    }

}
