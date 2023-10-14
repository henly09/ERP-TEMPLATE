import './bootstrap';
import Alpine from 'alpinejs';
import {initTE, Carousel, LoadingManagement, Sidenav, Select, Ripple} from "tw-elements";
import swal from 'sweetalert2';
import jQuery from 'jquery';

window.Swal = swal;
window.$ = jQuery;
window.Alpine = Alpine;
Alpine.start();
initTE({ Carousel, LoadingManagement, Sidenav, Select, Ripple });
