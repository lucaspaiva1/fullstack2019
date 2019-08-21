<template>
  <div id="app">
    <NavBar></NavBar>
    <div class="main py-5 bg-light">
      <div class="container">
        <router-view />
      </div>
    </div>
  </div>
</template>
<script>
import NavBar from "@/components/base/NavBar";
export default {
  components: {
    NavBar
  }
};
</script>