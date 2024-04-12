(function ($) {
    'use strict';

    // Datepicker for purchase date field
    $(document).ready(function () {
        $('#purchase_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });

    // Textarea auto-resize
    $(document).ready(function () {
        autoResizeTextarea();
        $('textarea').on('input', autoResizeTextarea);
    });

    function autoResizeTextarea() {
        $('textarea').each(function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }

})(jQuery);