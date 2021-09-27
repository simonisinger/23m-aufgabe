<template>
    <div>
        <form v-on:submit="addPost(posts, errors, $event)" class="p-3 bg-gray-100 w-full border border-gray-300 mb-0">
            <p class="m-0 text-red-600" v-for="error in errors">
                {{ error }}
            </p>
            <textarea name="post-content" class="w-full resize-none h-20 rounded border border-gray-300 px-2 py-1" placeholder="Whats on your mind"></textarea>
            <input type="submit" class="rounded bg-blue-400 mt-2 px-3 py-1 text-white text-base" value="Tweet">
        </form>
        <div v-for="post in posts" class="border-b border-l border-r border-gray-300 py-2 px-4">
            <div class="text-blue-400 font-bold">
                {{ post.name }}
            </div>
            <div class="text-base text-black">
                {{ post.message }}
            </div>
            <div class="text-gray-400">
                <small>{{ getTimeDifference(post.created_at) }}</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getData(this);
    },
    data: function (){
        return {
            'posts': [],
            'errors': [],
            vm: this
        };
    },
    methods: {
        getData(vm){
            axios.post('/posts/get').then(function (value){
                vm.posts = value.data;
            });
        },
        addPost: function (posts, errors, event){
            event.preventDefault();
            var tweetMessage = document.getElementsByName('post-content')[0].value;
            if(tweetMessage.length <= 12) {
                errors.shift();
                errors.push('Your message dont have enough characters');
                return;
            }
            if(tweetMessage.length > 255){
                errors.shift();
                errors.push('Your message is too long');
                return;
            }
            axios.post('/posts/create',{
                'tweetMessage': tweetMessage
            }).then(function (response){
                errors.shift();
                posts.unshift(response.data);
                document.getElementsByName('post-content')[0].value = '';
            });
        },

        getTimeDifference: function (date){
            var difference = (Date.now() - Date.parse(date)) / 1000;
            var unit = 'year';
            var countUnit = 1;
            console.log(date);
            if(difference < 60) {
                unit = 'second';
                countUnit = Math.ceil(difference);
            }else if(difference < 3600){
                unit = 'minute';
                countUnit = Math.floor(difference / 60);
            }else if(difference < 86400){
                unit = 'hour';
                countUnit = Math.floor(difference / 3600);
            }else if(difference < (86400 * 30)){
                unit = 'day';
                countUnit = Math.floor(difference / 86400);
            }else if(difference < 31556952){
                unit = 'month';
                countUnit = Math.floor(difference / (86400 * 30));
            }else{
                countUnit = Math.floor(difference / 31556952);
            }
            if(countUnit > 1){
                unit += 's';
            }
            return countUnit + ' ' + unit + ' ago';
        }
    }
}
</script>
