
/** Does element exists */
$.fn.exists = () => $(this).length > 0;

/** Dissmissable Alert */
$('.alert').alert();

/** Drag and Drop File Upload */
$('.dropify').dropify();

/** Toast Config */
$('.toast').toast({delay: 10000});

/** Upload Image Preview */
let profileImg = $('#profile-img');
let profilePreview = $('#picture-preview');

if(profileImg.exists()) {
    profileImg.change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = e => profilePreview.attr('src', e.target.result);
            reader.readAsDataURL(this.files[0]);
        }
    });
}

/** Ajax Post Comment Submit */
let commentForm = $('#comment-form');
let commentFormButton = $('#comment-form').find('button[type=submit]');
let commentListing = $('#comment-listing');

if(commentForm.exists()) {
    commentForm.submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        commentFormButton.attr('disabled', true);

        $.post(this.action, {
            _token: formData.get('_token'),
            article_id: formData.get('article_id'),
            content: formData.get('content'),
        })
        .then(response => {
            commentListing.append(response);
        })
        .catch(error => {
            alert('Something went wrong!');
            console.log(error);
        })
        .always(() => {
            this.reset();
            commentFormButton.attr('disabled', false);
        });
    });
}