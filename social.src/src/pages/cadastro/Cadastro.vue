<template>

  <login-template>

    <span slot="menuesquerdo">
      <img src="https://www.designerd.com.br/wp-content/uploads/2013/06/criar-rede-social.png" class="responsive-img">
    </span>

    <span slot="principal">

      <h2>Cadastro</h2>

      <input type="text" placeholder="Nome" value="">
      <input type="text" placeholder="E-mail" value="">
      <input type="password" placeholder="Senha" value="">
      <input type="password" placeholder="Confirme sua Senha" value="">
      <button class="btn">Enviar</button>
      <router-link class="btn orange" to="/login">Já tenho conta</router-link>


    </span>



  </login-template>



</template>

<script>
import LoginTemplate from '@/templates/LoginTemplate'


export default {
  name: 'Cadastro',
  data () {
    return {

    }
  },
  components:{
    LoginTemplate
  },
  methods:{
    cadastro(){
      console.log("ok");
      axios.post(`http://127.0.0.1:8000/api/cadastro`, {
        email: this.email,
        password:this.password
      })
      .then(response => {
        //console.log(response)
        if(response.data.token){
          // login com sucesso
          console.log('login com sucesso')
          //js abaixo; setItem cria elemento; JSON.stringify pega lista de obj json em transforma em txt ou string; objeto contido em response.data; pode usar tb localStorage
          sessionStorage.setItem('usuario', JSON.stringify(response.data));
          //mandando o usuario para home
          this.$router.push('/') ;//$router variavel global pertence ao sistema de rotas do vuejs
        }else if(response.data.status == false){
          //login não existe
          console.log('login não existe')
          alert('Login inválido!');
        }else{
          // erros de validação
          console.log('erros de validação')
          let erros = '';
          for(let erro of Object.values(response.data)){
            erros += erro +" ";
          }
          alert(erros);
        }
      })
      .catch(e => {
        console.log(e)
        alert("Erro! Tente novamente mais tarde!");
      })
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
