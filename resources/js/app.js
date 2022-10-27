require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import UserIndex from './components/UserIndex';

createApp({
    components: {
        UserIndex
    }
}).use(router).mount("#app")