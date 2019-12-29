<template>
  <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-yellow">
      <div align="center" style="margin-bottom: 1rem">
        <span class="text-radiance-yellow" style="font-family:Lobster, cursive; font-size: 50px" >Ловцы снов</span>
      </div>

      <div class="text-center">
        <p>
          Ловец снов (или "силки для снов") — индейский амулет, который защищает спящего от злых духов, а также болезней.
          По преданиям, плохие сны запутываются в паутине, а хорошие проскальзывают сквозь отверстие в середине.
          На протяжении долгого времени многие племена претендовали на авторство ловцов снов.
          Наиболее известными среди них были навахо, лакота сиу, гуроны, кри, мохоки, чироки, ирокезы и оджибве.
          В начале двухтысячных годов было достигнуто согласие в том,
          что изначальное авторство ловцов снов принадлежит племени оджибве.
        </p>
      </div>

      <div class="row row-content-center mb-5 jumbotron-position shadow rounded-bookmark border border-lime">
        <div align="center" style="margin-bottom: 1rem; margin-right: 1rem">
          <span class="text-center" style="font-family:Lobster, cursive; font-size:50px;" >Фотоуроки</span>
        </div>
       <div class="row">
         <div v-for="photolesson in photolessons" v-bind:key="photolesson.id" class="col-lg-2">
           <router-link :to="{name: 'photolesson', params:{id: photolesson.id}}" class="card border border-blue">
             <img :src="photolesson.images[0].path" height="150" weight="150" class="card-img-top" alt="...">
           </router-link>
           <p></p>
         </div>
       </div>
      </div>

      <div class="row row-content-right mb-5 jumbotron-position shadow rounded-bookmark border border-blue">
        <picture>
          <img src="img/ls.png" height="100" weight="100">
          <img src="img/ls3.png" height="100" weight="100">
          <img src="img/ls4.png" height="100" weight="100">
        </picture>
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span style="font-family:Lobster, cursive; font-size:50px;" >Видеоуроки</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'

export default {
  name: 'DreamCatchers',
  data () {
    return {
      photolessons: { }
    }
  },
  created () {
    const countPhotolessons = 6
    HTTP.get('/photolesson/getlast?count=' + countPhotolessons)
      .then(response => (this.photolessons = response.data))
  }
}
</script>

<style scoped>

</style>
