<template>
  <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-pink">
      <div class="row row-content-center mt-3 mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-olive">
        <div class="col-lg-10">
          <form class="form-inline">
            <input class="form-control" style="width: 100%" type="text" placeholder="Поиск">
          </form>
        </div>
        <div class="col-lg-2">
          <form class="form-inline">
            <button class="btn btn-outline-info" style="width: 100%">Найти</button>
          </form>
        </div>
        <div class="row row-content-center">
          <div class="col-lg-12"> фильтры фильтры всем нужны фильтры</div>
        </div>
      </div>
      <div class="row row-content-center mt-3 mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-blue">
        <div class="row row-content-center" style="width: 100%">
          <div class="col-lg-12 text-center">
            <span class="text-center text-radiance-orange" style="font-family:Lobster, cursive; font-size: xx-large;" >Список уроков</span>
          </div>
          <div class="row" style="width: 100%">
            <div v-for="lesson1 in lessons1" v-bind:key="lesson1.id" class="col-lg-3 p-3">
                <router-link :to="{name: 'photolesson', params:{id: lesson1.id}}" class="card border border-yellow" style="min-height: 100%">
                  <img :src="lesson1.images[0].path" height="150" width="150" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{lesson1.title}}</h5>
                    <p class="card-text">{{lesson1.description}}</p>
                  </div>
                </router-link>
            </div>
          </div>
          <div class="row" style="width: 100%">
            <div v-for="lesson2 in lessons2" v-bind:key="lesson2.id" class="col-lg-3 p-3">
              <router-link :to="{name: 'photolesson', params:{id: lesson2.id}}" class="card border border-green" style="min-height: 100%">
                <img :src="lesson2.images[0].path" height="150" width="150" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">{{lesson2.title}}</h5>
                  <p class="card-text">{{lesson2.title}}</p>
                </div>
              </router-link>
            </div>
          </div>
<!--          <div class="row row-content-center" style="width: 100%">-->
<!--            <div class="col-lg-12 p-3 text-center">-->
<!--              <ul class="pagination justify-content-center">-->
<!--                <li class="page-item disabled"><a class="page-link" href="#">Предыдущая</a></li>-->
<!--                <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--                <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                <li class="page-item"><a class="page-link" href="#">Следующая</a></li>-->
<!--              </ul>-->
<!--            </div>-->
<!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'

export default {
  name: 'LessonList',
  data () {
    return {
      lessons1: { },
      lessons2: { }
    }
  },
  created () {
    const countPhotolessons = 4
    const offset = 4
    HTTP.get('/photolesson/getlast?count=' + countPhotolessons)
      .then(response => (this.lessons1 = response.data))
    HTTP.get('/photolesson/getlast?count=' + countPhotolessons + '&offset=' + offset)
      .then(response => (this.lessons2 = response.data))
  }
}
</script>

<style scoped>

</style>
