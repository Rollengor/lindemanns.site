import '../bootstrap';

import { scrollPage } from './scroll-page.js';
import { extendedMenu } from './extended-menu.js';
import { checkFilling } from './check-filling.js';

import { categoriesControl } from './news/categories-control.js';
import { paginationControl } from './news/pagination-control.js';

scrollPage();
extendedMenu();
checkFilling();

categoriesControl();
paginationControl();

console.log('all scripts inited');
