<?php

namespace App\Services\User;

use App\Models\Service;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class UserCompanyService
{
    public static function get_vouchers_statistics_general(User $user)
    {

        $start = Carbon::now()->startOfMonth();

        $this_month_vouchers = Voucher::whereIn('service_id', Service::whereUserId($user->id)->get()->pluck('id'))
            ->where('created_at', '>=', $start)
            ->count();
        $total_vouchers = Voucher::whereIn('service_id', Service::whereUserId($user->id)->get()->pluck('id'))
            ->count();

        $this_month_incomes = 0;
        $total_incomes = 0;

        $this_month_orders = $this_month_vouchers;
        $total_orders = $total_vouchers;

        return [
            'this_month_vouchers' => $this_month_vouchers,
            'this_month_incomes' => $this_month_incomes,
            'this_month_orders' => $this_month_orders,
            'total_vouchers' => $total_vouchers,
            'total_incomes' => $total_incomes,
            'total_orders' => $total_orders,
        ];
    }

    /**
     * @param User $user
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_status(User $user, $limit)
    {
        $vouchers = DB::table('vouchers')->whereIn('service_id', Service::whereUserId($user->id)->get()->pluck('id'));
        if ($limit) {
            $vouchers = $vouchers->limit($limit);
        }
        return $vouchers->select('voucher_status', DB::raw('count(*) as total'))
            ->groupBy('voucher_status')->get();
    }


    /**
     * @param User $user
     * @param $limit
     * @return Voucher[]|\Illuminate\Database\Eloquent\Builder[]|Collection|Builder[]|\Illuminate\Support\Collection
     */
    public static function get_vouchers_statistics_day(User $user, $limit)
    {
        $vouchers = DB::table('vouchers')->whereIn('service_id', Service::whereUserId($user->id)->get()->pluck('id'));
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

}