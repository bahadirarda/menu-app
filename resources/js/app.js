import { createApp } from 'vue';
import navbar from './components/navbar.vue';

const app = createApp({});

app.component('navbar', navbar);
app.mount('#app'); // Ana uygulama elemanına bağladık
