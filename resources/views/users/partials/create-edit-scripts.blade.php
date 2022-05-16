<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('partials.form.validation.scripts')
<script>
    $(function() {

        $("ul.navbar-nav > a").on("click", function () {
            let url = $(this).attr("href");
            window.location = url;
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let form = $('#payment-system-main-form');
        form.parsley();

        let pageHeaderNav = $('.nav');

        $('.tab-pane').hide();
        pageHeaderNav.find('.page-header-tab:first').addClass('active');
        $('.nav a').click(function() {
            $('.tab-pane').hide();
            var index = $(this).parent().index();
            $('.tab-pane').eq(index).show();
        })
        $('.tab-pane:first').show();

        $('.register').on('click', function (){
            let dataToggleVal = $(this).attr('data-toggle');
            if(dataToggleVal === 'dropdown'){
                //let url = $(this).attr('href');
                let url = document.location.origin+'/users/create';
                window.location.href= url;
            }
        })

        $('#phone').usPhoneFormat({
            format: '(xxx) xxx-xxxx',
        });

        $('#yourphone2').usPhoneFormat();


    });
</script>
