@component('mail::message')
# Company Created

A Company, **Company Name:** {{ $company->name }} has been created...

Regards,<br>
{{ config('app.name') }}
@endcomponent