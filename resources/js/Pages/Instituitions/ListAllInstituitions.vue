<template>
  <layout>
    <div class="row">
      <div class="col-md-12" align="center">
        <div class="" role="group">
          <Link :href="'#'" class="btn btn-success"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i
            ><span class="btn-font">Exportar (.csv)</span></Link
          >
          <Link :href="'#'" class="btn btn-success"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i
            ><span class="btn-font">Exportar (.xlxs)</span></Link
          >
          <Link :href="'#'" class="btn btn-warning"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i
            ><span class="btn-font">Exportar (.json)</span></Link
          >
          <Link :href="'#'" class="btn-exp-pers btn btn-primary"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i
            ><span class="btn-font">Exportar (personalizado)</span></Link
          >
        </div>
      </div>
    </div>
    <br /><br />
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

        <template #cell(id_instituition)="row">
          <Link :href="'/instituicao/visualizar/' + row.value"
            ><i class="fas fa-eye"></i
          ></Link>
          <Link :href="'/instituicao/editar/' + row.value"
            ><i class="fas fa-edit"></i
          ></Link>
          <span
            ><i class="fas fa-trash-alt" @click="delUser(row.value)"></i
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
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        errors: [],
      },

      items: [],

      fields: [
        {
          key: "social_name",
          label: "Razão Social",
          sortable: true,
          sortDirection: "desc",
        },
        {
          key: "cnpj",
          label: "CNPJ",
          sortable: true,
          sortDirection: "desc",
        },
        {
          key: "phone_number",
          label: "Telefone",
          sortable: true,
          sortDirection: "desc",
        },
        {
          key: "email",
          label: "E-mail",
          sortable: true,
          sortDirection: "desc",
        },
        {
          key: "status",
          label: "Status",
          sortable: true,
          sortDirection: "desc",
        },
        { key: "id_instituition", label: "Ações" },
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
    axios.get("/instituicoes/listar-todos").then((response) => {
      this.items = response.data;
      this.totalRows = this.items.length;
      console.log("begin: ", this.items);
    });

    if (this.errors["accessLevel"]) {
      bootbox.alert({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>" +
          this.errors["accessLevel"] +
          "</span>",
      });
    }
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
      axios.post("/instituicao/registrar", this.form).then(
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
            //console.log('erro aqui: ', res.data.errors["accessLevel"]);
            if (res.data.errors["accessLevel"]) {
              bootbox.alert({
                centerVertical: true,
                backdrop: true,
                closeButton: false,
                size: "large",
                title:
                  "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                message:
                  "<i class='fas fa-exclamation-circle' style='color:red'></i>&nbsp&nbsp" +
                  "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                    res.data.errors["accessLevel"] +
                  "</span>",
              });
            }
          }
        }.bind(this)
      );
    },

    delUser(id) {
      var _this = this;

      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar instituição?</span>",
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
            axios.post("/instituicao/deletar/" + id).then(
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
                  axios.get("/instituicoes/listar-todos").then((response) => {
                    _this.items = response.data;
                    _this.totalRows = _this.items.length;
                    console.log("ending: ", _this.items);
                  });
                } else {
                  //this.form.errors = res.data.errors;
                  bootbox.alert({
                    centerVertical: true,
                    backdrop: true,
                    closeButton: false,
                    size: "large",
                    title:
                      "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                    message:
                      "<i class='fas fa-exclamation-circle' style='color:red'></i>&nbsp&nbsp" +
                      "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                      'O acesso requer elevação.' +
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
};
</script>