<?php

namespace App\Transformers\Website;

use App\Models\Service;
use App\Services\Website\WebsiteService;
use League\Fractal\TransformerAbstract;

/**
 * Class ServiceVoucherStatisticsTransformer
 * @package App\Transformers\Service
 */
class ServiceVoucherStatisticsTransformer extends TransformerAbstract
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
    public function transform(Service $service, $limit = null)
    {
        $limit = $limit && is_int($limit) ? $limit : null;
        return [
            'voucher_statistics_day' => $this->get_vouchers_statistics_day($service, $limit),
            'voucher_statistics_kind' => $this->get_vouchers_statistics_kind($service, $limit),
        ];
    }

    protected function get_vouchers_statistics_day($service, $limit)
    {
        return WebsiteService::get_vouchers_statistics_day($service, $limit);
    }

    protected function get_vouchers_statistics_kind($service, $limit)
    {
        return WebsiteService::get_vouchers_statistics_status($service, $limit);
    }
}
