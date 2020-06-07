<?php

namespace App\Services\Keyword;

use App\Exceptions\WebException;
use App\Models\Keyword;
use App\Models\User;
use App\Services\Common\StaticArray;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class KeywordService
{
    /**
     * @param Keyword $service
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_status(Keyword $service, $limit)
    {
        $vouchers = DB::table('vouchers')->where('service_id', $service->id);
        if ($limit) {
            $vouchers = $vouchers->limit($limit);
        }
        return $vouchers->select('voucher_status', DB::raw('count(*) as total'))
            ->groupBy('voucher_status')->get();
    }


    /**
     * @param Keyword $service
     * @param $limit
     * @return Voucher[]|\Illuminate\Database\Eloquent\Builder[]|Collection|Builder[]|\Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_day(Keyword $service, $limit)
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
     * @param Keyword $service
     * @throws WebException
     */
    public static function check_limit(Keyword $service)
    {
        if ($service->max_voucher_numbers &&
            $service->vouchers()->where('voucher_status', StaticArray::VOUCHER_STATUS_USED)->count()
            >= $service->max_voucher_numbers) {
            throw new WebException('Limit reached');
        }
    }

    /**
     * @param User $user
     * @return Keyword[]|Collection
     */
    public static function get_user_services(User $user)
    {
        return $user->services;
    }


    /**
     * @return Keyword[]|Collection
     */
    public static function index()
    {
        return Keyword::get();
    }

    /**
     * @param $data
     * @return Keyword
     * @throws WebException
     */
    public static function store($data)
    {
        $service = new Keyword($data);
        if (!$service->save()) {
            throw new WebException('Save error');
        }
        $service->save();
        return $service;
    }

    /**
     * @param Keyword $service
     * @param $data
     * @return Keyword
     * @throws WebException
     */
    public static function update(Keyword $service, $data)
    {
        $service->fill($data);
        if (!$service->save()) {
            throw new WebException('Save error');
        }
        $service->save();
        return $service;
    }


}
