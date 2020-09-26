import * as types from '../mutation-types'
import axios from 'axios'

// state
export const state = {
  estados: [],
  municipios: [],
  estados_civiles: [],
  areas_especialidad: []
}

// getters
export const getters = {
  estados: state => state.estados,
  municipios: state => state.municipios,
  estados_civiles: state => state.estados_civiles,
  areas_especialidad: state => state.areas_especialidad
}

// mutations
export const mutations = {
  [types.SET_ESTADOS] (state, { data }) {
    state.estados = data
  },
  [types.SET_MUNICIPIOS] (state, { data }) {
    state.municipios = data
  },
  [types.SET_ESTADOS_CIVILES] (state, { data }) {
    state.estados_civiles = data
  },
  [types.SET_AREAS_ESPECIALIDAD] (state, { data }) {
    state.areas_especialidad = data
  }
}

// actions
export const actions = {
  async fetchEstados ({ commit }) {
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
  },
  async fetchEstadosCiviles ({ commit }, payload) {
    try {
      const { data } = await axios.get(`/api/estados-civiles`)
      commit(types.SET_ESTADOS_CIVILES, { data })
      return data
    } catch (e) {
      console.log(e)
    }
  },
  async fetchAreasEspecialidad ({ commit }, payload) {
    try {
      const { data } = await axios.get(`/api/area-especialidad`)
      commit(types.SET_AREAS_ESPECIALIDAD, { data })
      return data
    } catch (e) {
      console.log(e)
    }
  },
}
