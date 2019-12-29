<template>
  <div>
    <div class="mt-2">
      <p>{{description}}</p>
    </div>
    <div class="mb-3">
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

</style>
