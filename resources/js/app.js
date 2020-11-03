
require('./bootstrap');

require('./custom-scripts');

/**
 * Listen to User Notifications
 */
if (window.Laravel.authenticated) {
    let toastTemplate = $('.toast');

    Echo.private(`users.${window.Laravel.user_id}`)
        .notification((notification) => {
            console.log(notification);

            if(notification.type == 'broadcast.comment') {
                toastTemplate.find('.toast-body').html(`
                    ${notification.message} <br> <a href="${notification.article.url}">${notification.article.title}</a>
                `);

                toastTemplate.toast('show');
            }
        });
}
