/* Import CSS */
import "../css/app.css";

/* Import JS */
import "./bootstrap";
import * as bootstrap from "bootstrap";
import jQuery from "jquery";
window.$ = jQuery;
import DataTable from "datatables.net-bs5";
DataTable(Window, window.$);
import Chart from "chart.js/auto";
window.Chart = Chart;

/* Helpers JS */
import "../vendor/js/helpers";
/* Config JS */
import "./config";
/* Core Js */
import "../vendor/libs/perfect-scrollbar/perfect-scrollbar";
import "../vendor/js/menu";
/* Main JS */
import "./main";

import "https://buttons.github.io/buttons.js";
