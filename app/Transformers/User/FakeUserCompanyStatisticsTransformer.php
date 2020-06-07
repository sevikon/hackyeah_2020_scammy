<?php

namespace App\Transformers\User;

use App\Models\Service;
use App\Models\User;
use App\Services\User\UserCompanyService;
use League\Fractal\TransformerAbstract;

/**
 * Class FakeUserCompanyStatisticsTransformer
 * @package App\Transformers\User
 */
class FakeUserCompanyStatisticsTransformer extends TransformerAbstract
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
    public function transform($limit = null)
    {
        /** @var User $user */
        $user = User::where('id', Service::inRandomOrder()->first()->user_id)->first();
        $limit = $limit && is_int($limit) ? $limit : null;
        return [
            'voucher_statistics_day' => UserCompanyService::get_vouchers_statistics_day($user, $limit),
            'voucher_statistics_kind' => UserCompanyService::get_vouchers_statistics_status($user, $limit),
        ];
    }

}
