import * as types from '../mutation-types'
import axios from 'axios'
// state
export const state = {
  vacantes: null
}

// getters
export const getters = {
  vacantes: state => state.vacantes
}

// mutations
export const mutations = {
  [types.SET_VACANTES] (state, data) {
    state.vacantes = data
  }
}

// actions
export const actions = {
  async fetchVacantes ({ commit }, page = 1) {
    try {
      const { data } = await axios.get(`/api/vacantes?page=${page}`)
      commit(types.SET_VACANTES, data)
      return data
    } catch (e) {
      console.log(e)
    }
  }
}
