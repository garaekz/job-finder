import Vue from 'vue'
import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
  user: null,
  role: null,
  experiencias: [],
  formaciones: [],
  token: Cookies.get('token')
}

// getters
export const getters = {
  user: state => state.user,
  role: state => state.role,
  token: state => state.token,
  experiencias: state => state.experiencias,
  formaciones: state => state.formaciones,
  check: state => state.user !== null
}

// mutations
export const mutations = {
  [types.SAVE_TOKEN] (state, { token, remember }) {
    state.token = token
    Cookies.set('token', token, { expires: remember ? 365 : null })
  },

  [types.SAVE_PERFIL] (state, user) {
    state.user = user
  },

  [types.SAVE_FORMACION] (state, { data }) {
    const id = data.id.toString()
    Vue.set(state.formaciones, id, data)
  },

  [types.UPDATE_FORMACION] (state, { data }) {
    const id = data.id.toString()
    Vue.set(state.formaciones, id, data)
  },

  [types.DELETE_FORMACION] (state, { data }) {
    const id = data.id.toString()
    Vue.delete(state.formaciones, id)
  },

  [types.SAVE_EXPERIENCIA] (state, { data }) {
    const id = data.id.toString()
    Vue.set(state.experiencias, id, data)
  },

  [types.UPDATE_EXPERIENCIA] (state, { data }) {
    const id = data.id.toString()
    Vue.set(state.experiencias, id, data)
    console.log(state.experiencias)
  },

  [types.DELETE_EXPERIENCIA] (state, { data }) {
    const id = data.id.toString()
    Vue.delete(state.experiencias, id)
  },

  [types.FETCH_USER_SUCCESS] (state, { user }) {
    state.user = user
    state.role = user.role
  },

  [types.FETCH_USER_FAILURE] (state) {
    state.token = null
    Cookies.remove('token')
  },

  [types.FETCH_EXPERIENCIA] (state, { data }) {
    console.log(data)
    data.forEach((m) => {
      Vue.set(state.experiencias, m.id.toString(), m)
    })
    console.log(state.experiencias)
  },

  [types.FETCH_FORMACION] (state, { data }) {
    data.forEach((m) => {
      Vue.set(state.formaciones, m.id.toString(), m)
    })
  },

  [types.LOGOUT] (state) {
    state.user = null
    state.token = null

    Cookies.remove('token')
  },

  [types.UPDATE_USER] (state, { user }) {
    state.user = user
  }
}

// actions
export const actions = {
  saveToken ({ commit, dispatch }, payload) {
    commit(types.SAVE_TOKEN, payload)
  },

  async fetchUser ({ commit }) {
    try {
      const { data } = await axios.get('/api/user')

      commit(types.FETCH_USER_SUCCESS, { user: data })
    } catch (e) {
      commit(types.FETCH_USER_FAILURE)
    }
  },

  async fetchExperiencia ({ commit }) {
    try {
      const { data } = await axios.get('/api/experiencia')
      commit(types.FETCH_EXPERIENCIA, { data })
    } catch (e) {
      console.log(e)
    }
  },

  async fetchFormacion ({ commit }) {
    try {
      const { data } = await axios.get('/api/formacion')
      commit(types.FETCH_FORMACION, { data })
    } catch (e) {
      console.log(e)
    }
  },

  updateUser ({ commit }, payload) {
    commit(types.UPDATE_USER, payload)
  },

  async savePerfil ({ commit }, payload) {
    try {
      const { data } = await axios.post(`/api/perfil/update`, payload)
      let user = data.user
      commit(types.SAVE_PERFIL, user)
    } catch (e) { }
  },

  async saveFormacion ({ commit }, payload) {
    try {
      const { data } = await axios.post(`/api/formacion`, payload)
      commit(types.SAVE_FORMACION, { data })
      return data
    } catch (e) { }
  },

  async updateFormacion ({ commit }, payload) {
    try {
      const { data } = await axios.put(`/api/formacion/${payload.id}`, payload)
      commit(types.UPDATE_FORMACION, { data })
      return data
    } catch (e) { }
  },

  async deleteFormacion ({ commit }, id) {
    try {
      const { data } = await axios.delete(`/api/formacion/${id}`)
      commit(types.DELETE_FORMACION, { data })
      return data
    } catch (e) {
      throw e
    }
  },

  async saveExperiencia ({ commit }, payload) {
    try {
      const { data } = await axios.post(`/api/experiencia`, payload)
      commit(types.SAVE_EXPERIENCIA, { data })
      return data
    } catch (e) { }
  },

  async updateExperiencia ({ commit }, payload) {
    try {
      const { data } = await axios.put(`/api/experiencia/${payload.id}`, payload)
      commit(types.UPDATE_EXPERIENCIA, { data })
      return data
    } catch (e) { }
  },

  async deleteExperiencia ({ commit }, id) {
    try {
      const { data } = await axios.delete(`/api/experiencia/${id}`)
      commit(types.DELETE_EXPERIENCIA, { data })
      return data
    } catch (e) {
      throw e
    }
  },

  async deletePortafolio ({ commit }, id) {
    try {
      const { data } = await axios.delete(`/api/perfil/portafolio/${id}`)
      return data
    } catch (e) {
      throw e
    }
  },

  async logout ({ commit }) {
    try {
      await axios.post('/api/logout')
    } catch (e) { }

    commit(types.LOGOUT)
  },

  async fetchOauthUrl (ctx, { provider }) {
    const { data } = await axios.post(`/api/oauth/${provider}`)

    return data.url
  }
}
