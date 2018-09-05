<template>
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">
        EXAMPLE: TITLE
      </h3>
    </div>
    <div class="box-body">
      <div id="table-wrapper" class="dataTables_wrapper form-inline">
        <div id="table-header" class="row">
          <div class="col-md-6">
            <button type="button" @click="tableInit"> test</button>
          </div>
          <div class="col-md-6"></div>
        </div>

        <div id="table-body" class="row">
          <div class="col-md-12">
            <table id="all-student" class="table table-bordered table-striped" role="grid" aria-describedby="">
              <thead>
                <tr>
                  <!--<template v-for="(val, key, index) in tableData[0]" v-if="Object.keys(displayInfo).indexOf(key) !== -1">-->
                  <template v-for="(val, key, index) in tableData[0]" v-if="displayInfo.hasOwnProperty(key)">
                    <th :key="index">{{ displayInfo[key] }}</th>
                  </template>
                  <th>
                    操作
                  </th>
                </tr>
              </thead>

              <tbody>
                <template v-for="(data, index) in tableData">
                  <tr :key="index">
                    <template v-for="(val, key, idx) in data" v-if="displayInfo.hasOwnProperty(key)">
                      <td :key="idx">{{ val }}</td>
                    </template>
                    <td>
                      <router-link :to="data['_links']['self']['href']">
                        查看
                      </router-link>
                      <!--<router-link to="">
                        编辑
                      </router-link>-->
                      <a href="javascript: alert('未完成')">
                        编辑
                      </a>
                    </td>
                  </tr>
                </template>
              </tbody>

              <tfoot>
                <tr>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div id="table-footer" class="row">
          <div class="col-md-5">
            <div id="all-student_info" class="dataTables_info" role="status" aria-live="polite">
              Showing {{ ((pagination.currentPage-1)*pagination.perPage + 1) }} to {{ pagination.currentPage*pagination.perPage }} of {{ pagination.totalCount }} entities
            </div>
          </div>
          <div class="col-md-7">
            <el-pagination
              :current-page="pagination.currentPage"
              :total="pagination.totalCount" page-size="10"
              layout="prev, pager, next, jumper"
              class="pull-right">
            </el-pagination>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>


<script>
  import 'admin-lte/bower_components/datatables.net/js/jquery.dataTables';
  import 'admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.css'
  import 'admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap';

  import {mapState, mapGetters} from 'vuex';

  $(document).ready(function () {
   console.log('document ready');
  });


  export default {
    name: "AllStudents",
    data: function () {
      return {
        tableHead: [],
        tableData: [],
        pagination: {},
        links: {},
      }
    },

    computed: {
      ...mapState({
        displayInfo: state => state.student.displayInfo
      }),
      ...mapGetters([
        'studentDisplayInfo'
      ])
    },

    mounted: function () {
      this.getStudentInfo();
      // this.tableInit();
    },

    methods: {
      getStudentInfo: function (page) {
        this.$axios.get('/student',{
          params: {
            page: page
          }
        }).then(res => {
            this.tableData = res.data.data;
            this.tableHead = this.tableData[0];
            this.pagination = res.data['_meta'];
            this.links = res.data['_links'];
          })
          .catch(err => console.log(err))
      },
      getNextPage: function () {

      },
      tableInit: function () {
        $('#all-student').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        });
      }
    }
  }
</script>

<style scoped>

</style>
