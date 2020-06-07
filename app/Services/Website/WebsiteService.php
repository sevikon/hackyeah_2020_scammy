<?php

namespace App\Services\Website;

use App\Exceptions\WebException;
use App\Models\Website;
use App\Models\User;
use App\Services\Common\StaticArray;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class WebsiteService
{
    /**
     * @param Website $service
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_status(Website $service, $limit)
    {
        $vouchers = DB::table('vouchers')->where('service_id', $service->id);
        if ($limit) {
            $vouchers = $vouchers->limit($limit);
        }
        return $vouchers->select('voucher_status', DB::raw('count(*) as total'))
            ->groupBy('voucher_status')->get();
    }


    /**
     * @param Website $service
     * @param $limit
     * @return Voucher[]|\Illuminate\Database\Eloquent\Builder[]|Collection|Builder[]|\Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_day(Website $service, $limit)
    {
        $vouchers = DB::table('vouchers')->where('service_id', $service->id);
        if ($limit) {
            $vouchers = $vouchers->limit($limit);
        }
        return $vouchers->select(DB::raw('date_trunc(\'day\', created_at)::date as created_at'), DB::raw('count(*) as total'))
            ->groupBy('created_at')
            ->get()
            ->sortBy(function ($product) {
                return $product->created_at;
            })
            ->values()->all();
    }

    /**
     * @param Website $service
     * @throws WebException
     */
    public static function check_limit(Website $service)
    {
        if ($service->max_voucher_numbers &&
            $service->vouchers()->where('voucher_status', StaticArray::VOUCHER_STATUS_USED)->count()
            >= $service->max_voucher_numbers) {
            throw new WebException('Limit reached');
        }
    }

    /**
     * @param User $user
     * @return Website[]|Collection
     */
    public static function get_user_services(User $user)
    {
        return $user->services;
    }


    /**
     * @return Website[]|Collection
     */
    public static function index()
    {
        return Website::get();
    }

    /**
     * @param $data
     * @return Website
     * @throws WebException
     */
    public static function store($data)
    {
        $service = new Website($data);
        if (!$service->save()) {
            throw new WebException('Save error');
        }
        $service->save();
        return $service;
    }

    /**
     * @param Website $service
     * @param $data
     * @return Website
     * @throws WebException
     */
    public static function update(Website $service, $data)
    {
        $service->fill($data);
        if (!$service->save()) {
            throw new WebException('Save error');
        }
        $service->save();
        return $service;
    }


}
