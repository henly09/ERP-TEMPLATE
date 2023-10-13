import './bootstrap';
import Alpine from 'alpinejs';
import {initTE, Carousel, LoadingManagement, Sidenav, Select, Ripple} from "tw-elements";

window.Alpine = Alpine;
Alpine.start();
initTE({ Carousel, LoadingManagement, Sidenav, Select, Ripple });
