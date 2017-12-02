<template>
<div class="app-container">
    <sai-header/>
    <ul>
        <items v-for="item in lists" v-bind:titles="item" v-bind:key="item.id"></items>
    </ul>
    <sai-footer/>
</div>
</template>

<script>

export default {
    system_url,
    name: 'index',
    data () {
        return {
            lists: [],
        }
    },
    created: function(){
        this.getList();
    },
    methods: {
        getList: function() {
           // _this = this;
            this.$http.get(system_url+'/app/index/getList/page/1').then(function(res){
                this.lists = res.data.data.data;
            }, function(res){
            })
        }
    },
}
</script>