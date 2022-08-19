<template>
  <layout>
    <form
      @submit.prevent="cadDepartment"
      enctype="multipart/form-data"
      id="formAddList"
    >
      <div class="row">
        <div class="col-md-4">
          <label for="inputName">Registrar departamento</label><br /><br />
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
        <div class="col-md-4 select-form">
          <label for="inputInstituition">Instituição</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-building"></i>
              </div>
            </div>

            <select
              id="inputInstituition"
              class="form-control"
              v-model="form.instituicao"
              name="txtInstituition"
              @change="deleteInstituition($event)"
            >
              <option
                id="selected_instituition"
                :value="form.instituicao"
                style="background-color: gainsboro"
              >
                {{ form.instituicao }}
              </option>
              <option
                v-for="instituicao in instituicoes"
                :key="instituicao.id_instituition"
                :value="instituicao.id_instituition"
              >
                {{ instituicao.social_name }}
              </option>
            </select>
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

    <br />

    <b-container fluid>
      <!-- User Interface controls -->
      <b-row>
        <b-col sm="6" class="my-1">
          <b-form-group
            label="Por página"
            label-for="per-page-select"
            label-cols-sm="6"
            label-cols-md="4"
            label-cols-lg="3"
            label-align-sm="left"
            label-size="sm"
            class="mb-0"
          >
            <b-form-select
              id="per-page-select"
              v-model="perPage"
              :options="pageOptions"
              size="sm"
              align="left"
            ></b-form-select>
          </b-form-group>
        </b-col>

        <b-col sm="6" class="my-1">
          <b-form-group
            label="Filtro"
            label-for="filter-input"
            label-cols-sm="3"
            label-align-sm="right"
            label-size="sm"
            class="mb-0"
          >
            <b-input-group size="sm">
              <b-form-input
                id="filter-input"
                v-model="filter"
                type="search"
                placeholder="Informe o parâmetro"
              ></b-form-input>

              <b-input-group-append>
                <b-button :disabled="!filter" @click="filter = ''"
                  >Limpar</b-button
                >
              </b-input-group-append>
            </b-input-group>
          </b-form-group>
        </b-col>
      </b-row>

      <br />

      <b-row>
        <b-col sm="6"></b-col>
        <b-col sm="6" md="6" class="my-1">
          <b-pagination
            v-model="currentPage"
            :total-rows="totalRows"
            :per-page="perPage"
            align="fill"
            size="sm"
            class="my-0"
          ></b-pagination>
        </b-col>
      </b-row>

      <br />

      <!-- Main table element -->
      <b-table
        id="myTable"
        :items="items"
        :fields="fields"
        :current-page="currentPage"
        :per-page="perPage"
        :filter="filter"
        :filter-included-fields="filterOn"
        :sort-by.sync="sortBy"
        :sort-desc.sync="sortDesc"
        :sort-direction="sortDirection"
        stacked="md"
        show-empty
        small
        @filtered="onFiltered"
      >
        <template #cell(name)="row">
          {{ row.value }}
        </template>

        <template #cell(id)="row">
          <Link :href="'/departamento/visualizar/' + row.value"
            ><i class="fas fa-eye"></i
          ></Link>
          <Link :href="'/departamento/editar/' + row.value"
            ><i class="fas fa-edit"></i
          ></Link>
          <span
            ><i class="fas fa-trash-alt" @click="delDepartment(row.value)"></i
          ></span>
        </template>
      </b-table>
    </b-container>

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
    Layout,
    Link,
  },
  data() {
    return {
      form: {
        errors: [],
        name: null,
        instituicao: null,
      },

      items: [],
      instituicoes: [],

      fields: [
        {
          key: "name",
          label: "Departamento",
          sortable: true,
          sortDirection: "desc",
        },
        { key: "id", label: "Ações" },
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      pageOptions: [3, 10, 15, { value: 100, text: "Mostrar todos" }],
      sortBy: "",
      sortDesc: false,
      sortDirection: "asc",
      filter: null,
      filterOn: [],
      infoModal: {
        id: "info-modal",
        title: "",
        content: "",
      },
    };
  },

  created() {
    axios.get("/departamentos/listar-todos").then((response) => {
      this.items = response.data;
      this.totalRows = this.items.length;
    });

    axios.get("/instituicoes/listar-todos").then((response) => {
      this.instituicoes = response.data;
    });
  },

  computed: {
    sortOptions() {
      // Create an options list from our fields
      return this.fields
        .filter((f) => f.sortable)
        .map((f) => {
          return { text: f.label, value: f.key };
        });
    },
  },
  methods: {
    deleteInstituition: function () {
      $("#selected_instituition").remove();
    },

    info(item, index, button) {
      this.infoModal.title = `Row index: ${index}`;
      this.infoModal.content = JSON.stringify(item, null, 2);
      this.$root.$emit("bv::show::modal", this.infoModal.id, button);
    },
    resetInfoModal() {
      this.infoModal.title = "";
      this.infoModal.content = "";
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },

    cadDepartment() {
      axios.post("/departamento/registrar", this.form).then(
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
            (this.form.name = null), (this.form.instituicao = null);
            axios.get("/departamentos/listar-todos").then((response) => {
              this.items = response.data;
              this.totalRows = this.items.length;
            });
          } else {
            this.form.errors = res.data.errors;
            //console.log('erro aqui: ', this.form.errors);
          }
        }.bind(this)
      );
    },

    delDepartment(id) {
      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar departamento?</span>",
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
            axios.post("/departamento/deletar/" + id).then(
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
                  this.form.errors = res.data.errors;
                  //console.log(this.form.errors);
                }
              }.bind(this)
            );
          }
        },
      });
    },
  },
};
</script>