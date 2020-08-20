<template>
  <div class="big_form_group">
    <skeleton-component v-if="!profile"></skeleton-component>
    <div class="row" v-else>
      <div class="col-md-12 header_job_single_inner container">
        <div class="poster_staff">
          <img alt="brand logo" src="assets/images/avatar-placeholder.png">
        </div>
        <div class="profile_details" v-if="profile">
          <h2>{{ profile.first_name }} {{ profile.last_name }}</h2>
          <h5>{{ profile.email }}</h5>
        </div>
        <div class="profile_details" v-else>
          <h2></h2>
          <h5></h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
export default {
  computed: {
    ...mapGetters({
      profile: 'profile',
    }),
  },
  props: {
    token: String
  },
  mounted() {
    this.fetchProfile();
  },
  methods: {
    ...mapActions({
      fetchProfile: 'fetchProfile',
    }),
  }
}
</script>
