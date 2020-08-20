import Vue from 'vue'
import Vuex from 'vuex'

try {
  window.Popper = require('popper.js').default
  window.$ = window.jQuery = require('jquery')

  require('bootstrap');
} catch (e) {}

Vue.use(Vuex)

// Load store modules dynamically.
const requireContext = require.context('./modules', false, /.*\.js$/)

const modules = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
  )
  .reduce((modules, [name, module]) => {
    if (module.namespaced === undefined) {
      module.namespaced = true
    }

    return { ...modules, [name]: module }
  }, {})

export default new Vuex.Store({
  modules
})
