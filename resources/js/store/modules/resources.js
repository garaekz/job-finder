import * as types from '../mutation-types'
import axios from 'axios'

// state
export const state = {
  estados: [],
  municipios: []
}

// getters
export const getters = {
  estados: state => state.estados,
  municipios: state => state.municipios
}

// mutations
export const mutations = {
  [types.SET_ESTADOS] (state, { data }) {
    state.estados = data
  },
  [types.SET_MUNICIPIOS] (state, { data }) {
    state.municipios = data
  }
}

// actions
export const actions = {
  async fetchEstados ({ commit }, title) {
    try {
      const { data } = await axios.get(`/api/estados`)
      commit(types.SET_ESTADOS, { data })
      return data
    } catch (e) {
      console.log(e)
    }
  },
  async fetchMunicipios ({ commit }, id) {
    try {
      const { data } = await axios.get(`/api/municipios/${id}`)
      commit(types.SET_MUNICIPIOS, { data })
      return data
    } catch (e) {
      console.log(e)
    }
  }
}
