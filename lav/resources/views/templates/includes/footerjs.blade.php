<!-- Jquery minified -->
<script type="text/javascript" src="/js/jquery-{{ config('html.jquery_version')  }}.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="/assets/bootstrap/{{config('html.bootstrap_version')}}/js/bootstrap.min.js"></script>
<!-- Compiled and minified JavaScript Validation Plugin -->
<script src="/assets/jquery-validation/{{config('html.jquery_validation_version')}}/jquery.validate.min.js"></script>
<script src="/assets/jquery-validation/{{config('html.jquery_validation_version')}}/additional-methods.min.js"></script>
<!-- BLOCK UI -->
<script src="/assets/blockUI/{{config('html.blockUI_version')}}/jquery.blockUI.js"></script>
<!-- NOTY -->
<script src="/assets/noty/{{config('html.noty_version')}}/packaged/jquery.noty.packaged.min.js"></script>
<!-- MAIN AND GENERAL SCRIPTS -->
<script src="/js/general.js"></script>
<script type="text/javascript">
    /**
     * Init document ready
     */
    $( document).ready(function(e){
        $(".form_validate").validate({
            lang: '{{ config('app.locale')  }}'
        });
    });

</script>