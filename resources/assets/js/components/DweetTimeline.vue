<template>
    <a href="" class="dweet-link">
        <div class="dweet">
            <div class="profile-picture dweet-profile-picture"></div>
            <div class="dweet-meta">
                <span class="dweet-name">{{d.user.name}}</span>
                @{{d.user.username}}
            </div>
            <div class="dweet-text">
                <div v-html="d.dweet.text"></div>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        props: [
            'd'
        ],
        mounted(){

        }
    }
</script>