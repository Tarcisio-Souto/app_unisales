<template>
  <layout>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro da Instituição</h4>
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
          id="formAddInstituition"
        >
          <br /><br />
          <div class="row">
            <div class="col-md-12 topico-add">
              <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
            </div>
          </div>
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
                  v-model="form.social_name"
                />
              </div>
              <div v-for="(erro, social_name) in errors" :key="social_name">
                <div v-if="social_name == 'social_name'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputName">Nome Fantasia</label>
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
                  v-model="form.fantasy_name"
                />
              </div>
              <div v-for="(erro, fantasy_name) in errors" :key="fantasy_name">
                <div v-if="fantasy_name == 'fantasy_name'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
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
                  v-model="form.cnpj"
                  v-mask="'###.###.###/####-##'"
                />
              </div>
              <div v-for="(erro, cnpj) in errors" :key="cnpj">
                <div v-if="cnpj == 'cnpj'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
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
                  v-model="form.phone_number"
                  v-mask="['(##) #####-####', '(##) ####-####']"
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
                  v-model="form.email"
                />
              </div>
            </div>
            <div v-for="(erro, email) in errors" :key="email">
              <div v-if="email == 'email'">
                <span v-if="erro != ''" class="errors-label-notification">
                  <i class="fas fa-exclamation-circle"></i>{{ erro }}
                </span>
              </div>
            </div>

            <div class="col-md-4">
              <label for="InputStatus">Situação</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus1"
                      value="1"
                      v-model="form.status"
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Ativo
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus2"
                      v-model="form.status"
                      value="0"
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
          <div class="row">
            <div class="col-md-12 topico-add">
              <h4><span style="font-weight: bold">Endereço</span></h4>
            </div>
          </div>
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
                  v-model="form.zipcode"
                />
              </div>
            </div>
          </div>
          <br />
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
                  v-model="form.street"
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
                  v-model="form.number"
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
                  v-model="form.district"
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
                  v-model="form.complement"
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
                  v-model="form.city"
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
                  v-model="form.state"
                  name="txtState"
                  @change="deleteState($event)"
                >
                  <option
                    id="selected_state"
                    :value="form.state"
                  >
                    {{ form.state }}
                  </option>
                  <option
                    v-for="state in states"
                    :key="state.id_state"
                    :value="state.id_state"
                  >
                    {{ state.name }}
                  </option>
                </select>
              </div>
            </div>
          </div>

          <br /><br />
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btnCadastrar">
                Registrar
              </button>
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
    states: Array,
  },

  mounted: () => {
    $(document).ready(function () {
      function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#inputStreet").val("");
        $("#inputDistrict").val("");
        $("#inputCity").val("");
        $('select[name="inputState"]');
        //$("#inputState").val("");
      }

      //Quando o campo cep perde o foco.
      $("#inputZipCode").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, "");

        //Verifica se campo cep possui valor informado.
        if (cep != "") {
          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#inputStreet").val("");
            $("#inputDistrict").val("");
            $("#inputCity").val("");
            $("#inputState").val("");

            //Consulta o webservice viacep.com.br/
            $.getJSON(
              "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
              function (dados) {
                if (!("erro" in dados)) {
                  //Atualiza os campos com os valores da consulta.

                  $("#inputStreet").val(dados.logradouro);
                  $("#inputDistrict").val(dados.bairro);
                  $("#inputCity").val(dados.localidade);
                  document.getElementById("inputState").value = dados.uf;
                } //end if.
                else {
                  //CEP pesquisado não foi encontrado.
                  //limpa_formulario_cep();
                  //alert("CEP não encontrado.");
                }
              }
            );
          } //end if.
          else {
            //cep é inválido.
            //limpa_formulario_cep();
            //alert("Formato de CEP inválido.");
          }
        } //end if.
        else {
          //cep sem valor, limpa formulário.
          limpa_formulario_cep();
        }
      });
    });
  },

  data: () => {
    return {
      form: {
        social_name: null,
        fantasy_name: null,
        cnpj: null,
        email: null,
        phone_number: null,
        status: null,
        street: null,
        number: null,
        district: null,
        city: null,
        state: null,
        zipcode: null,
        complement: null,
        preserveState: true,
      },
    };
  },

  methods: {
    deleteState: function () {
      $("#selected_state").remove();
    },

    sendForm() {
      this.$inertia.post("instituicao/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        _method: "PUT",
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Cadastro realizado com sucesso!</span>",
          });

          this.form.social_name = null;
          this.form.cnpj = null;
          this.form.email = null;
          this.form.phone_number = null;
          this.form.status = null;
          this.form.street = null;
          this.form.number = null;
          this.form.district = null;
          this.form.city = null;
          this.form.state = null;
          this.form.zipcode = null;
          this.form.fk_state = null;
          this.form.fk_address = null;
          this.form.complement = null;
          this.form.preserveState = null;

        },
      });
    },
  },
};
</script>