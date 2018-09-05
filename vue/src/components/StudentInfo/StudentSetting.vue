<template>
  <!--  FIXME REFORMAT REPLACE WITH COMPONENTS  -->
  <form id="editStudentInfo" class="form-horizontal">
    <input id="studentIdStr" name="studentIdStr" hidden="hidden" value="" title="">
    <div class="form-group">
      <label class="col-sm-2 control-label">NickName</label>
      <div class="col-sm-10">
        <input id="NickName" type="text" placeholder="Name" name="nickName" class="form-control">
      </div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label">sex</label> <label class="col-sm-10"><input
      type="radio" checked="checked" name="gender" value="1">男
      &nbsp;&nbsp;
      <input type="radio" name="gender" value="2">女
    </label></div>
    <div class="form-group"><label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10"><input type="password" placeholder="password" name="password" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label control-label">College</label>
      <div class="col-sm-10"><input type="text" name="college" class="form-control" title=""></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label control-label">Major</label>
      <div class="col-sm-10">
        <input type="text" name="major" class="form-control" title="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>
</template>

<script>
  export default {
    name: "StudentSetting"
  }
</script>

<style scoped>

</style>
