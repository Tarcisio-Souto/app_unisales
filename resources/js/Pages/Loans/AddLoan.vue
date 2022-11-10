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
                  @change="getAssets($event), selectCategory($event)"
                >
                  <option selected>Selecione a categoria</option>
                  <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id + ' - ' + category.name"
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
                    :value="asset.ass_id + ' - ' + asset.ass_name"
                  >
                    {{ asset.ass_id + " - " + asset.ass_name }}
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
                @change="searchUser($event)"
              ></b-form-input>

              <datalist id="my-list-id">
                <option
                  v-for="user in this.form.users"
                  :key="user.us_id"
                  :value="user.us_id + ' - ' + user.us_name"
                >
                  {{ user.us_id + " - " + user.us_name }}
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
                @click="add()"
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
            <div class="col-md-3">
              <div class="row">
                <div class="col-md-12">
                  <label for="inputHrLoan">Horário do Empréstimo</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input
                      key=""
                      type="text"
                      id="inputHrLoan"
                      class="form-control"
                      v-model="form.hr_loan"
                      name="txtHrLoan"
                      v-mask="'##:##'"
                      required
                    />
                  </div>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-12">
                  <label for="inputHrDevolution">Horário da Devolução</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                    </div>
                    <input
                      key=""
                      type="text"
                      id="inputHrDevolution"
                      class="form-control"
                      v-model="form.hr_devolution"
                      name="txtHrDevolution"
                      v-mask="'##:##'"
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
          </div>
          <br />
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <button
          type="button"
          @click="sendForm()"
          class="btn btn-success btnCadastrarEmprestimo"
        >
          Registrar
        </button>
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
            <th>Data/Hora Empréstimo</th>
            <th>Data/Hora Devolução</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in list"
            :key="item.id"
            :value="item.id"
            align="center"
          >
            <td>{{ item.asset }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.user }}</td>
            <td>{{ item.status }}</td>
            <td>{{ item.dt_loan + " " + item.hr_loan }}</td>
            <td>{{ item.dt_devolution + " " + item.hr_devolution }}</td>
            <td align="center">
              <!--<span
                ><i class="fas fa-edit edit-loan-icon" @click="edit(item.id)"></i
              ></span>-->
              <span
                ><i class="fas fa-trash-alt" @click="remove(item.id)"></i
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
        id: 0,
        asset_id: null,
        asset_name: null,
        user: null,
        user_id: null,
        dt_loan: null,
        dt_devolution: null,
        status: null,
        comments: null,
        category: null,
        hr_loan: null,
        hr_devolution: null,
        assets: Array,
        users: [],
      },
      index: null,
      list: [],

      /* lista que irá armazenar os objetos selecionados para posterior efetivação do empréstimo */
      items: [],
    };
  },

  //Âncora do ciclo de vida do Vue
  mounted() {
    const contacts = JSON.parse(localStorage.getItem("contacts"));
    this.list = contacts ? contacts : [];
  },

  methods: {
    add() {
      var input_null = 0;

      if (this.form.dt_loan == null) {
        $("#inputDtLoan").css({ border: "1px solid red" });
        input_null = 1;
      } else {
        $("#inputDtLoan").css({ border: "1px solid gainsboro" });
      }

      if (this.form.dt_devolution == null) {
        $("#inputDtDevolution").css({ border: "1px solid red" });
        input_null = 1;
      } else {
        $("#inputDtDevolution").css({ border: "1px solid gainsboro" });
      }

      if (this.form.hr_loan == null) {
        $("#inputHrLoan").css({ border: "1px solid red" });
        input_null = 1;
      } else {
        $("#inputHrLoan").css({ border: "1px solid gainsboro" });
      }

      if (this.form.hr_devolution == null) {
        $("#inputHrDevolution").css({ border: "1px solid red" });
        input_null = 1;
      } else {
        $("#inputHrDevolution").css({ border: "1px solid gainsboro" });
      }

      if (input_null == 0) {
        if (this.form.status == "0") {
          this.form.status = "Locado";
        } else {
          this.form.status = "Reservado";
        }

        if (this.form.id === 0) {
          this.form.id = this.list.length + 1;
          this.list.push(this.form);
        } else {
          this.list[this.index] = this.form;
        }
        localStorage.setItem("contacts", JSON.stringify(this.list));
        //this.form = { id: 0, name: null, telephone: null };

        this.form.category = null;
        this.form.assets = null;
        this.form.user = null;
        this.form.dt_loan = null;
        this.form.dt_devolution = null;
        this.form.status = null;
        this.form.comments = null;

        console.log(this.list);
      }
    },

    remove(item) {
      const idx = this.list.indexOf(item);
      this.list.splice(idx, 1);
      localStorage.setItem("contacts", JSON.stringify(this.list));
    },

    /*edit(item) {
      this.index = this.list.indexOf(item);
      this.form = Object.assign({}, item);
      localStorage.setItem("contacts", JSON.stringify(this.list));
    },*/

    searchUser: function () {
      //console.log('Nome (ID): ', this.form.user)
      this.form.user_id = this.form.user;

      axios
        .get("/usuario/pesquisa-nome/" + this.form.user_id)
        .then((response) => {
          this.form.user = response.data[0]["name_user"];
          //console.log('Nome: ', response.data[0]['name_user'])
        });
    },

    searchUsers: function () {
      axios.get("/usuarios/listar-todos").then((response) => {
        this.form.users = response.data;
      });
    },

    selectCategory: function () {},

    getAssets: function () {
      this.$forceUpdate(); // Notice we have to use a $ here

      axios.get("/assets/" + this.form.category).then((response) => {
        this.form.assets = response.data;
        console.log("this.form.assets: ", this.form.assets);
      });
    },

    sendForm() {
      var _this = this;

      if (this.list.length === 0) {
        bootbox.alert({
          centerVertical: true,
          backdrop: true,
          closeButton: false,
          size: "large",
          title:
            "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
          message:
            "<i class='fas fa-check-circle' style='color:red'></i>&nbsp&nbsp" +
            "<span style='font-weight:bold; position: relative; top: 5px;'>Primeiro adicione antes de registrar o empréstimo.</span>",
        });
      } else {
        this.$inertia.post("/emprestimo/registrar", this.list, {
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

            localStorage.clear();

            this.form.category = null;
            this.form.assets = null;
            this.form.user = null;
            this.form.dt_loan = null;
            this.form.dt_devolution = null;
            this.form.status = null;
            this.form.comments = null;
          },
        });
      }
    },
  },
};
</script>