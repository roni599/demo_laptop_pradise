import './bootstrap';
import {createApp} from 'vue'
import router from './routes/router';
import App from './components/App.vue';

import User from './Helpers/User';
window.User=User;

createApp(App).use(router).mount("#app")
