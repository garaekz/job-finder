import * as types from '../mutation-types'

// state
export const state = {
  title: ''
}

// getters
export const getters = {
  title: state => state.title
}

// mutations
export const mutations = {
  [types.SET_TITLE] (state, { title }) {
    state.title = title
  }
}

// actions
export const actions = {
  setTitle ({ commit }, title) {
    commit(types.SET_TITLE, { title })
  }
}
