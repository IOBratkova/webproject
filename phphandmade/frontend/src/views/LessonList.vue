<template>
  <v-app>
    <div id="app">
      <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-pink">
<!--      <div class="row row-content-center m-3 p-1 jumbotron-position shadow rounded-bookmark border border-olive">-->
<!--        <div class="col-lg-10">-->
<!--          <form class="form-inline">-->
<!--            <v-autocomplete v-model="searchModel" :items="itemsArray" item-text="title" item-value="id" @change="change" :search-input.sync="updateItems"></v-autocomplete>-->
<!--&lt;!&ndash;            <input class="form-control" style="width: 100%" type="text" placeholder="Поиск">&ndash;&gt;-->
<!--          </form>-->
<!--        </div>-->
<!--        <div class="col-lg-2">-->
<!--          <form class="form-inline pt-3">-->
<!--            <button @click="find" class="btn btn-outline-info" style="width: 100%">Найти</button>-->
<!--          </form>-->
<!--        </div>-->
<!--&lt;!&ndash;        <div class="row row-content-center">&ndash;&gt;-->
<!--&lt;!&ndash;          <div class="col-lg-12"> фильтры фильтры всем нужны фильтры</div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--      </div>-->
      <div class="row row-content-center m-3 p-1 jumbotron-position shadow rounded-bookmark border border-blue">
        <div class="row row-content-center" style="width: 100%">
          <div class="col-lg-12 text-center">
            <span class="text-center text-radiance-orange" style="font-family:Lobster, cursive; font-size: xx-large;" >Список уроков</span>
          </div>
          <div id="my_lessons">
            <div id="lessons_line_1" class="row m-2" style="width: 100%">
              <div v-for="lesson1 in lessons1" v-bind:key="lesson1.id" v-bind:id="getId(lesson1.id)" class="mini-unit col-lg-3 p-3">
                <router-link :to="{name: 'photolesson', params:{id: lesson1.id}}" class="card border border-yellow" style="min-height: 100%">
                  <img :src="lesson1.images[0].path" height="150" width="150" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{lesson1.title}}</h5>
                    <p class="card-text">{{lesson1.description}}</p>
                  </div>
                </router-link>
              </div>
            </div>
            <div id="lessons_line_2" class="row m-2" style="width: 100%">
              <div v-for="lesson2 in lessons2" v-bind:key="lesson2.id" v-bind:id="getId(lesson2.id)" class="mini-unit col-lg-3 p-3">
                <router-link :to="{name: 'photolesson', params:{id: lesson2.id}}" class="card border border-green" style="min-height: 100%">
                  <img :src="lesson2.images[0].path" height="150" width="150" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{lesson2.title}}</h5>
                    <p class="card-text">{{lesson2.title}}</p>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <div class="row row-content-center" style="width: 100%">
            <div class="col-lg-12 p-3 text-center">
              <ul class="pagination justify-content-center">
                <li id="previous" class="page-item"><button class="page-link" @click="previousPage">Предыдущая</button></li>
                <li class="page-item" v-for="(p, index) in pagination.pages" :key=index v-bind:id="index" @click="setPage(p)">
                  <button class="page-link">{{p}}</button>
                </li>
                <li id="next" class="page-item"><button class="page-link" @click="nextPage">Следующая</button></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </v-app>
</template>

<script>
import { HTTP } from '../components/http'
import router from '../router'
import lodash from 'lodash'

export default {
  name: 'LessonList',
  data () {
    return {
      lessons1: { },
      lessons2: { },
      lessons: { },
      searchModel: {},
      searchText: '',
      itemsArray: [],
      itemValue: {},
      updateItems: null,
      perPage: 8,
      pagination: {}
    }
  },
  watch: {
    updateItems (text) {
      this.searchText = text
      const countPhotolessons = 4
      HTTP.get('/photolesson/getlast?count=' + countPhotolessons)
        .then(response => (this.itemsArray = response.data))
    }
  },
  created () {
    HTTP.get('/photolesson/getlast')
      .then(response => { this.lessons = response.data; this.setPage(1) }).then()
  },
  computed: {
    items () {
      return this.paginate(this.lessons)
    }
  },
  methods: {
    getId (lessonid) {
      return lessonid.toString() + 'unit'
    },
    change () {
      router.push({ name: 'photolesson', params: { id: this.searchModel } })
    },
    find () {
      return this.searchText
    },
    setPage (p) {
      this.pagination = this.paginator(this.lessons.length, p)
      this.lessons1 = lodash.chunk(this.items, Math.round(this.perPage / 2))[0]
      this.lessons2 = lodash.chunk(this.items, Math.round(this.perPage / 2))[1]
    },
    paginate (data) {
      return lodash.slice(data, this.pagination.startIndex, this.pagination.endIndex + 1)
    },
    paginator (totalItems, currentPage) {
      const startIndex = (currentPage - 1) * this.perPage
      const endIndex = Math.min(startIndex + this.perPage - 1, totalItems - 1)
      return {
        currentPage: currentPage,
        startIndex: startIndex,
        endIndex: endIndex,
        totalItems: totalItems,
        pages: lodash.range(1, Math.ceil(totalItems / this.perPage) + 1)
      }
    },
    isPageFirst: function () {
      return this.pagination.currentPage === 1
    },
    isPageLast: function () {
      return this.pagination.currentPage === Math.ceil(this.pagination.totalItems / this.perPage)
    },
    previousPage () {
      if (!this.isPageFirst()) {
        this.setPage(this.pagination.currentPage - 1)
      }
    },
    nextPage () {
      if (!this.isPageLast()) {
        this.setPage(this.pagination.currentPage + 1)
      }
    }
  }
}
</script>

<style scoped>

</style>
