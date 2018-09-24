<template>
    <div>
        hello home
        <el-button v-on:click="svnUpdate">svn更新</el-button>
    </div>
</template>

<script>
    import {
        asSvnUpdate
    } from '@/api/svn'
    export default {
        name:'home',
        data() {
            return {
            }
        },
        methods: {
            svnUpdate() {
                asSvnUpdate().then(resopnse=>{
                    console.log('11111111111')
                    console.log(resopnse)
                })
            }
        }
    }
</script>

<style>

</style>