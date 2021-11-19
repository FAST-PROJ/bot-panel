import './bootstrap'
import Vue from 'vue'

import NotificationsDemo from './components/NotificationsDemo.vue'
import NotificationsDropdown from './components/NotificationsDropdown.vue'
import {TinkerComponent} from 'botman-tinker';

Vue.component('notifications-dropdown', NotificationsDropdown);
Vue.component('botman-tinker', TinkerComponent);
Vue.component('notifications-demo', NotificationsDemo);

new Vue({
    el: '#app'
})


