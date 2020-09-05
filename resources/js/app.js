import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import VueSanitize from 'vue-sanitize'
// import Select2 from 'v-select2-component'
import AOS from 'aos'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import '~/plugins'
import '~/components'

// Vue.component('Select2', Select2)
Vue.component('pagination', require('laravel-vue-pagination'))
const moment = require('moment')
require('moment/locale/es')

Vue.use(require('vue-moment'), { moment })

Vue.use(ElementUI)

const defaultOptions = {
  allowedTags: ['a', 'b', 'p', 'div', 'ul', 'li', 'label', 'span', 'table', 'tbody', 'thead', 'tr', 'th', 'td', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
  allowedAttributes: {
    'a': [ 'href', 'class' ],
    'div': ['class'],
    'label': ['class'],
    'ul': ['class'],
    'li': ['class']
  }
}
Vue.use(VueSanitize, defaultOptions)

Vue.filter('capitalize', function (value) {
  if (!value) return ''
  value = value.toString()
  return value.charAt(0).toUpperCase() + value.slice(1)
})
Vue.filter('currency', function (amount, decimalCount = 2, decimal = '.', thousands = ',') {
  try {
    decimalCount = Math.abs(decimalCount)
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount

    const negativeSign = amount < 0 ? '-' : ''

    let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString()
    let j = (i.length > 3) ? i.length % 3 : 0

    return '$' + negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : '')
  } catch (e) {
    console.log(e)
  }
})
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})

AOS.init({
  delay: 100,
  duration: 1000
})
