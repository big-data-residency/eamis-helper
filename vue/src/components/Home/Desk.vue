<template>
  <div id="desk">
    <div class="paper"></div>
    <div class="ruler"></div>
    <div class="calendar"></div>
    <div class="notebook"></div>
    <div class="pencil"></div>
  </div>
</template>

<script>
  export default {
    name: "Desk"
  }
</script>

<style scoped>
  /*body {*/
    /*text-align:center;*/
    /*height: 100%;*/
    /*margin: 0px;*/
  /*}*/
  #desk{
    margin: 80px auto;
    position: relative;
    height:510px;
    width:510px;
  }
  #desk div{position:absolute;}
  #desk div::before, #desk div::after {
    content:'';
    position:absolute;
    display:block;
  }
  .paper{
    width:124px;
    height:156px;
    background-color:#7ecbf1;
    border: 4px solid #444444;
    border-bottom-left-radius:14px;
    top:115px;
    left:115px;
  }
  .paper::before{
    width:14px;
    height:184px;
    background-color:#43b6de;
    border: 4px solid #444444;
    border-radius:14px 0 0 14px;
    bottom:0px;
    left:-4px;
  }
  .paper::after{
    width: 18px;
    height: 18px;
    border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
    border: 4px solid #444444;
    border-right: 0;
    z-index:1;
    background-color:#7ecbf1;
    top:134px;
    left:-4px;
  }
  .ruler{
    width:22px;
    height:113px;
    border: 4px solid #444444;
    top:86px;
    left:165px;
    background-image: linear-gradient(90deg, #fec96c 30%, #fedb8e 30% );
    transform: rotate(25deg);
  }
  .ruler::before{
    width: 10px;
    height:4px;
    background-color:#444444;
    border-radius: 0 4px 4px 0;
    box-shadow: 0 12px #444444, 0 24px #444444, 0 36px #444444, 0 48px #444444, 0 60px #444444, 0 72px #444444, 0 84px #444444, 0 96px #444444;
    top:3px;
  }
  .ruler::after{
    width: 6px;
    height:4px;
    background-color:#444444;
    box-shadow: 0 12px #444444, 0 24px #444444, 0 36px #444444, 0 48px #444444, 0 60px #444444, 0 72px #444444, 0 84px #444444, 0 96px #444444;
    border-radius: 0 4px 4px 0;
    top:9px;
  }
  .notebook{
    width:124px;
    height:156px;
    background-image:linear-gradient(90deg, #f15e56 12%, #f3796d 12%, #f3796d 60%, #444444 60%, #444444 64%, #fec96c 64%, #fec96c 78%,#444444 78%, #444444 82%, #f3796d 82% );
    border: 4px solid #444444;
    border-radius:14px;
    top:177px;
    left:186px;
  }
  .notebook::before{
    width:124px;
    height:14px;
    background-color:white;
    border: 4px solid #444444;
    border-radius:14px 0 14px 14px;
    top:138px;
    left:-4px;
  }
  .notebook::after{
    z-index: 2;
    width: 10px;
    height: 20px;
    border-top:20px;
    border: 4px solid #444444;
    border-top: transparent;
    border-radius: 0 0 5px 5px;
    background-color:#f3796d;
    top:147px;
    left:18px;
  }
  .calendar{
    width: 122px;
    height:122px;
    border:4px solid #444444;
    border-radius: 10px;
    background-image:
      linear-gradient(#f3796d 24%, white 20%);
    top:130px;
    right:98px;
    transform:rotate(12deg);
  }
  .calendar::before{
    width: 16px;
    height: 20px;
    border-radius: 100% 100% 50% 50%;
    background-color:#fec96c;
    box-shadow: 0 0 0 4px #444444, 74px 0  #fec96c, 74px 0 0 4px #444444;
    top: -10px;
    left: 16px;
  }
  .calendar::after{
    width: 16px;
    height: 14px;
    background-color: #bbbdc0;
    border-radius: 2px;
    top: 43px;
    left:14px;
    box-shadow: 26px 0 #bbbdc0, 52px 0 #bbbdc0, 78px 0 #bbbdc0, 0 24px#bbbdc0, 26px 24px #bbbdc0, 52px 24px #bbbdc0, 78px 24px #bbbdc0, 0 48px #bbbdc0, 26px 48px #bbbdc0, 52px 48px #bbbdc0, 78px 48px #bbbdc0;
  }
  .pencil{
    width:16px;
    height:50px;
    border: 4px solid #444444;
    border-radius:4px;
    background-image:linear-gradient(#f3796d 20%, #444444 20%, #444444 25%, #fec96c 25%);
    top:266px;
    right:150px;
    transform:rotate(-35deg);
  }
  .pencil::before{
    top:52px;
    left:-4px;
    width: 0;
    height: 0;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-top: 20px solid #444444;
  }
  .pencil::after{
    top:52px;
    left:0px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 14px solid #fec96c;
  }
</style>

