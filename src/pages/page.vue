<template>
<div class="app-container">
    <sai-header/>
    <article>
		<h1>{{ titleD.title }}</h1>
		<time>{{ titleD.date }}</time>
		<div class="app-container">
		<div v-html="titleD.content"></div>
		</div>
		<p>
		<a href="#/" class="am-btn am-btn-secondary am-btn-block">返回列表</a>
		</p>
    </article>
    <sai-footer/>
</div>
</template>

<script>
export default {
	name: 'page',
	data () {
		return {
		    titleD: ''
		}
	},
    created: function(){
        this.getDetail();
    },
    methods: {
        getDetail: function(){
            console.log(this.$route.params.id);
            this.$http.get(system_url+'/app/index/detail/id/'+this.$route.params.id,{emulateJSON:true}).then((res) => {
                    this.titleD = res.data.data;
                }).catch(function(response) {         
            })
        }
    }
}
</script>