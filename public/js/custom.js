$(function() {
    'use strict';

    /** Does element exists */
    let exists = selector => $(selector).length > 0;

    $('.alert').alert();

    if(exists('#profile-img')) {
        $('#profile-img').change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = e => document.getElementById('picture-preview').src = e.target.result;
                reader.readAsDataURL(this.files[0]);
            }
        });
    }
});