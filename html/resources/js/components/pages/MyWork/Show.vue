<template>
    <div>
        <h2>発注詳細</h2>
        <hr>
        <h3>{{ work.title }}</h3>
        <p>{{ work.description }}</p>
        <p><b><i class="mif-money"></i>報酬 : </b>{{ work.reward.toLocaleString() }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                work: {
                    title: '',
                    description: '',
                    reward: 0,
                },
            }
        },
        created() {
            if (this.$route.query.create === 'success') {
                Metro.notify.create('発注を作成しました。', 'INFO', {cls: 'success'});
            }
            axios.get(`/api/v1/works/${this.$route.params.id}`).then(res => {
                this.work = res.data.data;
            }).catch(error => {
                console.error(error);
            });
        }
    }
</script>
