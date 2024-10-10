import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import flatpickr from "flatpickr";
flatpickr("#datanascimento", {
    dateFormat: "Y-m-d",
});
