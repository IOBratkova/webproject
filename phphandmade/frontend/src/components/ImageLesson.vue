<template>
  <div id="imagelesson">
    <div id="#descr" class="mt-2">
      <p>{{description}}</p>
    </div>
    <div id="#image" class="mb-3 img-fluid">
      <img :src="path">
    </div>
  </div>
</template>

<script>

export default {
  name: 'ImageLesson',
  props: ['description', 'path']
}
</script>

<style scoped>
  img {
    display: inline-block;
    height: auto;
    max-width: 100%;
  }
</style>
