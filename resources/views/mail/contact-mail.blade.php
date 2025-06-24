@component('mail::message')
    - **Details**:
    - **Name**: {{ $data->name }}
    - **Email**: {{ $data->email }}
    - **Phone no.**: {{ $data->phone }}
    - **Message**: {{ $data->message }}
@endcomponent
