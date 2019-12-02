@component('mail::message')
    <div class="row">
        <div class="col-lg-4">
            <p>
                {!! 'Subject from : '.$data['subject'] !!}
            </p>
        </div>
        <div class="col-lg-4">
            <p>
                {!! 'Message from : '.$data['name'] !!}
            </p>
        </div>
        <div class="col-lg-4">
            <p>
                {!! 'E-mail : '.$data['email'] !!}
            </p>
        </div>
        <div class="col-lg-4">
            <p>
                {!! 'Message : '.$data['message'] !!}
            </p>
        </div>
    </div>
@endcomponent