{{--@dd($mailBody);--}}
{{--<!DOCTYPE html>
<html>
<head>
    <title>scamblock.rangetelecom.com/</title>
</head>
<body>
   {{ isset($mailBody) ? $mailBody : null }}
</body>
</html>--}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <title>scamblock.rangetelecom.com/</title>
                <div class="card-body">
                        {{--You are receiving this email because we received a password reset request from your account--}}
                    <p> {!! isset($mailBody) ? html_entity_decode($mailBody) : null !!}</a></p>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>
