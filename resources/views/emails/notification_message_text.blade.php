@lang('messages.email_notification_message_title',['USERNAME' => $name])
@lang('messages.email_notification_message_unread_messages',['COUNT' => $groups])
@lang('messages.email_notification_message_button', ['APP_NAME' => \App\Services\Common\AdminConfigService::get_config('APP_NAME')]) {{$link}}
@lang('messages.email_regards')
@lang('messages.email_team', [
    'TEAM' => \App\Services\Common\AdminConfigService::get_email_team_name()
])