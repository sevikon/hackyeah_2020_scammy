@extends('layouts.mail')

@section('email_content')
    <tr>
        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
    </tr>

    <tr style="padding: 10px">
        <td class="holder email-notifications-wrapper" style="padding: 0 10px;">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <p>{{$info_text}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <a href="{{$button_link}}">
                                <button
                                        style="background-color: #5C6BC0; color: #fff; outline: none; border: none; padding: 15px 30px; border-radius: 10px; font-size: 16px; cursor: pointer;">
                                    {{$button_text}}
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" class="em_height" style="padding: 0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <p>{{$warning_text}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ Illuminate\Mail\Markdown::parse($warning_text_down) }}
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