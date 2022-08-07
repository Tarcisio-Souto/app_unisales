<template>
  <layout>
    <form
      @submit.prevent="cadCategory"
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
          <div v-for="(erro, name) in this.form.errors" :key="name">
            <div v-if="name == 'name'">
              <span v-if="erro != ''" class="errors-label-notification">
                <i class="fas fa-exclamation-circle"></i>{{ erro }}
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <button
            type="submit"
            class="btn btn-success btn-cad-list"
            id="cadCat"
          >
            Registrar
          </button>
        </div>
      </div>
    </form>
    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />

    <div class="table-responsive-lg" id="div_table">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr>
            <th @click="sort('name')">Categoria</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="categoria in sortedCategorias"
            :key="categoria.id"
            :value="categoria.id"
          >
            <td>{{ categoria.name }}</td>
            <td align="center">
              <Link :href="'/categorias/visualizar/' + categoria.id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/categorias/editar/' + categoria.id"
                ><i class="fas fa-edit"></i
              ></Link>
              <span
                ><i class="fas fa-trash-alt" @click="sendForm(categoria.id)"></i
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

    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
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

  data: () => {
    return {
      form: {
        id: null,
        categorias: [],
        currentSort: "categoria",
        currentSortDir: "asc",
        pageSize: 10,
        currentPage: 1,
        search: "",
        errors: [],
        name: null
      },
    };
  },

  created() {
    axios.get("/categorias/listar-todos").then((response) => {
      this.form.categorias = response.data;

    });
  },

  methods: {
    nextPage: function () {
      if (
        this.form.currentPage * this.form.pageSize <
        this.form.categorias.length
      )
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

    cadCategory() {
      axios.post("/categoria/registrar", this.form).then(        
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
            $("#formAddCategory").each(function () {
              this.reset();
              $("#inputName").empty();
            });
            axios.get("/categorias/listar-todos").then((response) => {
              this.form.categorias = response.data;
            });
          } else {
            this.form.errors = res.data;
            console.log(res.data);
          }
        }.bind(this)
      );
    },

    sendForm(id) {
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
                  axios.get("/categorias/listar-todos").then((response) => {
                    this.form.categorias = response.data;
                  });
                } else {
                  this.form.errors = res.data;
                  console.log(res.data);
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
          if (this.form.currentSortDir === "asc") modifier = -1;
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