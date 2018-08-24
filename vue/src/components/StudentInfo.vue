<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img src="/static/images/avatars/default.jpg" alt="User Avatar"
                 class="profile-user-img img-responsive img-circle">
            <h3 class="profile-username">EXAMPLE: USERNAME</h3>
            <button id="avatar-update-btn" class="btn btn-primary btn-block">
              <b>上传头像</b>
            </button>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
              ABOUT ME
            </h3>
          </div>
          <div class="box-body">
            <strong>
              <i class="fa fa-book margin-r-5"></i>
            </strong>
            <p class="text-muted">
              EXAMPLE
            </p>

            <hr/>

            <strong>
              <i class="fa fa-file-text-o margin-r-5"></i>
              College And Major
            </strong>
            <p>
              南开大学****学院
              <br/>
              ******专业
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <TabBar :tabs="studentTab"/>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapState} from 'vuex';
  import TabBar from "@/components/AdminLTE/TabBar";

  export default {
    name: "StudentInfo",
    components: {
      TabBar
    },

    computed: {
      ...mapState([
        "studentTab"
      ])
    },

    mounted: function(){
      console.log("send");
      this.getMockData();
    },

    methods: {
      getMockData: function () {
        this.$axios({
          url: '/mock/example',
          type: 'get',
          data: {
            omg: 'yes'
          },
        }).then((res) => console.log(res))
      },
    },




  }
</script>

