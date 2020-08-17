<template>
  <div class="big_form_group">
    <skeleton-component v-if="!profile"></skeleton-component>
    <div class="row" v-else>
      <div class="col-md-12 header_job_single_inner container">
        <div class="poster_staff">
          <img alt="brand logo" src="assets/images/avatar-placeholder.png">
        </div>
        <div class="profile_details" v-if="profile">
          <h2>{{ profile.first_name }} {{ profile.last_name }} <span class="varified"><i class="fas fa-check"></i>Verified</span></h2>
          <h5>{{ profile.email }}</h5>
          <div class="staff_rating">
            <span>4.5</span>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>
        <div class="profile_details" v-else>
          <h2> <span class="varified"><i class="fas fa-check"></i>Verified</span></h2>
          <h5></h5>
          <div class="staff_rating">
            <span>4.5</span>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
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
