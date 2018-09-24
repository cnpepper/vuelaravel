<template>
    <div>
        <el-row>
  <el-col :span="24"><h1>用于操作服务器端的测试环境SVN更新，如果有文件冲突只能人工处理</h1></el-col>
</el-row>
        <el-row>
  <el-col :span="24"><p>第一步：先在svn上上传文件，不要上传conposer/package的lock文件</p></el-col>
</el-row>
<el-row>
  <el-col :span="24"><p>第二部：上传文件后，点击更新测试环境，等待返回结果。</p></el-col>
</el-row>
        <el-row>
  <el-col :span="24"><el-button size="mini" v-on:click="svnUpdateClick">更新测试环境</el-button></el-col>
</el-row>
        <el-row>
  <el-col :span="24"><p>
            {{updateInfo}}
        </p></el-col>
</el-row>
        
        
    </div>
</template>

<script>
import {asSvnUpdate} from '@/api/svn'
export default {
    data(){
        return {
            updateInfo:'暂无更新信息'
        }
    },
    methods:{
        svnUpdateClick(){
            let that = this;
            asSvnUpdate().then(response=>{
                let status = response.data.status
                if(0 == status){
                    //提示成功
                    that.$message.success('测试环境svn更新成功')
                }
                else{
                    //提示失败
                    this.$message.error('测试环境svn更新发生错误')
                }
                //显示信息
                that.updateInfo = response.data.info.extra;
            })
        }
    }
}
</script>

<style>
.el-row {
    color: aliceblue;
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
</style>
