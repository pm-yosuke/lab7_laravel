<template>
    <div>
        <h2>仕事詳細</h2>
        <hr>
        <h3>{{ work.title }}</h3>
        <p>{{ work.description }}</p>
        <h4 class="fg-crimson">募集要項</h4>
        <table class="table cell-border">
            <tbody>
            <tr>
                <td class="fg-crimson"><i class="mif-money"></i>給与</td>
                <td>{{ work.reward.toLocaleString() }}</td>
            </tr>
            <tr>
                <td class="fg-crimson"><i class="mif-calendar"></i>募集締切</td>
                <td>{{ work.entry_end_at.split(' ')[0] }}</td>
            </tr>
            <tr>
                <td class="fg-crimson"><i class="mif-user"></i>発注者</td>
                <td>{{ work.owner.name }}</td>
            </tr>
            </tbody>
        </table>
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
                    entry_end_at: '',
                    owner: {
                        name: ''
                    }
                },
            }
        },
        created() {
            axios.get(`/api/v1/works/${this.$route.params.id}`).then(res => {
                this.work = res.data.data;
            }).catch(error => {
                console.error(error);
            });
        }
    }
</script>
