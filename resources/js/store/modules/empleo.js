import * as types from '../mutation-types'
import axios from 'axios'
// state
export const state = {
  empresa_vacantes: null,
  vacante: null,
  vacantes: null
}

// getters
export const getters = {
  empresa_vacantes: state => state.empresa_vacantes,
  vacante: state => state.vacante,
  vacantes: state => state.vacantes
}

// mutations
export const mutations = {
  [types.SET_SINGLE_VACANTE] (state, data) {
    state.vacante = data
  },
  [types.SET_VACANTES] (state, data) {
    state.vacantes = data
  },
  [types.SET_EMPRESA_VACANTES] (state, data) {
    state.empresa_vacantes = data
  }
}

// actions
export const actions = {
  async fetchSingleVacante ({ commit }, id) {
    if (id) {
      try {
        const { data } = await axios.get(`/api/vacantes/${id}`)
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
  },
  async fetchNuevasVacantes ({ commit }) {
    try {
      const { data } = await axios.get(`/api/vacantes?nuevas=true`)
      return data
    } catch (e) {
      console.log(e)
    }
  },
  async fetchEmpresaVacantes ({ commit }, page = 1) {
    try {
      const { data } = await axios.get(`/api/empresa/vacantes?page=${page}`)
      commit(types.SET_EMPRESA_VACANTES, data)
      return data
    } catch (e) {
      console.log(e)
    }
  },
  async saveVacante ({ commit }, payload) {
    try {
      const { data } = await axios.post(`/api/vacantes`, payload)
      return data
    } catch (e) {
      return { error: true }
    }
  },
  async updateVacante ({ commit }, payload) {
    try {
      const id = payload.id
      const { data } = await axios.put(`/api/vacantes/${id}`, payload)
      return data
    } catch (e) { }
  },
  async deleteVacante ({ commit }, id) {
    try {
      const { data } = await axios.delete(`/api/vacantes/${id}`)
      return data
    } catch (e) { }
  }
}
