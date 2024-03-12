<template>
    <div class="tweets-block">
        <h2 class="titular"><span class="icon zocial-twitter"></span>LATEST POSTS</h2>
        <div v-for="post in props.posts" :key="post.id" class="tweet first">
            <p>{{ post.content }}</p>
            <p><a class="time-ago scnd-font-color" href="#18">created {{ timeAgo(post.created_at) }}; updated {{ timeAgo(post.updated_at) }}</a></p>
            <span>{{ post.likes_count }} likes</span>
            <form @submit.prevent="likePost(post.id)">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <img src="https://www.svgrepo.com/show/111566/like.svg" alt="Like" style="height: 20px;">
                </button>
            </form>
            <p class="author-name">{{ post.user.name }}</p>
            <div class="comment-input-container">
                <form @submit.prevent="createComment(post.id)">
                    <input type="text" v-model="commentContent" placeholder="Write a comment..." required>
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <img src="https://www.svgrepo.com/show/309459/comment.svg" alt="Edit" style="height: 20px;">
                    </button>
                </form>
            </div>
            <div v-for="comment in post.comments" :key="comment.id">
                <strong>{{ comment.user.name }}:</strong>
                <p>{{ comment.content }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { defineProps } from 'vue';
import moment from 'moment';

const timeAgo = (datetime) => {
    return moment(datetime).fromNow();
}


const props = defineProps({
    posts: {
        type: Array,
    },

    authToken: {
        type: String,
    },

});

const commentContent = ref('');

const likePost = (postId) => {
    // fetch('https:/localhost:8080/api/post/like/7')
    //     .then(response => response.json())
    //     .then(data => console.log(data))
    //     .catch(error => console.error('Fetch error:', error));

    axios.post('/api/post/like/' + postId, {}, {
        withCredentials: true,
        headers: {
            "Content-Type": "multipart/form-data",
            Authorization: `Bearer ${props.authToken}`,
        }
    })
        .then(response => {
            console.log('Liked post with ID:', postId);
        })
        .catch(error => {
            console.error('Error liking post:', error)
        });
}

const createComment = (postId) => {
    axios.post('/api/post/like/' + postId)
        .then(response => {
            console.log('Creating comment for post with ID:', postId);

        })
        .catch(error => {
            console.error('Error creating comment:', error);

        })
    console.log('Comment content:', commentContent.value);
}
</script>

<style scoped>
.tweets-block {
    box-sizing: border-box;
    padding: 30px;
    width: 67%;
    background: #394264;
    border-radius: 5px;
    margin-bottom: 25px;
    margin-left: 205px;
    box-shadow: 0px 1px 1px black;
    border: 1px solid #1f253d;
}

.tweets-block input::placeholder {
    color: #9099b7;
}

.tweets-block .titular {
    color: #fff;
    margin-bottom: 15px;
    line-height: 60px;
    text-align: center;
    background: #11a8ab;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.tweets-block .tweet {
    background: #50597b;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 3px;
}

.tweet-link {
    color: #4fc4f6;
    text-decoration: none;
}

.tweet-link:hover {
    text-decoration: underline;
}

.time-ago {
    color: #9099b7;
    font-size: 0.85em;
}

.tweets-block .tweet:first-child {
    margin-top: 0;
}

.tweets-block .tweet:last-child {
    margin-bottom: 0;
}

.tweets-block .tweet p {
    color: #ffffff;
}

.tweets-block .tweet a.time-ago {
    color: #9099b7;
    text-decoration: none;
}

.tweets-block .tweet a.time-ago:hover {
    text-decoration: underline;
}

.tweets-block .tweet .author-name {
    color: #11a8ab;
    font-size: 1rem;
    font-weight: bold;
    margin-top: 5px;
    text-align: right;
}

.comment {
    background: #6c7293;
    padding: 5px 10px;
    margin-top: 10px;
    border-radius: 5px;
}

.comment-input-container input[type="text"] {
    width: calc(100% - 700px);
    height: 50px;
    padding-left: 45px;
    margin-left: 20px;
    background: #50597b;
    color: #fff;
    border: solid 1px #1f253d;
    border-radius: 5px;
    font-family: 'Ubuntu', sans-serif;
}

.comment-input-container input[type="text"]::placeholder {
    color: #9099b7;
}

.comment-input-container input[type="text"]:focus {
    outline: none;
    border: 1px solid #11a8ab;
}

.comment-input-container .input-icon {
    font-size: 22px;
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #9099b7;
}
</style>
