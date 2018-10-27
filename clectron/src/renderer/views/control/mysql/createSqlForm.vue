<template>
    <el-row>
        <el-row>
            <p>除查询语句外都需要在此新建，审核通过后执行。</p>
            <p>需要查询数据到数据查询界面执行SQL。</p>
            <p>多个SQL注意结尾带分号。</p>
            <p>最多支持4096个字符长度。</p>
        </el-row>
        <el-row>
            <el-form ref="form" :model="form" label-width="80px">
                <el-input type="textarea" :rows="8" placeholder="请输入内容" v-model="form.sentence"/>
            </el-form>
        </el-row>
    </el-row>
</template>

<script>
    import {
        asCreateSql
    } from '@/api/mysql'
    export default {
        name: 'createSqlForm',
        data() {
            return {
                user_id:this.$store.state.user.user_id,
                form: {
                    sentence:''
                }
            }
        },
        methods: {
            submit() {
                // todo .. 创建SQL语句
                this.form.user_id = this.user_id;
                asCreateSql(this.form).then(response => {
                    console.log(response)
                })
            }
        }
    }
</script>

<style>

</style>