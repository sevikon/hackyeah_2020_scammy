@extends('layouts.mail')

@section('email_content')
    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr>
        <td align="left"
            style="font-family:Montserrat, Open Sans, Arial, sans-serif; font-size:17px; line-height:22px; color:#000; padding: 20px 0 0 20px;">
            @lang('messages.email_notification_message_title',[
                'USERNAME' => $name
            ])
        </td>
    </tr>

    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr style="padding: 10px">
        <td class="holder" style="padding: 0 10px;">
            <table cellpadding="0" cellspacing="0" width="100%" align="center">
                <tbody>
                <tr align="center" style="text-align: center">
                    <td data-bgcolor="bg-button" data-size="size button"
                        data-min="10" data-max="16" class="btn" align="center"
                        width="100%"
                        style="border-radius:100px; width: 100%; text-align: center"
                        bgcolor="#ffffff">
                        <div class="wrapper" style="display: inline-block; margin: auto;">
                            @foreach($users as $i => $user)
                                @if($i < 5)
                                    <img alt="{{$user->user->username}}"
                                         src="{{\App\Services\Common\AdvancedService::absolute_url($user->user->image)}}"
                                         style="border-radius:40px; border: solid #5C6BC0 3px; width: 60px; height: 60px; float: left;{{$i > 0 ? 'margin-left: -15px;' : ''}}"/>
                                @endif
                            @endforeach
                            @if(count($users) > 5)
                                <div
                                    style="border-radius:40px; border: solid #5C6BC0 3px; width: 60px; height: 60px; margin-left: -15px; display: block;float: left; line-height: 60px;background-color: #ffffff; font-weight: 700; font-size: 20px;">
                                    +{{count($users) - 5}}
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>


    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr>
        <td align="center">
            <a href="{{$link}}">
                <button
                    style="background-color: #5C6BC0; color: #fff; outline: none; border: none; padding: 15px 30px; border-radius: 10px; font-size: 16px; cursor: pointer;">
                    @lang('messages.email_notification_message_button', [
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