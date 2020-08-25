<template>
  <div class="job_container">
    <div class="container">
      <div class="row job_main">
        <div class="sidebar">
          <ul class="user_navigation">
            <li>
              <a href="browse-jobs.html"><i class="fas fa-search" /> Browse Jobs </a>
              <a class="filter_btn" href="job-seeker-dashboard.html#sidebar_filter_option">
                <i class="fas fa-filter" />
                <i class="fas fa-times" />
              </a>
            </li>
            <li>
              <form id="#sidebar_filter_option" class="filter_option">
                <div class="form-group">
                  <label>Location</label>
                  <div class="field">
                    <i class="fas fa-map-marker-alt" />
                    <select class="js-example-basic-single" name="state">
                      <option value="AL">ALABAMA</option>
                      <option value="WY">WYOMING</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keywords</label>
                  <div class="field">
                    <i class="fas fa-briefcase" />
                    <select class="js-example-basic-single" name="state">
                      <option value="AL">e.g. job title</option>
                      <option value="WY">Title 1</option>
                      <option value="WY">Title 2</option>
                      <option value="WY">Title 3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <div class="field">
                    <i class="fas fa-briefcase" />
                    <select class="js-example-basic-single" name="state">
                      <option>Admin Support</option>
                      <option>Customer Service</option>
                      <option>Data Analytics</option>
                      <option>Design &amp; Creative</option>
                      <option>Legal</option>
                      <option>Software Developing</option>
                      <option>IT &amp; Networking</option>
                      <option>Writing</option>
                      <option>Translation</option>
                      <option>Sales &amp; Marketing</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Salary</label>
                  <div class="field">
                    <input type="text" placeholder="e.g. 10k" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label>Tags</label>
                  <div class="field">
                    <div class="form-group custom_checkboxes">
                      <label class="custom_checkbox" for="tag-1">
                        <input type="checkbox" name="usertype" id="tag-1" value="job seeker">
                        <span><i class="fas fa-check" />PHP</span>
                      </label>
                      <label class="custom_checkbox" for="tag-2">
                        <input type="checkbox" name="usertype" id="tag-2" value="employer">
                        <span><i class="fas fa-check" /> MySQL</span>
                      </label>
                      <label class="custom_checkbox" for="tag-3">
                        <input type="checkbox" name="usertype" id="tag-3" value="employer">
                        <span><i class="fas fa-check" /> API</span>
                      </label>
                      <label class="custom_checkbox" for="tag-4">
                        <input type="checkbox" name="usertype" id="tag-4" value="employer">
                        <span><i class="fas fa-check" /> react</span>
                      </label>
                      <label class="custom_checkbox" for="tag-5">
                        <input type="checkbox" name="usertype" id="tag-5" value="employer">
                        <span><i class="fas fa-check" /> design</span>
                      </label>
                    </div>
                  </div>
                </div>
              </form>
            </li>
            <li class="is-active">
              <a href="job-seeker-dashboard.html">
                <i class="fas fa-border-all" /> Job Dashboard
              </a>
            </li>
          </ul>
          <h5>Organize and Manage</h5>
          <ul class="user_navigation">
            <li>
              <a href="my-stared-jobs.html"><i class="fas fa-star" /> View My Stared Jobs</a>
            </li>
          </ul>
          <h5>Account</h5>
          <ul class="user_navigation">
            <li>
              <router-link :to="{ name: 'home' }">
                <i class="fas fa-user" /> Ver mi perfil
              </router-link>
            </li>
            <li>
              <a href="edit-password.html"><i class="fas fa-key" />Change Password</a>
            </li>
            <li>
              <a href="#logout" @click="logout"><i class="fas fa-power-off" /> Logout</a>
            </li>
          </ul>
        </div>
        <div class=" job_main_right">
          <transition name="fade" mode="out-in">
            <router-view />
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeLayout',

  components: {
  },
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  },
}
</script>
