@component('mail::message')
# Introduction

{{$receipe->name}}
The receipe has been stored.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
