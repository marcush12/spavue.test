<template>
  <div class="row">
    <grid-vue class="input-field" tamanho="12">
      <input type="text" v-model="conteudo.titulo">
      <textarea v-if="conteudo.titulo" placeholder="Conteúdo" v-model="conteudo.texto" class="materialize-textarea"></textarea>
      <input v-if="conteudo.titulo && conteudo.texto" type="text" placeholder="Link" v-model="conteudo.link">
      <input v-if="conteudo.titulo && conteudo.texto" type="text" placeholder="Url da imagem" v-model="conteudo.imagem">
      <label>O que está acontecendo?</label>
    </grid-vue>
    <p class="right-align">
      <button v-on:click="addConteudo()" v-if="conteudo.titulo && conteudo.texto" class="btn waves-effect waves-light">Publicar</button>
    </p>
  </div>
</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'PublicarConteudoVue',
  props:[],
  data () {
    return {
      conteudo:{titulo:'', texto: '', link: '', imagem: ''}
    }
  },
  components:{
    GridVue
  },
  methods:{
    addConteudo(){
      console.log(this.conteudo);
      this.$http.post()
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
