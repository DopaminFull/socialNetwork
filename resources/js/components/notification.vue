<template>
    <div>
        <h6 href="#" title class="not-box-open not" @click="mark_seen()">
            <span>
                <i class="badge1 fa fa-bell"></i>
                <span v-if="count > 0" v-text="this.count" class="count"></span>
            </span>
            Notification
        </h6>
        <div
            id="notification"
            class="notification-box noti"
            style="overflow-y: auto;
    overflow-x: hidden;
    
    height: 300px;"
        >
            <div class="nt-title">
                <a href="#" title>Last week</a>
            </div>
            <div
                class="nott-list border-left"
                v-for="not in nots"
                :key="not.id"
            >
                <div class="notfication-details">
                    <div class="noty-user-img">
                        <a :href="`/u/${not.sender}`">
                            <img
                                :src="
                                    `https://randomuser.me/api/portraits/men/${not.sender}.jpg`
                                "
                                alt
                                style="height:30px ; width:30px ; border-radius:50%"
                            />
                        </a>
                    </div>
                    <div class="notification-info w-75">
                        <h3 v-text="not.sender_name + ' ' + not.body"></h3>
                    </div>
                    <!--notification-info -->
                </div>
            </div>
            <div class="view-all-nots">
                <a href="#" title>View All Notification</a>
            </div>
            <!--nott-list end-->
        </div>
        <!--notification-box end-->
    </div>
</template>
<script>
export default {
    props: {
        auth: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
            nots: [],
            count: 0
        };
    },
    mounted() {
        this.listen();
        this.getNotification();
    },
    methods: {
        listen() {
            var channel = Echo.channel("user." + this.auth.id);
            channel.listen(".notif", response => {
                this.nots.unshift(response);
                this.count++;
            });
        },
        getNotification() {
            axios
                .post(`/notifications`)
                .then(response => {
                    this.nots = Array.from(response.data);
                    this.count = this.nots.filter(not => !not.seen_at).length;
                    console.log(this.nots[0]);
                })
                .catch(e => {
                    console.log(e);
                });
            return;
        },
        mark_seen() {
            this.count = 0;
            axios
                .post(`/notifications_seen`)
                .then(console.log("done"))
                .catch(e => {
                    console.log(e);
                });
        }
    }
};
</script>
<style lang="css">
.count {
    position: absolute;
    top: 5px;
    right: 23px;
    font-size: 14px;
    background: white;
    color: red;
    width: 15px;
    height: 17px;
    text-align: center;
    line-height: 18px;
    border-radius: 50%;
    box-shadow: 0 0 1px #333;
}
.not {
    color: #ffffff;
    cursor: pointer;
    font-size: 13px;
}
</style>
