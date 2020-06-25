tinymce.PluginManager.add('wdm_mce_button', function( editor, url ) {
    editor.addButton('wdm_mce_button', {
                text: 'Payment Methods',
                icon: false,
                onclick: function() {
                  // change the shortcode as per your requirement
                   editor.insertContent('[payment_methods]');
               }
      });
});