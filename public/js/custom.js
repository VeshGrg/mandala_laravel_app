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

    if(exists('#comment-form')) {
        $('#comment-form').submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.post(this.action, {
                content: formData.get('content'),
                _token: formData.get('_token'),
                article_id: formData.get('article_id'),
            })
            .then(response => {
                $('.comment-listing').append(response);
            })
            .catch(error => {
                alert('Something went wrong!');
                console.log(error);
            })
            .always(() => {
                this.reset();
            });
        });
    }
});