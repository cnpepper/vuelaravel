<template>
    <div>
        <h1>用于操作服务器端的测试环境SVN更新，如果有文件冲突只能人工处理</h1>
        <p>第一步：先在svn上上传文件，不要上传conposer/package的lock文件</p>
        <p>第二部：上传文件后，点击更新测试环境，等待返回结果。</p>
        <el-button v-on:click="svnUpdateClick">更新测试环境</el-button>
        <p>
            {{updateInfo}}
        </p>
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

</style>
