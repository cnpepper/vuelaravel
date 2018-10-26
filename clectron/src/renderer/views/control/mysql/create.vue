<template>
    <el-container direction='vertical'>
        <el-header>
            <p>除查询语句外都需要在此新建，审核通过后执行。</p>
            <p>需要查询数据到数据查询界面执行SQL。</p>
        </el-header>
        <el-main>
            <el-form ref="form" :model="form" label-width="80px">
                <el-form-item label="SQL语句">
                    <el-input type="textarea" :rows="8" placeholder="请输入内容" v-model="form.sentence">
                    </el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                    <el-button>取消</el-button>
                </el-form-item>
            </el-form>
        </el-main>
    </el-container>
</template>

<script>
import {asCreateSql} from '@/api/mysql'
    export default {
        data() {
            return {
                form: {
                    sentence:''
                }
            }
        },
        methods: {
            onSubmit() {
                asCreateSql(this.form).then(response=>{
                    console.log(response)
                })
            }
        }

    }
</script>

<style>

</style>