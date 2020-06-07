@extends('layouts.mail')

@section('email_content')
    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>
    <tr>
        <td align="center"
            style="font-family:Montserrat, Open Sans, Arial, sans-serif; font-size:22px; line-height:32px; color:#080611;font-weight: 700">
            @lang('messages.email_notifications_title')
        </td>
    </tr>

    @foreach($notifications as $notification)

        <tr style="padding: 10px">
            <td class="holder email-notifications-wrapper" style="padding: 0 10px;">
                <table cellpadding="0" cellspacing="0" width="100%" style="border-bottom: solid #C5CAE9 1px">
                    <tbody>
                    <tr>
                        <td width="15%" style="padding-left: 4%">
                            <table>
                                <tbody>
                                <tr>
                                    <td data-bgcolor="bg-button" data-size="size button"
                                        data-min="10" data-max="16" class="btn" align="center"
                                        style="border-radius:50px;"
                                        bgcolor="#ffffff">
                                        <img
                                            src="{{\App\Services\Common\NotificationService::get_notification_user_avatar($notification, $link)}}"
                                            alt=""
                                            style="border-radius:50px; border: solid #5C6BC0 2px; width: 50px; height: 50px;"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="85%" style="padding: 20px; word-break: break-word;">
                            <table cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr style="margin-bottom: 10px">
                                    <td style="color: #5C6BC0; font-weight: 700">
                                        <p style="line-height: 30px;">{{\App\Services\Common\NotificationService::get_notification_user_full_name($notification)}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>{!!\App\Services\Common\NotificationService::get_notification_desc($notification)!!}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>

    @endforeach


    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center">
            <a href="{{$link}}">
                <button
                    style="background-color: #5C6BC0; color: #fff; outline: none; border: none; padding: 15px 30px; border-radius: 10px; font-size: 16px; cursor: pointer;">
                    @lang('messages.email_notifications_button', [
                        'APP_NAME' => \App\Services\Common\AdminConfigService::get_config('APP_NAME')
                    ])
                </button>
            </a>
        </td>
    </tr>

    <tr>
        <td align="left"
            style="font-family:Montserrat, Open Sans, Arial, sans-serif; font-size:17px; line-height:22px; color:#000; padding: 20px 0 0 20px;">
            @lang('messages.email_regards')
        </td>
    </tr>
    <tr>
        <td align="left"
            style="font-family:Montserrat, Open Sans, Arial, sans-serif; font-size:17px; line-height:22px; color:#000; padding: 10px 20px;">
            @lang('messages.email_team', [
                'TEAM' => \App\Services\Common\AdminConfigService::get_email_team_name()
            ])
        </td>
    </tr>
    <tr>
        <td height="14" class="em_height" style="padding: 10px;">&nbsp;</td>
    </tr>
@endsection