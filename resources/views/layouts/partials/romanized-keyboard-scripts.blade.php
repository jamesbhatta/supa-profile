<script src="{{ asset('assets/js/pramukh-ime.js') }}"></script>
<script src="{{ asset('assets/js/romanized-devnagari.js') }}"></script>
<script>
    $(function() {
        // F9 toggles language
        pramukhIME.addLanguage(PramukhIndic, "nepali");
        // pramukhIME.enable();

        $('#romanized-keyboard').change(function() {
            console.log('changed');
            if ($(this).prop('checked')) {
                pramukhIME.enable();
                console.log('Romanized keyboard enabled');
            } else {
                pramukhIME.disable();
                console.log('Romanized keyboard disabled');
            }
        });
    });

</script>
