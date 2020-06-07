@lang('messages.email_notifications_title')
@foreach($notifications as $notification)
    {{\App\Services\Common\NotificationService::get_notification_user_full_name($notification)}}
    {!!\App\Services\Common\NotificationService::get_notification_desc($notification, true)!!}
@endforeach
@lang('messages.email_notifications_button', ['APP_NAME' => \App\Services\Common\AdminConfigService::get_config('APP_NAME')]) {{$link}}
@lang('messages.email_regards')
@lang('messages.email_team', [
    'TEAM' => \App\Services\Common\AdminConfigService::get_email_team_name()
])