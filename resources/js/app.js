require('./bootstrap');

Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        toastr.success(`<a href="${notification.url}">${notification.content}</a>`);

        var li = `<li class="list-group-item d-flex justify-content-between bg-light">
        <span>${notification.content}</span>
        <a href="/read-notification/${notification.id}">Mark as Read</a>
         </li>`;

        $('#notification-list').prepend(li)

        // console.log(notification.content);
    });
