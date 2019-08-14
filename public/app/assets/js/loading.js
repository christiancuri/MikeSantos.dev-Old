(function($){
    $.Loading = {
        lastSpinner: null,
        show: (text) => {
            if(this.lastSpinner != null) return false;
            this.lastSpinner = $('#status').html();
            $('#status').html(this.lastSpinner + (text || '') );
            $('body').delay(350).css({'overflow':'hidden'}); //will hide body content
            $('#preloader').delay(350).fadeIn('slow'); // will fade in the loader background
            $('#status').fadeIn(); // will fade in the loading animation
        },
        hide: () => {
            if(this.lastSpinner == null) return false;
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
            $('#status').html(this.lastSpinner);
            this.lastSpinner = null;
        }
    }
})(jQuery);
