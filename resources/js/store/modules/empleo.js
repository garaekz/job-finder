import * as types from '../mutation-types'
import axios from 'axios'
// state
export const state = {
  vacante: null,
  vacantes: null
}

// getters
export const getters = {
  vacante: state => state.vacante,
  vacantes: state => state.vacantes
}

// mutations
export const mutations = {
  [types.SET_SINGLE_VACANTE] (state, data) {
    console.log(data)
    state.vacante = data
  },
  [types.SET_VACANTES] (state, data) {
    state.vacantes = data
  }
}

// actions
export const actions = {
  async fetchSingleVacante ({ commit }, id) {
    console.log(id)
    if (id) {
      try {
        const { data } = await axios.get(`/api/vacantes/${id}`)
        console.log(data)
        commit(types.SET_SINGLE_VACANTE, data)
        return data
      } catch (e) {
        console.log(e)
      }
    }
    return false
  },
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
