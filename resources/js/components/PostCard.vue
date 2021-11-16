<template>
     <div class="card-container">
            <p >
                {{ post.title }}
            </p>
             <router-link :to="{ name: 'post' , params: {slug: post.slug} }">{{ post.title }}</router-link> |
        </div>
</template>

<script>
export default {
    name: 'PostCard',
    props: ['post']
}
</script>