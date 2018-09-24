<template>
    <div>
        <el-form ref="form" :model="login_form" label-width="80px">
            <el-form-item label="登录邮箱">
                <el-input v-model="login_form.email"></el-input>
            </el-form-item>
            <el-form-item label="登录密码">
                <el-input v-model="login_form.password"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onLoginSubmit">立即登录</el-button>
                <el-button>取消</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                login_form: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            onLoginSubmit() {
                //登录成功后跳转
                this.$store.dispatch('UserLogin', this.login_form).then(result => {
                    if (0 == result) {
                        this.$router.push('/')
                    }
                    else{
                        this.$router.push('/login')
                    }
                })
            }
        }
    }
</script>

<style>

</style>