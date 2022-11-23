<template>
  <layout>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Instituição</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="instituition in instituition" :key="instituition.id">          
          <br /><br />
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-4">
              <label for="inputName">Nome Social</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputName"
                  class="form-control"
                  :value="instituition.social_name"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputCnpj">CNPJ</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCpf"
                  class="form-control"
                  :value="instituition.cnpj"
                  v-mask="'###.###.###/####-##'"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputEmail">E-mail</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputEmail"
                  class="form-control"
                  :value="instituition.email"
                  disabled
                />
              </div>              
            </div>
            
          </div>
          <br />

          <div class="row">
            <div class="col-md-4">
              <label for="inputTelefone">Telefone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputTelefone"
                  class="form-control"
                  :value="instituition.phone_number"
                  disabled
                />
              </div>              
            </div>

            <div class="col-md-4">
              <label for="inputStatus1">Situação</label>
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-check form-check-inline"
                    v-if="instituition.status == '1'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus1"
                      value="1"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Ativo
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus1"
                      value="1"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Ativo
                    </label>
                  </div>

                  <div
                    class="form-check form-check-inline"
                    v-if="instituition.status == '0'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus2"
                      value="0"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Bloqueado
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus2"
                      value="0"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Bloqueado
                    </label>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <br />

          <br /><br />
          <h4><span style="font-weight: bold">Endereço</span></h4>
          <hr />
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputZipCode">CEP</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">CEP</div>
                </div>
                <input
                  type="text"
                  id="inputZipCode"
                  class="form-control"
                  placeholder="Informe o CEP"
                  name="txtZipCode"
                  :value="instituition.zipcode"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <label for="inputStreet">Logradouro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-road"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputStreet"
                  class="form-control"
                  placeholder="Rua, Av., Rod."
                  name="txtLogradouro"
                  :value="instituition.street"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-2">
              <label for="inputNumber">Número</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Nº</div>
                </div>
                <input
                  type="text"
                  id="inputNumber"
                  class="form-control"
                  placeholder="Número"
                  name="txtNumero"
                  :value="instituition.number"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputDistrict">Bairro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-home"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDistrict"
                  class="form-control"
                  placeholder="Informe o bairro"
                  name="txtBairro"
                  :value="instituition.district"
                  disabled
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">

            <div class="col-md-4">
              <label for="inputComplement">Complemento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputComplement"
                  class="form-control"
                  placeholder="Informe o complemento"
                  name="txtDistrict"
                  :value="instituition.complement"
                  disabled
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputCity">Cidade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCity"
                  class="form-control"
                  placeholder="Informe a cidade"
                  name="txtCidade"
                  :value="instituition.city"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                  </div>
                </div>
                <select
                  id="inputState"
                  class="form-control"
                  name="txtState"
                  disabled
                >
                  <option selected>{{ instituition.state }}</option>
                </select>
              </div>
            </div>
          </div>

          <br /><br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4" align="right">
              <Link :href="'/instituicao/editar/'+instituition.inst_id" class="btn btn-warning btn-edit-user">Editar</Link>
              <!--<Link href="" class="btn btn-danger btnDeletar">Deletarr</Link>-->
              
            </div>
          </div>
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
export default {
  components: {
    Layout,
    Link,
  },
  props: {
    errors: Object,
    instituition: Array,
  },

  created() {
    if (this.errors["accessLevel"]) {
      console.log(this.errors["accessLevel"]);
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
  },

  methods: {
    sendForm() {
      this.$inertia.post("/instituicao/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        
      });
    },
  },
};
</script>