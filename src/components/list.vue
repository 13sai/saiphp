<template>
<li>
<h3 class="am-list-item-hd"><router-link :to="{path: '/page/'+titles.id}" >{{ titles.title }}</router-link></h3>
</li>
</template>

<script>
export default {
  name: 'list',
  props: ['titles'],
  data () {
    return {
    }
  }
}
</script>