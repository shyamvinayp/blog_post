<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('partials.form.validation.scripts')
<script>
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let form = $('#demo-main-form');
        form.parsley();

    });
</script>
