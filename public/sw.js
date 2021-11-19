// self.addEventListener('push', function (e) {
//     if (!(self.Notification && self.Notification.permission === 'granted')) {
//         //notifications aren't supported or permission not granted!
//         return;
//     }

//     if (e.data) {
//         var msg = e.data.json();
//         console.log(msg)
//         e.waitUntil(self.registration.showNotification(msg.title, {
//             body: msg.body,
//             icon: msg.icon,
//             actions: msg.actions
//         }));
//     }
// });

// self.addEventListener('push', function(event) {
//     console.log('Received a push message', event);

//     var title = 'Yay a message.';
//     var body = 'We have received a push message.';
//     var icon = '/images/icon-192x192.png';
//     var tag = 'simple-push-demo-notification-tag';
//     var data = {
//       doge: {
//           wow: 'such amaze notification data'
//       }
//     };

//     event.waitUntil(
//       self.registration.showNotification(title, {
//         body: body,
//         icon: icon,
//         tag: tag,
//         data: data
//       })
//     );
//   });


(() => {
    'use strict'

    const WebPush = {
      init () {
        self.addEventListener('push', this.notificationPush.bind(this))
        self.addEventListener('notificationclick', this.notificationClick.bind(this))
        self.addEventListener('notificationclose', this.notificationClose.bind(this))
      },

      /**
       * Handle notification push event.
       *
       * https://developer.mozilla.org/en-US/docs/Web/Events/push
       *
       * @param {NotificationEvent} event
       */
      notificationPush (event) {
        if (!(self.Notification && self.Notification.permission === 'granted')) {
          return
        }

        // https://developer.mozilla.org/en-US/docs/Web/API/PushMessageData
        if (event.data) {
          event.waitUntil(
            this.sendNotification(event.data.json())
          )
        }
      },

      /**
       * Handle notification click event.
       *
       * https://developer.mozilla.org/en-US/docs/Web/Events/notificationclick
       *
       * @param {NotificationEvent} event
       */
      notificationClick (event) {
        // console.log(event.notification)

        if (event.action === 'some_action') {
          // Do something...
        } else {
          self.clients.openWindow('/')
        }
      },

      /**
       * Handle notification close event (Chrome 50+, Firefox 55+).
       *
       * https://developer.mozilla.org/en-US/docs/Web/API/ServiceWorkerGlobalScope/onnotificationclose
       *
       * @param {NotificationEvent} event
       */
      notificationClose (event) {
        self.registration.pushManager.getSubscription().then(subscription => {
          if (subscription) {
            this.dismissNotification(event, subscription)
          }
        })
      },

      /**
       * Send notification to the user.
       *
       * https://developer.mozilla.org/en-US/docs/Web/API/ServiceWorkerRegistration/showNotification
       *
       * @param {PushMessageData|Object} data
       */
      sendNotification (data) {
        return self.registration.showNotification(data.title, data)
      },

      /**
       * Send request to server to dismiss a notification.
       *
       * @param  {NotificationEvent} event
       * @param  {String} subscription.endpoint
       * @return {Response}
       */
      dismissNotification ({ notification }, { endpoint }) {
        if (!notification.data || !notification.data.id) {
          return
        }

        const data = new FormData()
        data.append('endpoint', endpoint)

        // Send a request to the server to mark the notification as read.
        fetch(`/notifications/${notification.data.id}/dismiss`, {
          method: 'POST',
          body: data
        })
      }
    }

    WebPush.init()
  })()
