<template>
  <layout class="backg-color">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Empréstimo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form
          @submit.prevent="sendForm"
          enctype="multipart/form-data"
          id="formAddUser"
        >
          <div class="row">
            <div class="col-md-12 topico-add">
              <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-4">
              <label for="inputCategory">Categoria</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                  </div>
                </div>

                <select
                  id="inputCategory"
                  class="form-control"
                  v-model="form.category"
                  name="txtCategory"
                  required
                  @change="getAssets($event)"
                >
                  <option selected>Selecione a categoria</option>
                  <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputAsset">Patrimônio</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputAsset"
                  class="form-control"
                  v-model="form.asset"
                  name="txtAsset"
                  required
                >
                  <option selected>Selecione o patrimônio</option>
                  <option
                    v-for="asset in this.form.assets"
                    :key="asset.ass_id"
                    :value="asset.ass_id"
                  >
                    {{ asset.ass_name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputAsset">Usuário</label>
              <b-form-input
                list="my-list-id"
                @keyup="searchUsers($event)"                
              ></b-form-input>

              <datalist id="my-list-id">
                <option
                  v-for="user in this.form.users"
                  :key="user.us_id"
                  :value="user.us_name"
                >
                  {{ user.us_name }}
                </option>
              </datalist>
            </div>

            <div class="col-md-4">
              <button type="submit" class="btn btn-success btnCadastrarCargo">
                Registrar
              </button>
            </div>
          </div>
          <br />
        </form>
      </div>
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
import { Inertia } from "@inertiajs/inertia";
import "vue-input-search/dist/vue-search.css";
import VueSearch from "vue-input-search/dist/vue-search.common";
export default {
  components: {
    Layout,
    Link,
    "vue-search": VueSearch,
  },
  props: {
    errors: Object,
    categories: Array,
    users: Array,
  },

  data: () => {
    return {
      form: {
        id: null,
        asset: null,
        user: null,
        dt_loan: null,
        dt_devolution: null,
        status: null,
        comments: null,
        category: null,
        assets: [],
        users: [],
      },
    };
  },

  methods: {
    searchUsers: function () {
      axios.get("/usuarios/listar-todos").then((response) => {
        this.form.users = response.data;
      });
    },

    getAssets: function () {
      axios.get("/assets/" + this.form.category).then((response) => {
        this.form.assets = response.data;
        console.log(response);
      });
    },

    sendForm() {
      this.$inertia.post("/emprestimo/registrar/", this.form, {
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Empréstimo registrado com sucesso!</span>",
          });

          this.form.asset = null;
          this.form.user = null;
          this.form.dt_loan = null;
          this.form.dt_devolution = null;
          this.form.status = null;
          this.form.comments = null;
        },
      });
    },
  },
};
</script>