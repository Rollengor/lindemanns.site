<!DOCTYPE html>
<html lang="{{ config('app.fallback_locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ __('public.new_contact', [], config('app.fallback_locale')) }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f6f6f6; font-size: 14px;">
<div>
    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <td>
                <table style="width: 100%; max-width: 600px; border-collapse: collapse; margin: 2em auto; background-color: #ffffff; font-size: 14px; font-family: Arial, sans-serif;">
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 20px; text-align: center;">
                            <h3 style="margin: 0; text-transform: uppercase;">{{ __('public.new_contact', [], config('app.fallback_locale')) }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 20px 0; text-align: center;">
                            <p style="margin-bottom: .5em;"><strong>{{ __('base.full_name', [], config('app.fallback_locale')) }}</strong></p>
                            <p style="margin-top: .5em;">{{ data_get($data, 'first_name') }} {{ data_get($data, 'last_name') }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 20px; text-align: center;">
                            <p style="margin-bottom: .5em;"><strong>{{ __('base.phone_number', [], config('app.fallback_locale')) }}</strong></p>
                            <p style="margin-top: .5em;"><a href="tel:{{ get_only_numbers(data_get($data, 'phone')) }}">{{ data_get($data, 'phone') }}</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 20px 10px; text-align: center;">
                            <p style="margin-bottom: .5em;"><strong>{{ __('base.email', [], config('app.fallback_locale')) }}</strong></p>
                            <p style="margin-top: .5em;"><a href="mailto:{{ data_get($data, 'email') }}">{{ data_get($data, 'email') }}</a></p>
                        </td>
                    </tr>
                    <tr style="border-top: 1px solid #ddd;">
                        <td style="padding: 20px; text-align: center; text-transform: uppercase;">
                            <p><strong>{{ config('app.name') }}</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
