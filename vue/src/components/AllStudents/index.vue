<template>
  <div class="box box-primary">
    <div class="box-body">

      <div class="col-md-12">
        <el-table id="all-student" :data="tableData" :stripe="true" max-height="100%">
          <template v-for="(val, key, index) in displayInfo">
            <el-table-column :prop="key" :label="val.label" :key="index" :width="val.width" :sortable="true"
                             :show-overflow-tooltip="true"></el-table-column>
          </template>

          <el-table-column label="操作" width="100%">
            <template slot-scope="{row}">
              <el-button type="text" @click="handleView(row)">查看</el-button>
              <el-button type="text">操作</el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>


      <div id="table-footer" class="block">
        <!--<div class="col-md-12">-->
        <el-pagination
          id="pagination"
          :current-page="pagination.currentPage"
          :total="pagination.totalCount"
          layout="prev, pager, next, total, jumper"
          class="pull-right"
          @next-click="getStudentInfo"
          @prev-click="getStudentInfo"
          @current-change="getStudentInfo">
        </el-pagination>
      </div>

    </div>
  </div>
</template>


<script>
  import {mapState, mapGetters} from 'vuex';

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
    },

    methods: {
      getStudentInfo: function (page) {
        let params = {
          page: page,
        };
        params['per-page'] = 8;
        this.$axios.get('/student', {
          params: params
        }).then(res => {
          this.tableData = res.data.data;
          this.tableHead = this.tableData[0];
          this.pagination = res.data['_meta'];
          this.links = res.data['_links'];
        })
          .catch(err => console.log(err))
      },
      handleView: function (row) {
        this.$router.push(row['_links']['self']['href'])
      }
    }
  }
</script>

<style scoped>
  #pagination {
    padding-top: 10px;
  }

</style>
