import store from './store';
import VTooltip from 'v-tooltip';

window.EventBus = new Vue();
window.debounce = require('./debounce');

VTooltip.options.disposeTimeout = 0;

Vue.directive('tooltip', VTooltip.VTooltip)
Vue.directive('debounce', require('./directives/debounce').default);

Vue.config.productionTip = false;

Vue.mixin({
	store,

	methods: {
		addFlashMessages: function (flash) {
			window.addFlashMessages(flash);
		},

		toggleButtonDisable (value) {
			var buttons = document.getElementsByTagName("button");

			for (var i = 0; i < buttons.length; i++) {
				buttons[i].disabled = value;
			}
		},
	}
});

Vue.component('flash-wrapper', require('./components/flash-wrapper.vue').default);
Vue.component('flash', require('./components/flash.vue').default);
Vue.component('bar-chart', require('./components/bar-chart.vue').default);
Vue.component('tabs', require('./components/tabs/tabs').default);
Vue.component('tab', require('./components/tabs/tab').default);
Vue.component('modal', require('./components/modal').default);
Vue.component('accordian', require('./components/accordian').default);
Vue.component('attachment-wrapper', require('./components/attachment/attachment-wrapper').default);
Vue.component('attachment-item', require('./components/attachment/attachment-item').default);
Vue.component('image-upload', require('./components/image/image-upload').default);
Vue.component('image-wrapper', require('./components/image/image-wrapper').default);
Vue.component('image-item', require('./components/image/image-item').default);
Vue.directive('slugify', require('./directives/slugify').default);
Vue.directive('slugify-target', require('./directives/slugify-target').default);
Vue.directive('code', require('./directives/code').default);
Vue.directive('alert', require('./directives/alert').default);
Vue.component('datetime', require('./components/datetime').default);
Vue.component('date', require('./components/date').default);
Vue.component("time-component", require('./components/time').default);
Vue.component('overlay-loader', require('./components/overlay-loader').default);
Vue.component('table-component', require('./components/datagrid/table').default);
Vue.component('filter-component', require('./components/datagrid/filters').default);
Vue.component('pagination-component', require('./components/datagrid/pagination').default);
Vue.component('thead-component', require('./components/datagrid/table-head').default);
Vue.component('tbody-component', require('./components/datagrid/table-body').default);
Vue.component('sidebar-filter', require('./components/datagrid/side-filter').default);
Vue.component('tree-view', require('./components/tree-view/tree-view').default);
Vue.component('tree-item', require('./components/tree-view/tree-item').default);
Vue.component('tree-checkbox', require('./components/tree-view/tree-checkbox').default);
Vue.component('tree-radio', require('./components/tree-view/tree-radio').default);

Vue.mixin(require('./components/trans'));

Vue.filter('truncate', function (value, limit, trail) {
	if (! value)
        value = '';

	limit = limit ? limit : 20;
	trail = trail ? trail : '...';

	return value.length > limit ? value.substring(0, limit) + trail : value;
});

require('flatpickr/dist/flatpickr.css');

require('@babel/polyfill');