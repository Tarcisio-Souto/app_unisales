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
          <div class="row" id="headerFormAddLoan">
            <div class="col-md-2">
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

            <div class="col-md-3">
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

            <div class="col-md-3">
              <label for="inputUser">Solicitante</label>
              <b-form-input
                list="my-list-id"
                id="inputUser"
                v-model="form.user"
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
            <div class="col-md-2">
              <label for="inputStatus">Situação</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputStatus"
                  class="form-control"
                  v-model="form.status"
                  name="txtStatus"
                  required
                >
                  <option value="0">Locado</option>
                  <option value="1">Reservado</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <button
                type="button"
                class="btn btn-primary btnAddItems"
                @click="addRow()"
              >
                Adicionar
              </button>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label for="inputDtLoan">Data do Empréstimo</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input
                      key=""
                      type="text"
                      id="inputDtLoan"
                      class="form-control"
                      v-model="form.dt_loan"
                      name="txtDtLoan"
                      v-mask="'##/##/####'"
                      required
                    />
                  </div>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-12">
                  <label for="inputDtDevolution">Data da Devolução</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input
                      key=""
                      type="text"
                      id="inputDtDevolution"
                      class="form-control"
                      v-model="form.dt_devolution"
                      name="txtDtDevolution"
                      v-mask="'##/##/####'"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputComments">Observações</label>
                <textarea
                  class="form-control"
                  id="inputComments"
                  rows="4"
                ></textarea>
              </div>
            </div>
            <div class="col-md-3">
              <button
                type="submit"
                class="btn btn-success btnCadastrarEmprestimo"
              >
                Registrar
              </button>
            </div>
          </div>
          <br />
        </form>
      </div>
    </div>

    <br />

    <div class="table-responsive-lg">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr align="center">
            <th>Patrimônio</th>
            <th>Categoria</th>
            <th>Solicitante</th>
            <th>Situação</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items[0]" :key="item.row" :value="item.row" align="center">
            <td>{{ item.asset }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.user }}</td>
            <td>{{ item.status }}</td>
            <td align="center">
              <Link :href="'/usuario/visualizar/' + item.row"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/usuario/editar/' + item.row"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(item.row)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody> 
        
      </table>
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
        row: null,
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

      /* lista que irá armazenar os objetos selecionados para posterior efetivação do empréstimo */
      items: [],

      
    };
  },

  methods: {
    
    addRow() {

      var i = 0;
      var _this = this

      if (this.form.row == null) {
        _this.items[i] = [{'row':i, 'asset':this.form.asset, 'category':this.form.category, 'user':this.form.user, 'status':this.form.status}]
        _this.form.row = this.form.row + 1;
        i = this.form.row;
      }

      if (this.form.row != null && i != 1) {
        while (i != this.form.row) {
          i = this.form.row;
          _this.items[i] = [{'asset':this.form.asset, 'category':this.form.category, 'user':this.form.user, 'status':this.form.status}]
        }
        this.form.row = this.form.row + 1;
      }

      console.log(_this.items[0])

    },


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