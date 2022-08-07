<template>
  <layout>
    <div class="container">
      <form
        @submit.prevent="sendForm"
        enctype="multipart/form-data"
        id="formAddCategory"
      >
        <div class="row">
          <div class="col-md-8">
            <label for="inputName" style="font-weight: bold">Categoria</label
            ><br /><br />
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-duotone fa-layer-group"></i>
                </div>
              </div>
              <input
                type="text"
                id="inputName"
                class="form-control"
                placeholder="Nome"
                v-model="form.name"
              />
            </div>
            <div v-for="(erro, name) in errors" :key="name">
              <div v-if="name == 'name'">
                <span v-if="erro != ''" class="errors-label-notification">
                  <i class="fas fa-exclamation-circle"></i>{{ erro }}
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-success btn-cad-list">
              Registrar
            </button>
          </div>
        </div>
      </form>
      <br /><br />

      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
          <input
            type="text"
            v-model="form.search"
            class="form-control"
            placeholder="Pesquise o nome da categoria"
          />
        </div>
      </div>
      <br /><br />

      <div class="table-responsive-lg" id="div_table">
        <table
          id="myTable"
          class="table table-striped table-bordered table-hover"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th @click="sort('nome')">Categoria</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="categoria in sortedCategorias"
              :key="categoria.id"
              :value="categoria.id"
              align="center"
            >
              <td>{{ categoria.name }}</td>
              <td align="center">
                <Link :href="'/categoria/visualizar/' + categoria.id"
                  ><i class="fas fa-eye"></i
                ></Link>
                <Link :href="'/categoria/editar/' + categoria.id"
                  ><i class="fas fa-edit"></i
                ></Link>
                <span
                  ><i
                    class="fas fa-trash-alt"
                    @click="delForm(categoria.id)"
                  ></i
                ></span>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Categoria</th>
              <th>Ações</th>
            </tr>
          </tfoot>
        </table>
        <p>
          <button @click="prevPage" class="btn btn-secondary">Anterior</button>
          <button @click="nextPage" class="btn btn-secondary">Próximo</button>
        </p>
      </div>
    </div>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
  </layout>
</template>

<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
    Layout,
  },
  props: {
    categorias: Array,
    errors: Object
  },
  data: () => {
    return {
      form: {
        id: null,
        categorias: [],
        currentSort: "categoria",
        currentSortDir: "asc",
        pageSize: 200,
        currentPage: 1,
        search: "",
      },
    };
  },
  /*created() {
    axios.get("/categorias/lista").then((response) => {
      this.form.categorias = response.data;
    });
  },*/

  created() {

    for (var i = 0; i < this.$props.categorias.length; i++){
      this.form.categorias.push({'id': this.$props.categorias[i]['id'], 'name': this.$props.categorias[i]['name']});  
      console.log(this.form.categorias[i]);    
    }    
    
  },

  methods: {

    nextPage: function () {
      if (this.form.currentPage * this.form.pageSize < this.form.categorias.length)
        this.form.currentPage++;
    },
    prevPage: function () {
      if (this.form.currentPage > 1) this.form.currentPage--;
    },
    sort: function (s) {
      //if s == current sort, reverse
      if (s === this.form.currentSort) {
        this.form.currentSortDir =
          this.form.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.form.currentSort = s;
    },
    sendForm() {
      $("#div_table").load(location.href + "#div_table");

      this.$inertia.post("/categoria/registrar/", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        preserveState: true,
        onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title:
              "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Categoria registrada com sucesso!</span>",
          });

          this.form.name = null;
        },
      });
    },
    delForm(id) {
      var v = this;
      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar categoria?</span>",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Não',
          },
          confirm: {
            className: "btn-danger",
            label: '<i class="fa fa-check"></i> Sim',
          },
        },
        callback: function (result) {
          if (result == true) {
            axios.post("/categoria/deletar/" + id).then(
              function (res) {
                if (res.data["success"]) {
                  bootbox.alert({
                    centerVertical: true,
                    backdrop: true,
                    closeButton: false,
                    size: "large",
                    title:
                      "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                    message:
                      "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
                      "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                      res.data["success"] +
                      "</span>",
                  });
                } else {
                  bootbox.alert({
                    centerVertical: true,
                    backdrop: true,
                    closeButton: false,
                    size: "large",
                    title:
                      "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                    message:
                      "<i class='fas fa-exclamation-triangle' style='color:#ffc400'></i>&nbsp&nbsp" +
                      "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                      res.data["error"] +
                      "</span>",
                  });
                }
              }.bind(this)
            );
          }
        },
      });
    },
  },
  computed: {

    sortedCategorias: function () {     
      return this.form.categorias
        .sort((a, b) => {
          let modifier = 1;
          if (this.form.currentSort === "asc") modifier = -1;
          if (a[this.form.currentSort] < b[this.form.currentSort]) {
            return -1 * modifier;
          }
          if (a[this.form.currentSort] > b[this.form.currentSort]) {
            return 1 * modifier;
          }
          return 0;
        })
        .filter((row, index) => {
          let start = (this.form.currentPage - 1) * this.form.pageSize;
          let end = this.form.currentPage * this.form.pageSize;
          if (index >= start && index < end) return true;
        })
        .filter((categoria) => {
          return (
            categoria.name
              .toLowerCase()
              .indexOf(this.form.search.toLowerCase()) > -1
          );
        });
    },
  },
};
</script>