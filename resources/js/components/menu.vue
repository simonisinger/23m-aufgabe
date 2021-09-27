<template>
    <ul class="list-none mt-14 mr-4" id="menu">
        <li class="p-3 text-xl xl:font-bold cursor-pointer text-right" v-for="value in menuItems">{{ value }}</li>
    </ul>
</template>

<script>
export default {
    data: function () {
        return {
            menuItems: [
                'Home',
                'Discover',
                'Notifications',
                'Messages'
            ]
        };
    }
}
</script>
