
    var set_locale_to = function(locale) {
      if (locale) {
        $.i18n().locale = locale;
      }
      $('body').i18n();
    };

    jQuery(function() {
      $.i18n().load( {
        'en': './js/i18n/en.json',
        'ukr': './js/i18n/ukr.json'
      } ).done(function() {
        set_locale_to(url('?locale'));

        History.Adapter.bind(window, 'statechange', function(){
          set_locale_to(url('?locale'));
        });

        $('.switch-locale').on('click', 'a', function(e) {
          e.preventDefault();
          History.pushState(null, null, "?locale=" + $(this).data('locale'));
        });
      });
    });
