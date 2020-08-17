<template>
  <div>
    <div class="row">
      <div class="col-md-12 header_job_single_inner container">
        <div class="skeleton-staff">
          <img>
        </div>
        <div class="skeleton-details">
          <h2></h2>
          <h5></h5>
          <h5></h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
  .skeleton-staff {
      background: #fff;
      width: 130px;
      padding: 0;
      margin-right: 15px;
      margin-right: 30px;
      height: 100%;
      overflow: hidden;
      & img {
        width: 100%;
        height: 130px;
        background: #ddd;
        animation: pulse-bg 1s infinite;
      }
  }
  .skeleton-details h2 {
    content: ' ';
    width: 350px;
    height: 1.3em;
    background-color: #ddd;
    margin: 10px 0;
    animation: pulse-bg 1s infinite;
  }
  .skeleton-details h5 {
    content: ' ';
    width: 300px;
    height: 24px;
    background-color: #ddd;
    margin: 15px 0;
    animation: pulse-bg 1s infinite;
  }
  @keyframes pulse-bg {
    0% { background-color: #ddd; }
    50% { background-color: #d0d0d0; }
    100% { background-color: #ddd; }
  }
</style>
