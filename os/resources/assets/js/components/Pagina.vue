<template>
  <div class="container" >
      <div class="row" style="" >
          <div v-bind:class="defineTamanho">
              <slot></slot>
          </div>
      </div>
  </div>
  
</template>

<script>
    export default {
        props:['tamanho'],
        computed:{
          defineTamanho: function(){
            if(this.tamanho >= 12){
              return "col-md-12";
            }
            if(this.tamanho <= 2){
              return "col-md-2 col-md-offset-5";
            }
            if((this.tamanho % 2) == 0){
              return "col-md-"+this.tamanho+" col-md-offset-"+((12 - this.tamanho)/2);
            }else{
              return "col-md-"+(parseInt(this.tamanho) + 1)+" col-md-offset-"+((12 - (parseInt(this.tamanho) + 1))/2);
            }
          }
        }
    }
</script>

<style media="screen">
 html, body {
                background-color: rgb(184, 238, 233);
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #ffffff;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

</style>

